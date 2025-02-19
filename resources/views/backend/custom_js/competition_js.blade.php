@if ($view == 'competition')
    <script>
        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Kompetisi');
            reset_form();
        }

        function reset_form() {
            $('#id').val("");
            $("#image").val(null);
            $("#title").val("");
            $("#date").val("");
            $("#start_registration_date").val("");
            $("#start_registration_time").val("");
            $("#finish_registration_date").val("");
            $("#finish_registration_time").val("");
            $("#type").val("");
            $("#price").val("");
            $("#level").val("");
            $("#province_code").val("");
            $("#city_code").html('<option value=""> - Semua Kota - </option>');
            $("#district_code").html('<option value=""> - Semua Kecamatan - </option>');
            $("#sekolah").html('<option value=""> - Semua Sekolah - </option>');
            $("#agama").val("");
            $("#is_active").val("");
        }

        var table = $('#table-list').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            ajax: "{{ route('competition.table') }}",
            order: [
                [0, "desc"]
            ],
            columns: [{
                    data: 'id',
                    name: 'id',
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'registration',
                    name: 'registration'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'target',
                    name: 'target'
                },
                {
                    data: 'is_active',
                    name: 'is_active'
                },



            ]
        });


        $("#form-tambah").submit(function(e) {
            // loading("btn-save-data");

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/competition') }}";
            else url = "{{ url('/posiadmin/competition') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);
            var province_name = $("#province_code option:selected").text();
            var city_name = $("#city_code option:selected").text();
            var district_name = $("#district_code option:selected").text();

            form.append("province_name", province_name);
            form.append("city_name", city_name);
            form.append("district_name", district_name);


            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    // unloading("btn-save-data", "Save");
                    if (data.success) {
                        $('#modal-tambah').modal('hide');
                        table.ajax.reload(null, false);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            html: data.message,
                            showConfirmButton: false,
                            scrollbarPadding: false,
                        });
                    }
                }

            });
        });

        function editData(id) {
            save_method = "edit";
            $('input[name=_method]').val('PATCH');
            $.ajax({
                url: "{{ url('/posiadmin/competition') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Kompetisi");
                    $('#id').val(data.id);
                    $("#image").val(null);
                    $("#title").val(data.title);
                    $("#date").val(data.date);
                    $("#start_registration_date").val(data.start_registration_date);
                    $("#start_registration_time").val(data.start_registration_time);
                    $("#finish_registration_date").val(data.finish_registration_date);
                    $("#finish_registration_time").val(data.finish_registration_time);
                    $("#type").val(data.type);
                    $("#price").val(data.price);
                    $("#level").val(data.level + '_' + data.levels.jenjang);
                    $("#province_code").val(data.province_code);
                    $("#sekolah").val(data.sekolah);
                    $("#agama").val(data.agama);
                    $("#is_active").val(data.is_active);

                    var p = data.province_code;
                    $.ajax({
                        url: "{{ url('posiadmin/get_kabupaten_by_province_id') }}" + "/" + p,
                        type: "GET",
                        dataType: "JSON",
                        success: function(response) {
                            var html = '';
                            html += '<option value="">- Semua Kota -</option>';
                            for (var i = 0; i < response.length; i++) {
                                html += '<option value="' + response[i].regency_code + '">' +
                                    response[i]
                                    .regency_name +
                                    '</option>';
                            }

                            $("#city_code").html(html);
                            $("#city_code").val(data.city_code);

                            $("#district_code").html(
                                '<option value="">- Pilih Kabupaten Dahulu -</option>');
                            $("#sekolah").html(
                                '<option value="">- Pilih Kecamatan Dahulu -</option>');
                            $("#container-sekolah-lain").hide();

                        }
                    });



                    $.ajax({
                        url: "{{ url('posiadmin/get_kecamatan_by_kabupaten_id') }}" + "/" +
                            data.city_code,
                        type: "GET",
                        dataType: "JSON",
                        success: function(response) {
                            var html = '';
                            html += '<option value="">- Semua Kecamatan -</option>';
                            for (var i = 0; i < response.length; i++) {
                                html += '<option value="' + response[i].district_code +
                                    '">' + response[i]
                                    .district_name + '</option>';
                            }

                            $("#district_code").html(html);
                            $("#district_code").val(data.district_code);
                            $("#sekolah").html(
                                '<option value="">- Pilih Kecamatan Dahulu -</option>'
                            );
                            $("#container-sekolah-lain").hide();
                        }
                    });


                    $.ajax({
                        url: "{{ url('posiadmin/get_sekolah_by_kecamatan_id') }}" + "/" + data
                            .district_code + '_' + data.level + '_' + data.levels.jenjang,
                        type: "GET",
                        dataType: "JSON",
                        success: function(response) {
                            var html = '';
                            html += '<option value="">- Semua Sekolah -</option>';
                            for (var i = 0; i < response.length; i++) {
                                html += '<option value="' + response[i].sekolah + '">' +
                                    response[i].sekolah +
                                    '</option>';
                            }
                            html += '<option value="lainnya">LAINNYA</option>';
                            $("#sekolah").html(html);
                            $("#sekolah").val(data.sekolah);
                            $("#container-sekolah-lain").hide();
                        }
                    })

                }
            });
        }





        $("#province_code").change(function() {
            var p = $(this).val();
            $.ajax({
                url: "{{ url('posiadmin/get_kabupaten_by_province_id') }}" + "/" + p,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    html += '<option value="">- Semua Kota -</option>';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].regency_code + '">' + data[i].regency_name +
                            '</option>';
                    }

                    $("#city_code").html(html);
                    $("#district_code").html('<option value="">- Pilih Kabupaten Dahulu -</option>');
                    $("#sekolah").html('<option value="">- Pilih Kecamatan Dahulu -</option>');
                    $("#container-sekolah-lain").hide();
                }
            })
        });



        $("#city_code").change(function() {
            var p = $(this).val();
            $.ajax({
                url: "{{ url('posiadmin/get_kecamatan_by_kabupaten_id') }}" + "/" + p,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    html += '<option value="">- Semua Kecamatan -</option>';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].district_code + '">' + data[i]
                            .district_name + '</option>';
                    }

                    $("#district_code").html(html);
                    $("#sekolah").html('<option value="">- Pilih Kecamatan Dahulu -</option>');
                    $("#container-sekolah-lain").hide();
                }
            })
        });


        $("#district_code").change(function() {
            var p = $(this).val();
            var level_id = $("#level").val();
            var item = p + '_' + level_id;
            $.ajax({
                url: "{{ url('posiadmin/get_sekolah_by_kecamatan_id') }}" + "/" + item,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    html += '<option value="">- Semua Sekolah -</option>';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].sekolah + '">' + data[i].sekolah +
                            '</option>';
                    }
                    html += '<option value="lainnya">LAINNYA</option>';
                    $("#sekolah").html(html);
                    $("#container-sekolah-lain").hide();
                }
            })
        });


        $("#sekolah").change(function() {
            var nilai = $(this).val();
            if (nilai == 'lainnya') {
                $("#container-sekolah-lain").show();
            } else {
                $("#container-sekolah-lain").hide();
            }
        });

        $("#level").change(function() {
            $("#district_code").val("");
            $("#sekolah").html('<option value=""> - Semua Sekolah - </option>');
            $("#container-sekolah-lain").hide();
        });


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/competition') }}" + "/" + id,
                    type: "DELETE",
                    dataType: "JSON",
                    data: {"id":id, '_token':csrf_token},
                    success: function(data) {
                        table.ajax.reload(null, false);
                    }
                })
            }
        }
    </script>
@endif

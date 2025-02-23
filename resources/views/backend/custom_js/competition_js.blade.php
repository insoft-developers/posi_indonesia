@if ($view == 'competition')
    <script>
        $("#level").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih'
        });
        $("#premium_bonus_product").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih'
        });
        $("#free_bonus_product").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih'
        });

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
            $("#level").val("").trigger('change');
            $("#province_code").val("");
            $("#city_code").html('<option value=""> - Semua Kota - </option>');
            $("#district_code").html('<option value=""> - Semua Kecamatan - </option>');
            $("#sekolah").html('<option value=""> - Semua Sekolah - </option>');
            $("#agama").val("");
            $("#is_active").val("");
            $("#premium_bonus_product").val(null).trigger('change');
            $("#free_bonus_product").val(null).trigger('change');
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
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            save_method = "edit";
            $('input[name=_method]').val('PATCH');
            $.ajax({
                url: "{{ url('/posiadmin/competition') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Kompetisi");
                    $('#id').val(data.data.id);
                    $("#image").val(null);
                    $("#title").val(data.data.title);
                    $("#date").val(data.data.date);
                    $("#start_registration_date").val(data.data.start_registration_date);
                    $("#start_registration_time").val(data.data.start_registration_time);
                    $("#finish_registration_date").val(data.data.finish_registration_date);
                    $("#finish_registration_time").val(data.data.finish_registration_time);
                    $("#type").val(data.data.type);
                    $("#price").val(data.data.price);
                    $("#level").val(data.level).trigger('change');
                    $("#province_code").val(data.data.province_code);
                    $("#sekolah").val(data.data.sekolah);
                    $("#agama").val(data.data.agama);
                    $("#link_juknis").val(data.data.link_juknis);
                    $("#link_zoom").val(data.data.link_zoom);
                    $("#link_twibbon").val(data.data.link_twibbon);
                    $("#link_wa").val(data.data.link_wa);
                    $("#link_telegram").val(data.data.link_telegram);
                    $("#is_active").val(data.data.is_active);
                    if(data.data.bonus !== null) {
                        var premium_bonus = explode(data.data.bonus.premium_register_product);
                        $("#premium_bonus_product").val(premium_bonus).trigger('change');
                        var free_bonus = explode(data.data.bonus.free_register_product);
                        $("#free_bonus_product").val(free_bonus).trigger('change');
                        
                    } else {
                        $("#premium_bonus_product").val(null).trigger('change');
                        $("#free_bonus_product").val(null).trigger('change');
                    }

                    var p = data.data.province_code;
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
                            $("#city_code").val(data.data.city_code);

                            $("#district_code").html(
                                '<option value="">- Semua Kecamatan -</option>');
                            $("#sekolah").html(
                                '<option value="">- Semua Sekolah -</option>');
                            $("#container-sekolah-lain").hide();


                            $.ajax({
                                url: "{{ url('posiadmin/get_kecamatan_by_kabupaten_id') }}" +
                                    "/" +
                                    data.data.city_code,
                                type: "GET",
                                dataType: "JSON",
                                success: function(response2) {
                                    var html = '';
                                    html +=
                                        '<option value="">- Semua Kecamatan -</option>';
                                    for (var i = 0; i < response2.length; i++) {
                                        html += '<option value="' + response2[i]
                                            .district_code +
                                            '">' + response2[i]
                                            .district_name + '</option>';
                                    }

                                    $("#district_code").html(html);
                                    $("#district_code").val(data.data.district_code);
                                    $("#sekolah").html(
                                        '<option value="">- Semua Sekolah -</option>'
                                    );
                                    $("#container-sekolah-lain").hide();


                                    $.ajax({
                                        url: "{{ url('posiadmin/get_sekolah_by_kecamatan_id') }}",
                                        type: "POST",
                                        dataType: "JSON",
                                        data: {
                                            "kecamatan": data.data
                                                .district_code,
                                            "level": data.level,
                                            "_token": csrf_token
                                        },
                                        success: function(response3) {
                                            var html = '';
                                            html +=
                                                '<option value="">- Semua Sekolah -</option>';
                                            for (var i = 0; i < response3
                                                .length; i++) {
                                                html += '<option value="' +
                                                    response3[i].sekolah +
                                                    '">' +
                                                    response3[i].sekolah +
                                                    '</option>';
                                            }
                                            html +=
                                                '<option value="lainnya">LAINNYA</option>';
                                            $("#sekolah").html(html);
                                            $("#sekolah").val(data.data.sekolah);
                                            $("#container-sekolah-lain")
                                                .hide();
                                        }
                                    })
                                }
                            });

                        }
                    });

                }
            });
        }





        $("#province_code").change(function() {
            var p = $(this).val();
            if(p == '') {
                p =0;
            }
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

                    $("#district_code").html('<option value="">- Semua Kecamatan -</option>');
                    $("#sekolah").html('<option value="">- Semua Sekolah -</option>');
                    $("#container-sekolah-lain").hide();
                }
            })
        });



        $("#city_code").change(function() {
            var p = $(this).val();
            if(p == '') {
                p =0;
            }
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
                    $("#sekolah").html('<option value="">- Semua Sekolah -</option>');
                    $("#container-sekolah-lain").hide();
                }
            })
        });


        $("#district_code").change(function() {
            var p = $(this).val();
            var level = $("#level").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ url('posiadmin/get_sekolah_by_kecamatan_id') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "kecamatan": p,
                    "level": level,
                    "_token": csrf_token
                },
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
                    data: {
                        "id": id,
                        '_token': csrf_token
                    },
                    success: function(data) {
                        table.ajax.reload(null, false);
                    }
                })
            }
        }


        function studyData(id) {

            $.ajax({
                url: "{{ url('posiadmin/competition') }}" + "/" + id,
                type: "GET",
                success: function(data) {
                    $("#competition_id").val(id);
                    $("#method-type").val("add");
                    $(".modal-title").text("Daftar Bidang Studi");
                    $("#modal-study").modal("show");
                    $("#modal-study-content").html(data.html);

                    var html = '';
                    html += '<option value=""> - Pilih jenjang - </option>';
                    for(var i=0; i<data.level.length; i++) {
                        html += '<option value="'+data.level[i].id+'">'+data.level[i].level_name+'</option>';
                    }

                    $("#s-jenjang").html(html);
                    reset_study();

                }
            });
        }



        $("#form-tambahan").submit(function(e) {
            e.preventDefault();
            var method = $("#method-type").val();

            var url = '';
            if (method == 'add') {
                url = "{{ url('posiadmin/simpan_study') }}";
            } else {
                url = "{{ url('posiadmin/update_study') }}";
            }
            $.ajax({

                url: url,
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function(data) {
                    if (data.success) {
                        reset_study();
                        studyData(data.id);
                    }
                }
            });
        })


        function editStudy(id) {
            $.ajax({
                url: "{{ url('posiadmin/edit_study') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.success) {
                        $("#method-type").val('edit');
                        $("#competition_id").val(data.data.competition_id);
                        $("#s-start-time").val(data.data.start_time);
                        $("#s-finish-time").val(data.data.finish_time);
                        $("#s-forum-link").val(data.data.forum_link);
                        $("#s-pelajaran").val(data.data.pelajaran_id);
                        $("#s-jenjang").val(data.data.level_id);
                        $("#study-id").val(id);
                    }
                }
            });
        }

        function deleteStudy(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Apakah anda yakin ingin menghapus bidang studi ini...?');
            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/delete_study') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_token": csrf_token
                    },
                    success: function(data) {
                        if (data.success) {
                            studyData(data.id);
                        }
                    }
                });
            }
        }


        function reset_study() {
            $("#s-pelajaran").val("");
            $("#s-start-time").val("");
            $("#s-finish-time").val("");
            $("#s-forum-link").val("");

        }
    </script>
@endif

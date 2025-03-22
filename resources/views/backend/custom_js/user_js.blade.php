@if ($view == 'user')
    <script>
        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Peserta');
            reset_form();
        }

        function reset_form() {
            $('#id').val("");
            $("#level_name").val("");
            $("#jenjang").val("");
        }

        var table = $('#table-list').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Blfrtip',
             buttons: [
                'print', {
                    extend: 'pdf',
                    orientation: 'landscape'
                },
                'excel'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            ajax: "{{ route('user.table') }}",
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
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'username',
                    name: 'username',
                },
                {
                    data: 'user_image',
                    name: 'user_image',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'whatsapp',
                    name: 'whatsapp',
                },
                {
                    data: 'level_id',
                    name: 'level_id',
                },
                {
                    data: 'kelas_id',
                    name: 'kelas_id',
                },
                {
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir',
                },
                {
                    data: 'agama',
                    name: 'agama',
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
                },
                {
                    data: 'provinsi',
                    name: 'provinsi',
                },
                {
                    data: 'kota',
                    name: 'kota',
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan',
                },
                {
                    data: 'nama_sekolah',
                    name: 'nama_sekolah',
                },

            ]
        });


        $("#form-tambah").submit(function(e) {
            loading("#btn-simpan-data");

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/user') }}";
            else url = "{{ url('/posiadmin/user') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    unloading("#btn-simpan-data");
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
                url: "{{ url('/posiadmin/user') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Peserta");
                    $('#id').val(data.id);
                    $("#name").val(data.name);
                    $("#username").val(data.username);
                    $("#password").val("");
                    $("#user_image").val(null);
                    $("#email").val(data.email);
                    $("#whatsapp").val(data.whatsapp);
                    $("#level_id").val(data.level_id);
                    list_kelas(data.level_id, data.kelas_id);
                    $("#tanggal_lahir").val(data.tanggal_lahir);
                    $("#agama").val(data.agama);
                    $("#jenis_kelamin").val(data.jenis_kelamin);
                    $("#provinsi").val(data.provinsi);
                    list_kabupaten(data.provinsi, data.kabupaten);
                    list_kecamatan(data.kabupaten, data.kecamatan);
                    list_sekolah(data.kecamatan, data.level_id, data.nama_sekolah);
                    $("#email_status").val(data.email_status);

                    
                }
            });
        }


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/user') }}" + "/" + id,
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


        $("#level_id").change(function() {
            var jenjang = $(this).val();
            list_kelas(jenjang, null);
            $("#provinsi").val("");
            $("#kabupaten").html('<option value=""> - Pilih Kabupaten - </option>');
            $("#kecamatan").html('<option value=""> - Pilih Kecamatan - </option>');
            $("#nama_sekolah").html('<option value=""> - Pilih Sekolah - </option>');

        });



        function list_kelas(jenjang, selected) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/list_kelas') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "jenjang": jenjang,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        var html = '';
                        html += '<option value=""> - Pilih Kelas - </option>';
                        for (var i = 0; i < data.data.length; i++) {
                            html += '<option value="' + data.data[i].id + '">' + data.data[i].nama_kelas +
                                '</option>';
                        }
                        $("#kelas_id").html(html);
                        if (selected !== null) {
                            $("#kelas_id").val(selected);
                        }
                    }

                }
            });
        }


        $("#provinsi").change(function() {
            var provinsi = $(this).val();
            list_kabupaten(provinsi, null);
            $("#kecamatan").val("");
            $("#nama_sekolah").val("");

        });



        function list_kabupaten(provinsi, selected) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/list_kabupaten') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "provinsi": provinsi,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        var html = '';
                        html += '<option value=""> - Pilih Kabupaten/Kota - </option>';
                        for (var i = 0; i < data.data.length; i++) {
                            html += '<option value="' + data.data[i].regency_code + '">' + data.data[i]
                                .regency_name +
                                '</option>';
                        }
                        $("#kabupaten").html(html);
                        if (selected !== null) {
                            $("#kabupaten").val(selected);
                        }
                    }

                }
            });
        }


        $("#kabupaten").change(function() {
            var kabupaten = $(this).val();
            list_kecamatan(kabupaten, null);
            $("#nama_sekolah").val("");

        });



        function list_kecamatan(kabupaten, selected) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/list_kecamatan') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "kabupaten": kabupaten,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        var html = '';
                        html += '<option value=""> - Pilih Kecamatan - </option>';
                        for (var i = 0; i < data.data.length; i++) {
                            html += '<option value="' + data.data[i].district_code + '">' + data.data[i]
                                .district_name +
                                '</option>';
                        }
                        $("#kecamatan").html(html);
                        if (selected !== null) {
                            $("#kecamatan").val(selected);
                        }
                    }

                }
            });
        }



        $("#kecamatan").change(function() {
            var kecamatan = $(this).val();
            var level = $("#level_id").val();
            list_sekolah(kecamatan, level, null);

        });



        function list_sekolah(kecamatan, level, selected) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/list_sekolah') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "kecamatan": kecamatan,
                    "level":level,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        var html = '';
                        html += '<option value=""> - Pilih Sekolah - </option>';
                        for (var i = 0; i < data.data.length; i++) {
                            html += '<option value="' + data.data[i].sekolah + '">' + data.data[i]
                                .sekolah +
                                '</option>';
                        }
                        html += '<option value="lainnya">Lainnya</option>';
                        $("#nama_sekolah").html(html);
                        if (selected !== null) {
                            $("#nama_sekolah").val(selected);
                        }
                    }

                }
            });
        }


        $("#nama_sekolah").change(function(){
            var nilai = $(this).val();
            if(nilai == 'lainnya') {
                $(".lainnya-container").slideDown(50);
            } else {
                $('.lainnya-container').slideUp(50);
            }
        });

        function reset(id) {
            
            var p = confirm('Yakin reset password..?');
            if(p === true) {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ url('posiadmin/reset_password') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {"id":id, "_token":csrf_token},
                    success: function(data) {
                        table.ajax.reload(null, false);
                        alert('Sukses reset password');
                    }
                });
            }
        }
    </script>
@endif

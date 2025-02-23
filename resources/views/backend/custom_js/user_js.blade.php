@if ($view == 'user')
    <script>
        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Level');
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
                'copy', 'csv', 'excel', 'pdf', 'print'
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
                    data: 'nama_sekolah',
                    name: 'nama_sekolah',
                },
               
            ]
        });


        $("#form-tambah").submit(function(e) {
            // loading("btn-save-data");

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/level') }}";
            else url = "{{ url('/posiadmin/level') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);
            
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
                url: "{{ url('/posiadmin/level') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Level");
                    $('#id').val(data.id);
                    $("#level_name").val(data.level_name);
                    $("#jenjang").val(data.jenjang);
                }
            });
        }

       
        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/level') }}" + "/" + id,
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

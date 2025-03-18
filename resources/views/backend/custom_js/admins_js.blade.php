@if ($view == 'admins')
    <script>
        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Admin');
            reset_form();
        }

        function reset_form() {
            $('#id').val("");
            $("#name").val("");
            $("#level").val("");
            $("#email").val("");
            $("#password").val("");
            $("#image").val(null);
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
            ajax: "{{ route('admins.table') }}",
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
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'level',
                    name: 'level',
                },
                

            ]
        });


        $("#form-tambah").submit(function(e) {
            $("#btn-simpan-data").text("Processing...");
            $("#btn-simpan-data").attr("disabled", true);

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/admins') }}";
            else url = "{{ url('/posiadmin/admins') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);
            
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#btn-simpan-data").text("Simpan");
                    $("#btn-simpan-data").removeAttr("disabled");
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
                url: "{{ url('/posiadmin/admins') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Admin");
                    $('#id').val(data.id);
                    $("#name").val(data.name);
                    $("#email").val(data.email);
                    $("#image").val(null);
                    $("#level").val(data.level);
                    $("#password").val("");
                }
            });
        }

       
        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/admins') }}" + "/" + id,
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

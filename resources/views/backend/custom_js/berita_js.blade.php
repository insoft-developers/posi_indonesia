@if ($view == 'beritas')
    <script>
        CKEDITOR.replace('content');

        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Berita');
            reset_form();
        }

        function reset_form() {
            $('#id').val("");
            $("#title").val("");
            $("#category").val("");
            $("#image").val(null);
            CKEDITOR.instances.content.setData("");
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
            ajax: "{{ route('berita.table') }}",
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
                    data: 'title',
                    name: 'title',
                },
                {
                    data: 'category',
                    name: 'category',
                },
                {
                    data: 'image',
                    name: 'image',
                },
                {
                    data: 'content',
                    name: 'content',
                },
                {
                    data: 'admin_id',
                    name: 'admin_id',
                },
                {
                    data: 'is_status',
                    name: 'is_status',
                },

            ]
        });


        $("#form-tambah").submit(function(e) {
            $("#btn-submit-form").text("Processing...");
            $("#btn-submit-form").attr("disabled", true);


            e.preventDefault();
            
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/beritas') }}";
            else url = "{{ url('/posiadmin/beritas') . '/' }}" + id;
            var news_content = CKEDITOR.instances.content.getData(); 

            var form = new FormData($('#modal-tambah form')[0]);
            form.append('content', news_content);


            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#btn-submit-form").text("Simpan");
                    $("#btn-submit-form").removeAttr("disabled");
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
                url: "{{ url('/posiadmin/beritas') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Berita");
                    $('#id').val(data.id);
                    $("#title").val(data.title);
                    $("#category").val(data.category);
                    $("#image").val(null);
                    CKEDITOR.instances.content.setData(data.content);
                    $("#is_status").val(data.is_status);
                }
            });
        }


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/beritas') }}" + "/" + id,
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
    </script>
@endif

@if ($view == 'product')
    <script>
        $("#product_for").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih'
        });

        $("#competition_id").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih Kompetisi'
        });

        $("#level_id").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih Jenjang'
        });

        $("#composition").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih Komposisi Produk'
        });

        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Produk');
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
            ajax: "{{ route('product.table') }}",
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
                    data: 'product_name',
                    name: 'product_name',
                },
                {
                    data: 'competition_id',
                    name: 'competition_id',
                },
                {
                    data: 'level_id',
                    name: 'level_id',
                },
                {
                    data: 'document_type',
                    name: 'document_type',
                },
                {
                    data: 'product_price',
                    name: 'product_price',
                },
                {
                    data: 'image',
                    name: 'image',
                },
                {
                    data: 'product_link',
                    name: 'product_link',
                },

                {
                    data: 'is_fisik',
                    name: 'is_fisik',
                },
                {
                    data: 'product_for',
                    name: 'product_for',
                },
                {
                    data: 'is_combo',
                    name: 'is_combo',
                },
                {
                    data: 'berat',
                    name: 'berat',
                },

                {
                    data: 'is_active',
                    name: 'is_active',
                },


            ]
        });


        $("#form-tambah").submit(function(e) {
            loading("#btn-simpan-data");

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/product') }}";
            else url = "{{ url('/posiadmin/product') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    unloading("#btn-simpan-data", "Save");
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
                url: "{{ url('/posiadmin/product') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Produk");
                    $('#id').val(data.id);
                    $("#product_name").val(data.product_name);
                    $("#product_price").val(data.product_price);
                    $("#image").val(null);
                    $("#product_link").val(data.product_link);
                    $("#document_type").val(data.document_type);
                    $("#is_fisik").val(data.is_fisik);
                    var product_for = explode(data.product_for);
                    $("#product_for").val(product_for).trigger('change');

                   

                    if(data.level_id == null) {
                        $("#level_id").val('').trigger('change');
                        console.log('null');
                    } else {
                        var level = explode(data.level_id);
                        $("#level_id").val(level).trigger('change');
                        console.log('not null');
                    }
                    


                    $("#is_combo").val(data.is_combo);
                    if (data.is_combo == 1) {
                        $(".composition-container").slideDown(10);
                        var komposisi = explode(data.composition);
                        $("#composition").val(komposisi).trigger('change');
                    } else {
                        $(".composition-container").slideUp(10);
                        $("#composition").val(null).trigger('change');
                    }
                    $("#berat").val(data.berat);

                    var competition_ids = [];
                    for(var i=0; i<data.product_competition.length; i++) {
                        competition_ids.push(data.product_competition[i].competition_id);
                    }

                    $("#competition_id").val(competition_ids).trigger('change');
                    $("#is_active").val(data.is_active);

                }
            });
        }


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/product') }}" + "/" + id,
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

        $("#is_combo").change(function() {
            var nilai = $(this).val();
            console.log(nilai);
            if (nilai == 1) {
                $(".composition-container").slideDown(100);
            } else {
                $(".composition-container").slideUp(100);
                $("#composition").val(null).trigger('change');
            }
        });


        function documentData(id) {
            
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/document-list') }}",
                type: "POST",
                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {
                    console.log(data);
                    $("#product_id").val(id);
                    $("#send_method").val('add');
                    $("#modal-document").modal("show");
                    $(".modal-title").text("Daftar Dokumen Produk");
                    $("#modal-document-content").html(data);
                    reset_document_form();
                }
            })



        }

        function reset_document_form() {
            $("#competition_id").val("");
            $("#document").val(null);
        }



        $("#form-document").submit(function(e) {
            e.preventDefault();
            loading("#btn-simpan-document");
            var product_id = $("#product_id").val();
            var method = $("#send_method").val();
            var form = new FormData($('#modal-document form')[0]);
            var url = '';
            if (method == 'add') {
                url = "{{ url('posiadmin/simpan_document') }}";
            } else {
                url = "{{ url('posiadmin/update_document') }}";
            }
            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    unloading("#btn-simpan-document");
                    if (data.success) {
                        documentData(product_id);
                    }
                }
            });
        })


        function editDocument(id) {
            $("#send_method").val('edit');
            $.ajax({
                url:"{{ url('posiadmin/document-edit') }}"+"/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $("#document_id").val(data.id);
                    $("#competition_id").val(data.competition_id);
                    $("#product_id").val(data.product_id);
                }
            });
            
        }

        function deleteDocument(id, product_id) {
            var pop = confirm('apakah anda yakin ingin menghapus data ini...?');
            if(pop === true) {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ url('posiadmin/document-delete') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {"id":id, "product_id":product_id, "_token":csrf_token},
                    success: function(data) {
                        documentData(product_id);
                    }
                });
            }
        }


    </script>
@endif

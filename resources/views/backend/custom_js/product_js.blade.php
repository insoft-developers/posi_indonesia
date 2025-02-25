@if ($view == 'product')
    <script>
        $("#product_for").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih'
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
                    data: 'competition_id',
                    name: 'competition_id',
                },
                {
                    data: 'study_id',
                    name: 'study_id',
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
                    data: 'document',
                    name: 'document',
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
                    $("#competition_id").val(data.competition_id);
                    change_competition(data.competition_id, data.study_id);
                    $("#is_fisik").val(data.is_fisik);
                    var product_for = explode(data.product_for);
                    $("#product_for").val(product_for).trigger('change');
                    $("#is_combo").val(data.is_combo);
                    if(data.is_combo == 1) {
                        $(".composition-container").slideDown(10);
                        var komposisi = explode(data.composition);
                        $("#composition").val(komposisi).trigger('change');
                    } else {
                        $(".composition-container").slideUp(10);
                        $("#composition").val(null).trigger('change');
                    }
                    $("#berat").val(data.berat);
                    $("#document_type").val(data.document_type);
                    if(data.document_type == 'sertifikat' || data.document_type == 'piagam') {
                        $(".document-container").slideDown(10);
                        $("#document").val(null);
                    } else {
                        $(".document-container").slideUp(10);
                        $("#document").val(null);
                    }
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

        $("#is_combo").change(function(){
            var nilai = $(this).val();
            console.log(nilai);
            if(nilai == 1) {
                $(".composition-container").slideDown(100);
            } else {
                $(".composition-container").slideUp(100);
                $("#composition").val(null).trigger('change');
            }
        });


        $("#document_type").change(function(){
            var nilai = $(this).val();
            console.log(nilai);
            if(nilai == 'piagam' || nilai == 'sertifikat' ) {
                $(".document-container").slideDown(100);
            } else {
                $(".document-container").slideUp(100);
                $("#document").val(null);
            }
        });

        $("#competition_id").change(function(){
            var id = $(this).val();
            change_competition(id, null);
        });

        function change_competition(id, nilai) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/product_study') }}",
                type: "POST",
                dataType: "JSON",
                data: {"id":id, "_token":csrf_token},
                success: function(data) {
                    console.log(data);
                    if(data.success) {
                        var html = '';
                        html += '<option value=""> - Pilih Bidang Pelajaran - </option>';
                        for(var i = 0; i<data.data.length; i++) {
                            html += '<option value="'+data.data[i].id+'">'+data.data[i].pelajaran.name+' - '+data.data[i].level.level_name+'</option>';
                        }
                        $("#study_id").html(html);

                        if(nilai !== null) {
                            $("#study_id").val(nilai);
                        }
                    }
                }
            });
        }


    </script>
@endif

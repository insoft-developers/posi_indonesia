@if ($view == 'pesanan')
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
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            ajax: "{{ route('pesanan.table') }}",
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
                    data: 'invoice',
                    name: 'invoice',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'userid',
                    name: 'userid',
                },
                {
                    data: 'total_amount',
                    name: 'total_amount',
                },
                {
                    data: 'delivery_cost',
                    name: 'delivery_cost',
                },
                {
                    data: 'grand_total',
                    name: 'grand_total',
                },
                {
                    data: 'payment_status',
                    name: 'payment_status',
                },
                {
                    data: 'transaction_status',
                    name: 'transaction_status',
                },
                {
                    data: 'image',
                    name: 'image',
                },
                {
                    data: 'payment_with',
                    name: 'payment_with',
                },
                {
                    data: 'payment_amount',
                    name: 'payment_amount',
                },
                {
                    data: 'payment_date',
                    name: 'payment_date',
                },
                {
                    data: 'buyer',
                    name: 'buyer',
                },
                

            ]
        });


        // $("#form-tambah").submit(function(e) {
        //     loading("#btn-simpan-data");

        //     e.preventDefault();
        //     var id = $('#id').val();
        //     if (save_method == "add") url = "{{ url('/posiadmin/user') }}";
        //     else url = "{{ url('/posiadmin/user') . '/' }}" + id;
        //     var form = new FormData($('#modal-tambah form')[0]);

        //     $.ajax({
        //         url: url,
        //         type: "POST",
        //         data: form,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {
        //             unloading("#btn-simpan-data");
        //             if (data.success) {
        //                 $('#modal-tambah').modal('hide');
        //                 table.ajax.reload(null, false);
        //             } else {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Failed',
        //                     html: data.message,
        //                     showConfirmButton: false,
        //                     scrollbarPadding: false,
        //                 });
        //             }
        //         }

        //     });
        // });

        // function editData(id) {
        //     save_method = "edit";
        //     $('input[name=_method]').val('PATCH');
        //     $.ajax({
        //         url: "{{ url('/posiadmin/user') }}" + "/" + id + "/edit",
        //         type: "GET",
        //         dataType: "JSON",
        //         success: function(data) {
        //             $('#modal-tambah').modal("show");
        //             $('.modal-title').text("Edit Peserta");
        //             $('#id').val(data.id);
        //             $("#name").val(data.name);
        //             $("#username").val(data.username);
        //             $("#password").val("");
        //             $("#user_image").val(null);
        //             $("#email").val(data.email);
        //             $("#whatsapp").val(data.whatsapp);
        //             $("#level_id").val(data.level_id);
        //             list_kelas(data.level_id, data.kelas_id);
        //             $("#tanggal_lahir").val(data.tanggal_lahir);
        //             $("#agama").val(data.agama);
        //             $("#jenis_kelamin").val(data.jenis_kelamin);
        //             $("#provinsi").val(data.provinsi);
        //             list_kabupaten(data.provinsi, data.kabupaten);
        //             list_kecamatan(data.kabupaten, data.kecamatan);
        //             list_sekolah(data.kecamatan, data.level_id, data.nama_sekolah);
        //             $("#email_status").val(data.email_status);

                    
        //         }
        //     });
        // }


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/pesanan') }}" + "/" + id,
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

        function detailData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $("#invoice_id").val(id);
            $.ajax({
                url: "{{ url('posiadmin/transaction_list') }}",
                type: "POST",
                data: {"id":id, "_token":csrf_token},
                success: function(data) {
                    
                    $("#modal-detail-content").html(data.data);
                    $(".modal-title").text('Data Transaksi');
                    $("#modal-detail").modal('show');
                    if(data.invoice.payment_status === 1) {
                        $("#btn-save-data").hide();
                        $("#btn-reject-data").show();
                    } else {
                        $("#btn-save-data").show();
                        $("#btn-reject-data").hide();
                    }
                    
                }
            })
        }

        $("#btn-save-data").click(function(){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var op = confirm('Approve data ini...?');
            var id = $("#invoice_id").val();
            if(op === true) {
                $.ajax({
                    url: "{{ url('posiadmin/transaction_approve') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": id,
                        '_token': csrf_token
                    },
                    success: function(data) {
                        table.ajax.reload(null, false);
                        $("#modal-detail").modal("hide");
                    }
                })
            }
        });



        $("#btn-reject-data").click(function(){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var op = confirm('Reset data ini...?');
            var id = $("#invoice_id").val();
            if(op === true) {
                $.ajax({
                    url: "{{ url('posiadmin/transaction_reset') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": id,
                        '_token': csrf_token
                    },
                    success: function(data) {
                        table.ajax.reload(null, false);
                        $("#modal-detail").modal("hide");
                    }
                })
            }
        });
        
    </script>
@endif

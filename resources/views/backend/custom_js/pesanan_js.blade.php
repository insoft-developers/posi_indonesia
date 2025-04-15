@if ($view == 'pesanan')
    <script>
        var table_not_approve = $('#table-transaction-not-approve').DataTable();
        var table_approve = $('#table-transaction-approve').DataTable();
        var table = $('#table-list').DataTable();


        $("#pills-home-tab").click(function() {
            $("#data-jenis").val(1);
        });

        $("#pills-profile-tab").click(function() {
            $("#data-jenis").val(2);
        });

        $("#pills-contact-tab").click(function() {
            $("#data-jenis").val(3);
        });


        $("#filter").change(function() {
            var filter = $(this).val();
            var filter2 = $("#filter2").val();
            var jenis = $("#data-jenis").val();
            if (jenis == 1) {
                init_table_not_approve(filter, filter2);
            } else if (jenis == 2) {

                init_table_approve(filter, filter2);
            } else if (jenis == 3) {

                init_table(filter, filter2);
            }

        });


        $("#filter2").change(function() {
            var filter2 = $(this).val();
            var filter = $("#filter").val();
            var jenis = $("#data-jenis").val();
            if (jenis == 1) {
                init_table_not_approve(filter, filter2);
            } else if (jenis == 2) {

                init_table_approve(filter, filter2);
            } else if (jenis == 3) {

                init_table(filter, filter2);
            }

        });


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

        init_table("", "");

        function init_table(filter, filter2) {
            table.destroy();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            table = $('#table-list').DataTable({
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
                // ajax: "{{ route('pesanan.table.not.approve') }}",
                ajax: {
                    type: "POST",
                    url: "{{ route('pesanan.table') }}",
                    data: {
                        "filter": filter,
                        "filter2": filter2,
                        '_token': csrf_token
                    }
                },
                order: [
                    [0, "desc"]
                ],
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
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
                        data: 'user_email',
                        name: 'user_email',
                    },
                    {
                        data: 'user_hp',
                        name: 'user_hp',
                    },
                    {
                        data: 'user_level',
                        name: 'user_level',
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
                        data: 'buyer',
                        name: 'buyer',
                    },
                    {
                        data: 'buyer_email',
                        name: 'buyer_email',
                    },
                    {
                        data: 'buyer_hp',
                        name: 'buyer_hp',
                    },
                    {
                        data: 'buyer_level',
                        name: 'buyer_level',
                    },


                ]
            });
        }


        init_table_not_approve("", "");

        function init_table_not_approve(filter, filter2) {
            table_not_approve.destroy();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            table_not_approve = $('#table-transaction-not-approve').DataTable({
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
                // ajax: "{{ route('pesanan.table.not.approve') }}",
                ajax: {
                    type: "POST",
                    url: "{{ route('pesanan.table.not.approve') }}",
                    data: {
                        "filter": filter,
                        "filter2": filter2,
                        '_token': csrf_token
                    }
                },
                order: [
                    [0, "desc"]
                ],
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
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
                        data: 'user_email',
                        name: 'user_email',
                    },
                    {
                        data: 'user_hp',
                        name: 'user_hp',
                    },
                    {
                        data: 'user_level',
                        name: 'user_level',
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
                        data: 'buyer',
                        name: 'buyer',
                    },
                   
                    {
                        data: 'buyer_email',
                        name: 'buyer_email',
                    },
                    {
                        data: 'buyer_hp',
                        name: 'buyer_hp',
                    },
                    {
                        data: 'buyer_level',
                        name: 'buyer_level',
                    },


                ]
            });
        }




        init_table_approve("", "");

        function init_table_approve(filter, filter2) {
            table_approve.destroy();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            table_approve = $('#table-transaction-approve').DataTable({
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
                // ajax: "{{ route('pesanan.table.not.approve') }}",
                ajax: {
                    type: "POST",
                    url: "{{ route('pesanan.table.approve') }}",
                    data: {
                        "filter": filter,
                        "filter2": filter2,
                        '_token': csrf_token
                    }
                },
                order: [
                    [0, "desc"]
                ],
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
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
                        data: 'user_email',
                        name: 'user_email',
                    },
                    {
                        data: 'user_hp',
                        name: 'user_hp',
                    },
                    {
                        data: 'user_level',
                        name: 'user_level',
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
                        data: 'buyer',
                        name: 'buyer',
                    },
                    
                    {
                        data: 'buyer_email',
                        name: 'buyer_email',
                    },
                    {
                        data: 'buyer_hp',
                        name: 'buyer_hp',
                    },
                    {
                        data: 'buyer_level',
                        name: 'buyer_level',
                    },


                ]
            });
        }

        table.on('click', 'input:checkbox', function() {
            var chkboxarray = [];
            $("#id:checked").each(function() {
                var nilai = $(this).attr("data-id");
                chkboxarray.push(nilai);
            });

            if (chkboxarray.length > 0) {
                $("#btn-bulk-approve").removeAttr("disabled");
            } else {
                $("#btn-bulk-approve").attr("disabled", true);
            }

            console.log(chkboxarray);
        });

        table_approve.on('click', 'input:checkbox', function() {
            var chkboxarray2 = [];
            $("#id:checked").each(function() {
                var nilai = $(this).attr("data-id");
                chkboxarray2.push(nilai);
            });

            if (chkboxarray2.length > 0) {
                $("#btn-bulk-approve").removeAttr("disabled");
            } else {
                $("#btn-bulk-approve").attr("disabled", true);
            }

            console.log(chkboxarray2);
        });


        table_not_approve.on('click', 'input:checkbox', function() {
            var chkboxarray3 = [];
            $("#id:checked").each(function() {
                var nilai = $(this).attr("data-id");
                chkboxarray3.push(nilai);
            });

            if (chkboxarray3.length > 0) {
                $("#btn-bulk-approve").removeAttr("disabled");
            } else {
                $("#btn-bulk-approve").attr("disabled", true);
            }

            console.log(chkboxarray3);
        });




        $("#btn-bulk-approve").click(function() {
            var pop = confirm('Proses Bulk Approve ...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            if (pop === true) {
                loading("#btn-bulk-approve");
                var id_array = [];
                $("#id:checked").each(function() {
                    id_array.push($(this).data("id"));
                });

                if (id_array.length > 0) {
                    var idstring = JSON.stringify(id_array);
                    $.ajax({
                        url: "{{ url('posiadmin/bulk_approve') }}",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            "id": idstring,
                            "_token": csrf_token
                        },
                        success: function(data) {
                            table.ajax.reload(null, false);
                            table_approve.ajax.reload(null, false);
                            table_not_approve.ajax.reload(null, false);
                            unloading2("#btn-bulk-approve");
                            $('#check-all').prop('checked', false);
                            $('#check-all-approve').prop('checked', false);
                            $('#check-all-not-approve').prop('checked', false);
                            $("#btn-bulk-approve").attr("disabled", true);
                        }
                    })
                }
            }
        });


        $("#check-all").click(function() {
            $('#table-list input:checkbox').not(this).prop('checked', this.checked);
        });

        $("#check-all-not-approve").click(function() {
            $('#table-transaction-not-approve input:checkbox').not(this).prop('checked', this.checked);
        });

        $("#check-all-approve").click(function() {
            $('#table-transaction-approve input:checkbox').not(this).prop('checked', this.checked);
        });


        // $("#check-all").click(function() {
        //     $('#table-list input:checkbox').not(this).prop('checked', this.checked);
        // });

        // table_approve.on("click", "#check-all-approve", function(){
        //     $('input:checkbox').not(this).prop('checked', this.checked);
        // });

        // table_not_approve.on("click", "#check-all-not-approve", function(){
        //     $('input:checkbox').not(this).prop('checked', this.checked);
        // });


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
                        table_approve.ajax.reload(null, false);
                        table_not_approve.ajax.reload(null, false);
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
                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {

                    $("#modal-detail-content").html(data.data);

                    $(".modal-title").text('Data Transaksi');
                    $("#modal-detail").modal('show');
                    var session = "{{ session('level') }}";
                    var free_com = data.invoice.grand_total;

                    if (session == 1) {
                        if (data.invoice.payment_status === 1) {
                            $("#btn-save-data").hide();
                            $("#btn-reject-data").show();
                        } else {
                            $("#btn-save-data").show();
                            $("#btn-reject-data").hide();
                        }
                    } else if (session == 2) {
                        if (free_com == 0) {
                            if (data.invoice.payment_status === 1) {
                                $("#btn-save-data").hide();
                                $("#btn-reject-data").show();
                            } else {
                                $("#btn-save-data").show();
                                $("#btn-reject-data").hide();
                            }
                        } else {
                            $("#btn-save-data").hide();
                            $("#btn-reject-data").hide();
                        }
                    } else {
                        $("#btn-save-data").hide();
                        $("#btn-reject-data").hide();
                    }


                }
            })
        }

        $("#btn-save-data").click(function() {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var op = confirm('Approve data ini...?');
            var id = $("#invoice_id").val();
            if (op === true) {
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
                        table_approve.ajax.reload(null, false);
                        table_not_approve.ajax.reload(null, false);
                        $("#modal-detail").modal("hide");
                    }
                })
            }
        });



        $("#btn-reject-data").click(function() {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var op = confirm('Reset data ini...?');
            var id = $("#invoice_id").val();
            if (op === true) {
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
                        table_approve.ajax.reload(null, false);
                        table_not_approve.ajax.reload(null, false);
                        $("#modal-detail").modal("hide");
                    }
                })
            }
        });
    </script>
@endif

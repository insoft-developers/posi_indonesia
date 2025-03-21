@if ($view == 'order')
    <script>

        var table = $("#table-list").DataTable();
        // function tambah() {
        //     save_method = "add";
        //     $('input[name=_method]').val('POST');
        //     $("#modal-tambah").modal("show");
        //     $(".modal-title").text('Tambah Level');
        //     reset_form();
        // }

        // function reset_form() {
        //     $('#id').val("");
        //     $("#level_name").val("");
        //     $("#jenjang").val("");
        // }
        init_table_order("","","");

        function init_table_order(date_from, date_to, payment_status) {
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
                ajax: {
                    type: "POST",
                    url: "{{ route('order.table') }}",
                    data: {
                        "date_from": date_from,
                        "date_to":date_to,
                        "payment_status":payment_status,
                        "_token": csrf_token
                    }
                },
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
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'invoice',
                        name: 'invoice',
                    },
                    {
                        data: 'order_date',
                        name: 'order_date',
                    },
                    {
                        data: 'payment_date',
                        name: 'payment_date',
                    },
                    {
                        data: 'userid',
                        name: 'userid',
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
                        data: 'user_hp',
                        name: 'user_hp',
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
                        data: 'province',
                        name: 'province',
                    },
                    {
                        data: 'school_name',
                        name: 'school_name',
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
                        data: 'medali',
                        name: 'medali',
                    },
                    {
                        data: 'nilai',
                        name: 'nilai',
                    },
                    {
                        data: 'grade',
                        name: 'grade',
                    },
                    {
                        data: 'product_id',
                        name: 'product_id',
                    },
                    {
                        data: 'product_name',
                        name: 'product_name',
                    },
                    {
                        data: 'composition',
                        name: 'composition',
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',
                    },
                    {
                        data: 'unit_price',
                        name: 'unit_price',
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                    },
                    {
                        data: 'pemesan',
                        name: 'pemesan',
                    },
                    {
                        data: 'email_pemesan',
                        name: 'email_pemesan',
                    },
                    {
                        data: 'hp_pemesan',
                        name: 'hp_pemesan',
                    },
                    {
                        data: 'ongkos_kirim',
                        name: 'ongkos_kirim',
                    },
                    {
                        data: 'province_name',
                        name: 'province_name',
                    },
                    {
                        data: 'city_name',
                        name: 'city_name',
                    },
                    {
                        data: 'district_name',
                        name: 'district_name',
                    },
                    {
                        data: 'kurir',
                        name: 'kurir',
                    },
                    {
                        data: 'service',
                        name: 'service',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },

                    {
                        data: 'nama_penerima',
                        name: 'nama_penerima',
                    },
                    {
                        data: 'hp_penerima',
                        name: 'hp_penerima',
                    },


                ]
            });
        }




        $("#btn-filter-data").click(function() {
            var date_from = $("#date_from").val();
            var date_to = $("#date_to").val();
            var payment_status = $("#payment_status").val();
            init_table_order(date_from, date_to, payment_status); 


        });


        $("#btn-reset-data").click(function(){
            init_table_order("", "", "");
            $("#date_from").val("");
            $("#date_to").val("");
            $("#payment_status").val(""); 
        });




        // $("#form-tambah").submit(function(e) {
        //     // loading("btn-save-data");

        //     e.preventDefault();
        //     var id = $('#id').val();
        //     if (save_method == "add") url = "{{ url('/posiadmin/level') }}";
        //     else url = "{{ url('/posiadmin/level') . '/' }}" + id;
        //     var form = new FormData($('#modal-tambah form')[0]);

        //     $.ajax({
        //         url: url,
        //         type: "POST",
        //         data: form,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {
        //             // unloading("btn-save-data", "Save");
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
        //         url: "{{ url('/posiadmin/level') }}" + "/" + id + "/edit",
        //         type: "GET",
        //         dataType: "JSON",
        //         success: function(data) {
        //             $('#modal-tambah').modal("show");
        //             $('.modal-title').text("Edit Level");
        //             $('#id').val(data.id);
        //             $("#level_name").val(data.level_name);
        //             $("#jenjang").val(data.jenjang);
        //         }
        //     });
        // }


        // function deleteData(id) {
        //     var csrf_token = $('meta[name="csrf-token"]').attr('content');
        //     var pop = confirm('Hapus Data ?');

        //     if (pop === true) {
        //         $.ajax({
        //             url: "{{ url('posiadmin/level') }}" + "/" + id,
        //             type: "DELETE",
        //             dataType: "JSON",
        //             data: {"id":id, '_token':csrf_token},
        //             success: function(data) {
        //                 table.ajax.reload(null, false);
        //             }
        //         })
        //     }
        // }
    </script>
@endif

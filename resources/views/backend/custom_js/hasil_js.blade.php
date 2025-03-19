@if ($view == 'hasil')
    <script>
        
        
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
            ajax: "{{ url('posiadmin/session_exam_table') }}"+"/{{ $id }}",
            order: [
                [0, "desc"]
            ],
            columns: [{
                    data: 'id',
                    name: 'id',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
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
                    data: 'userid',
                    name: 'userid',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'is_finish',
                    name: 'is_finish',
                },
               
                {
                    data: 'jumlah_benar',
                    name: 'jumlah_benar',
                },
                {
                    data: 'jumlah_salah',
                    name: 'jumlah_salah',
                },
                {
                    data: 'jumlah_lewat',
                    name: 'jumlah_lewat',
                },
                {
                    data: 'total_score',
                    name: 'total_score',
                },
                {
                    data: 'medali',
                    name: 'medali',
                },
                {
                    data: 'nilai',
                    name: 'nilai',
                },
                

            ]
        });


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/hasil') }}" + "/" + id,
                    type: "DELETE",
                    dataType: "JSON",
                    data: {"id":id, '_token':csrf_token},
                    success: function(data) {
                        table.ajax.reload(null, false);
                    }
                })
            }
        }


        table.on('click', 'input:checkbox', function() {
            var chkboxarray = [];
            $("#id:checked").each(function() {
                var nilai = $(this).attr("data-id");
                chkboxarray.push(nilai);
            });

            if (chkboxarray.length > 0) {
                $("#btn-bulk-delete").removeAttr("disabled");
            } else {
                $("#btn-bulk-delete").attr("disabled", true);
            }

            console.log(chkboxarray);
        });

        $("#check-all").click(function() {
            $('#table-list input:checkbox').not(this).prop('checked', this.checked);
        });



        $("#btn-bulk-delete").click(function() {
            var pop = confirm('Proses Bulk Delete ...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            if (pop === true) {
                loading("#btn-bulk-delete");
                var id_array = [];
                $("#id:checked").each(function() {
                    id_array.push($(this).data("id"));
                });

                if (id_array.length > 0) {
                    var idstring = JSON.stringify(id_array);
                    $.ajax({
                        url: "{{ url('posiadmin/bulk_delete') }}",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            "id": idstring,
                            "_token": csrf_token
                        },
                        success: function(data) {
                            table.ajax.reload(null, false);
                            unloading2("#btn-bulk-delete");
                            $('#check-all').prop('checked', false);
                            $("#btn-bulk-delete").attr("disabled", true);
                            if(data.success) {
                                alert(data.message);
                            } else {
                                alert(data.message);
                            }
                        }
                    })
                }
            }
        });

    </script>
@endif


@if ($view == 'hasil-detail')
    <script>
        
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
            ajax: "{{ url('posiadmin/hasil_detail_table') }}"+"/"+"{{ $id }}",
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
                    data: 'nomor_soal',
                    name: 'nomor_soal',
                },
                {
                    data: 'jawaban_soal',
                    name: 'jawaban_soal',
                },
                {
                    data: 'hasil_jawaban',
                    name: 'hasil_jawaban',
                },
                {
                    data: 'score',
                    name: 'score',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
               
              

            ]
        });


        function deleteDetail(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/hasil_detail_delete') }}",
                    type: "POST",
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

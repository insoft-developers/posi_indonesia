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
            ajax: "{{ route('hasil.table') }}",
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

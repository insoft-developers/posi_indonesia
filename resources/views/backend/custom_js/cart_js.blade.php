@if ($view == 'cart')
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
            ajax: "{{ route('cart.table') }}",
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
                    data: 'buyer',
                    name: 'buyer',
                    
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
                    data: 'product_id',
                    name: 'product_id',
                    
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
                    data: 'total_purchase',
                    name: 'total_purchase',
                    
                },
                {
                    data: 'userid',
                    name: 'userid',
                    
                },
               
                

            ]
        });
       
        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/cart') }}" + "/" + id,
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

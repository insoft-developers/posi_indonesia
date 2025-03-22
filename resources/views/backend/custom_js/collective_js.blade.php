@if ($view == 'collective')
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
            ajax: "{{ route('collective.table') }}",
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
                    data: 'userid',
                    name: 'userid',
                },
                {
                    data: 'study_id',
                    name: 'study_id',
                    orderable: false,
                },


            ]
        });
    </script>
@endif


@if ($view == 'collective-study')
    <script>
        function daftar(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/get_daftar') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {
                    $("#study_id").val(id);
                    $(".modal-title").text(data.pelajaran.name + ' - ' + data.level.level_name);
                    $("#modal-daftar").modal("show");
                }
            });
        }


        var segment_uri = $("#segment-url").val();
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
            ajax: "{{ url('posiadmin/collective_study_table') }}" + "/" + segment_uri,
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
                    data: 'study_id',
                    name: 'study_id',
                },
                {
                    data: 'level_id',
                    name: 'level_id',
                    orderable: false,
                },


            ]
        });


        $("#modal-daftar form").submit(function(e) {
            e.preventDefault();
            $("#btn-submit-pendaftaran").text("importing data....");
            $("#btn-submit-pendaftaran").attr("disabled", true);
            $.ajax({
                url: "{{ route('pendaftaran.upload') }}",
                type: "POST",
                data: new FormData($('#modal-daftar form')[0]),
                contentType: false,
                processData: false,
                success: function(data) {

                    console.log(data);

                    if (data.success) {
                        $("#modal-daftar").modal("hide");
                        $("#file").val(null);
                        // reloadTable();
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            html: data.failed,
                            showConfirmButton: false,
                            scrollbarPadding: false,
                        });
                        $("#btn-submit-pendaftaran").text("Upload Pendaftaran");
                        $("#btn-submit-pendaftaran").removeAttr("disabled");

                    } else {
                        $("#modal-daftar").modal("hide");
                        $("#file").val(null);
                        // reloadTable();
                        Swal.fire({
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false,
                            scrollbarPadding: false,
                        });
                        $("#btn-submit-pendaftaran").text("Upload Pendaftaran");
                        $("#btn-submit-pendaftaran").removeAttr("disabled");
                    }
                }
            })
        });
    </script>
@endif



@if ($view == 'collective-list')
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
            ajax: "{{ url('posiadmin/collective_list_table') }}"+"/"+"{{ $comid }}"+"/"+"{{ $id }}",
            order: [
                [0, "desc"]
            ],
            columns: [{
                    data: 'id',
                    name: 'id',
                    
                },
                // {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false,
                //     searchable: false
                // },
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
                    data: 'user_school',
                    name: 'user_school',
                },
                {
                    data: 'user_level',
                    name: 'user_level',
                },
                {
                    data: 'user_kelas',
                    name: 'user_kelas',
                },
                {
                    data: 'user_province',
                    name: 'user_province',
                },
                {
                    data: 'user_city',
                    name: 'user_city',
                },
                {
                    data: 'user_district',
                    name: 'user_district',
                },
                {
                    data: 'user_gender',
                    name: 'user_gender',
                },
                {
                    data: 'user_agama',
                    name: 'user_agama',
                },
               
                {
                    data: 'invoice',
                    name: 'invoice',
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
                    data: 'unit_price',
                    name: 'unit_price',
                },
                {
                    data: 'quantity',
                    name: 'quantity',
                },
                {
                    data: 'amount',
                    name: 'amount',
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
                    data: 'buyer_school',
                    name: 'buyer_school',
                },
                {
                    data: 'buyer_level',
                    name: 'buyer_level',
                },
                {
                    data: 'buyer_kelas',
                    name: 'buyer_kelas',
                },
                {
                    data: 'buyer_province',
                    name: 'buyer_province',
                },
                {
                    data: 'buyer_city',
                    name: 'buyer_city',
                },
                {
                    data: 'buyer_district',
                    name: 'buyer_district',
                },
                {
                    data: 'buyer_gender',
                    name: 'buyer_gender',
                },
                
                {
                    data: 'buyer_agama',
                    name: 'buyer_agama',
                },
                
               
               


            ]
        });


      
    </script>
@endif

@if ($view == 'winner')
    <script>
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
            ajax: "{{ url('posiadmin/winner_table') }}"+"/"+"{{ $id }}",
            order: [
                [8, "asc"],
                [10, "desc"]
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
                    data: 'userid',
                    name: 'userid',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'hp',
                    name: 'hp',
                },
                {
                    data: 'province_id',
                    name: 'province_id',
                },
                {
                    data: 'city',
                    name: 'city',
                },
                {
                    data: 'district',
                    name: 'district',
                },
                {
                    data: 'level',
                    name: 'level',
                },
               
                {
                    data: 'nama_sekolah',
                    name: 'nama_sekolah',
                },
                {
                    data: 'kelas',
                    name: 'kelas',
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
                },
                {
                    data: 'agama',
                    name: 'agama',
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
                {
                    data: 'waktu',
                    name: 'waktu',
                },
               
                

            ]
        });


        $("#form-tambah").submit(function(e) {
            $("#btn-submit-form").text("Processing....");
            $("#btn-submit-form").attr("disabled", true);

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/winner') }}";
            else url = "{{ url('/posiadmin/winner') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);
            
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
                url: "{{ url('/posiadmin/winner') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Data Pemenang");
                    $('#id').val(data.id);
                    $("#name").val(data.user.name);
                    $("#benar").val(data.jumlah_benar);
                    $("#salah").val(data.jumlah_salah);
                    $("#total_score").val(data.total_score);
                    $("#medali").val(data.medali);
                    $("#nilai").val(data.nilai);
                }
            });
        }

       
        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/winner') }}" + "/" + id,
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

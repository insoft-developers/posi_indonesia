@if ($view == 'soal')
    <script>
        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Soal Ujian');
            reset_form();
        }

        function reset_form() {
            $('#id').val("");
            $("#competition_id").val("");
            $("#study_id").val("");
            $("#level_id").val("");
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
            ajax: "{{ route('soal.table') }}",
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
                    data: 'competition_id',
                    name: 'competition_id',
                },
                {
                    data: 'study_id',
                    name: 'study_id',
                },
                {
                    data: 'level_id',
                    name: 'level_id',
                },
                {
                    data: 'admin_id',
                    name: 'admin_id',
                },

            ]
        });


        $("#form-tambah").submit(function(e) {
            loading("#btn-simpan-data");

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/soal') }}";
            else url = "{{ url('/posiadmin/soal') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    unloading("#btn-simpan-data");
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
                url: "{{ url('/posiadmin/soal') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Peserta");
                    $('#id').val(data.id);
                    $("#competition_id").val(data.competition_id);
                    get_level(data.competition_id, data.level_id);
                    get_study(data.level_id, data.competition_id, data.study_id);
                    
                }
            });
        }


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/soal') }}" + "/" + id,
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


        

        $("#competition_id").change(function(){
            var nilai = $(this).val();
            get_level(nilai, null);
            $("#study_id").html('<option value=""> - Pilih - </option>');
        });

        function get_level(nilai, selected) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/get_level') }}",
                type: "POST",
                dataType: "JSON",
                data: {"id":nilai, "_token":csrf_token},
                success: function(data){
                    var html = '';
                    html += '<option value=""> - Pilih - </option>';
                    for(var i=0; i<data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].level_name+'</option>';
                    }
                    $("#level_id").html(html);
                    if(selected !== null) {
                        $("#level_id").val(selected);
                    }
                }
            });

        }



        $("#level_id").change(function(){
            var nilai = $(this).val();
            var competition_id = $("#competition_id").val();
            get_study(nilai, competition_id, null);
        });

        function get_study(nilai, com, selected) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('posiadmin/get_study') }}",
                type: "POST",
                dataType: "JSON",
                data: {"id":nilai,"com":com, "_token":csrf_token},
                success: function(data){
                    var html = '';
                    html += '<option value=""> - Pilih - </option>';
                    for(var i=0; i<data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].pelajaran.name+'</option>';
                    }
                    $("#study_id").html(html);
                    if(selected !== null) {
                        $("#study_id").val(selected);
                    }
                }
            });

        }

        
    </script>
@endif

@if ($view == 'pengumuman')
    <script>

        function published(id, is_status) {
            var pesan = '';
            if(is_status == 1) {
                pesan = 'Hapus publish...?';
            } else if(is_status == 2) {
                pesan = 'Publish pengumuman....?';
            }

            var pop = confirm(pesan);
            if(pop === true) {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('publish') }}",
                    type: "POST",
                    datType: "JSON",
                    data: {"id":id, "is_status":is_status, "_token":csrf_token},
                    success: function(data){
                        table.ajax.reload(null, false);
                    }
                })
            }
        }

        $("#study_id").select2({
            dropdownParent: $("#modal-tambah .modal-content"),
            placeholder: 'Pilih'
        });

        $("#competition_id").change(function() {
            var competisi = $(this).val();
            change_competition(competisi, null);
        });


        function change_competition(competisi, selected) {
            $.ajax({
                url: "{{ url('posiadmin/get_pengumuman_study') }}" + "/" + competisi,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    var html = '';
                    html += '<option value=""> - Pilih Bidang Studi - </option>';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].pelajaran.name +
                            ' - ' + data[i].level.level_name + '</option>';
                    }

                    $("#study_id").html(html);
                    if (selected !== null) {
                        $("#study_id").val(selected).trigger('change');
                    }
                }
            });
        }


        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Buat pengumuman baru');
            reset_form();
        }

        function reset_form() {
            $('#id').val("");
            $("#competition_id").val("");
            $("#study_id").val(null).trigger('change');
            $("#description").val("");

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
            ajax: "{{ route('pemberitahuan.table') }}",
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
                    data: 'description',
                    name: 'description',
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
                    data: 'is_status',
                    name: 'is_status',
                },


            ]
        });


        $("#form-tambah").submit(function(e) {
            $("#btn-simpan-data").text("Processing...");
            $("#btn-simpan-data").attr("disabled", true);

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/pemberitahuan') }}";
            else url = "{{ url('/posiadmin/pemberitahuan') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#btn-simpan-data").text("Simpan");
                    $("#btn-simpan-data").removeAttr("disabled");
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
                url: "{{ url('/posiadmin/pemberitahuan') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Pengumuman");
                    $('#id').val(data.id);
                    $("#description").val(data.description);
                    $("#competition_id").val(data.competition_id);
                    var study = data.study_id;
                    var study_string = study.split(",");

                    change_competition(data.competition_id, study_string);
                }
            });
        }


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/pemberitahuan') }}" + "/" + id,
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


        function hitungData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hitung hasil ujian dan buat pengumuman ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/hitung_hasil_ujian') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": id,
                        '_token': csrf_token
                    },
                    success: function(data) {
                        
                        if (data.success) {
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
                })
            }
        }
    </script>
@endif

@if ($view == 'question')
    <script>
        var link = {{ Request::segment(3) }};


        CKEDITOR.replace('question_title');
        CKEDITOR.replace('option_a');
        CKEDITOR.replace('option_b');
        CKEDITOR.replace('option_c');
        CKEDITOR.replace('option_d');
        CKEDITOR.replace('option_e');

        function tambah() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $("#modal-tambah").modal("show");
            $(".modal-title").text('Tambah Soal Ujian');
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
            ajax: "{{ url('posiadmin/question-table') }}" + "/" + link,
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
                    name: 'competition_id'
                },
                {
                    data: 'question_number',
                    name: 'question_number'
                },
                {
                    data: 'question_title',
                    name: 'question_title'
                },
                {
                    data: 'option_a',
                    name: 'option_a'
                },
                {
                    data: 'option_b',
                    name: 'option_b'
                },
                {
                    data: 'option_c',
                    name: 'option_c'
                },
                {
                    data: 'option_d',
                    name: 'option_d'
                },
                {
                    data: 'option_e',
                    name: 'option_e'
                },
                {
                    data: 'score_benar',
                    name: 'score_benar'
                },
                {
                    data: 'answer_key',
                    name: 'answer_key'
                },
                {
                    data: 'admin_id',
                    name: 'admin_id'
                },


            ]
        });


        $("#form-tambah").submit(function(e) {
            // loading("btn-save-data");

            e.preventDefault();
            var id = $('#id').val();
            if (save_method == "add") url = "{{ url('/posiadmin/ujian') }}";
            else url = "{{ url('/posiadmin/ujian') . '/' }}" + id;
            var form = new FormData($('#modal-tambah form')[0]);
            var question_title = CKEDITOR.instances.question_title.getData();
            var option_a = CKEDITOR.instances.option_a.getData();
            var option_b = CKEDITOR.instances.option_b.getData();
            var option_c = CKEDITOR.instances.option_c.getData();
            var option_d = CKEDITOR.instances.option_d.getData();
            var option_e = CKEDITOR.instances.option_e.getData();

            form.append('question_title', question_title);
            form.append('option_a', option_a);
            form.append('option_b', option_b);
            form.append('option_c', option_c);
            form.append('option_d', option_d);
            form.append('option_e', option_e);


            $.ajax({
                url: url,
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    // unloading("btn-save-data", "Save");
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
                url: "{{ url('/posiadmin/ujian') }}" + "/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Soal Ujian");
                    $('#id').val(data.id);

                    $("#soal_id").val(data.soal_id);
                    $("#question_number").val(data.question_number);
                    CKEDITOR.instances.question_title.setData(data.question_title);
                    $("#question_image").val(null);

                    CKEDITOR.instances.option_a.setData(data.option_a);
                    $("#option_image_a").val(null);

                    CKEDITOR.instances.option_b.setData(data.option_b);
                    $("#option_image_b").val(null);

                    CKEDITOR.instances.option_c.setData(data.option_c);
                    $("#option_image_c").val(null);

                    CKEDITOR.instances.option_d.setData(data.option_d);
                    $("#option_image_d").val(null);

                    CKEDITOR.instances.option_e.setData(data.option_e);
                    $("#option_image_e").val(null);

                    $("#score_benar").val(data.score_benar);
                    $("#score_salah").val(data.score_salah);
                    $("#score_lewat").val(data.score_lewat);
                    $("#answer_key").val(data.answer_key);

                    if(data.orientation == null) {
                        $("#orientation").val(0);
                    } else {
                        $("#orientation").val(data.orientation);
                    }
                    


                }
            });
        }


        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pop = confirm('Hapus Data ?');

            if (pop === true) {
                $.ajax({
                    url: "{{ url('posiadmin/ujian') }}" + "/" + id,
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
    </script>
@endif

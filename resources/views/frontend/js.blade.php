<script>
    var monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
        "Agustus", "September", "Oktober", "November", "Desember"
    ];
    var dayOfWeekNames = [
        "Minggu", "Senin", "Selasa",
        "Rabu", "Kamis", "Jumat", "Sabtu"
    ];

    function formatDate(date, patternStr) {
        if (!patternStr) {
            patternStr = 'M/d/yyyy';
        }
        var day = date.getDate(),
            month = date.getMonth(),
            year = date.getFullYear(),
            hour = date.getHours(),
            minute = date.getMinutes(),
            second = date.getSeconds(),
            miliseconds = date.getMilliseconds(),
            h = hour % 12,
            hh = twoDigitPad(h),
            HH = twoDigitPad(hour),
            mm = twoDigitPad(minute),
            ss = twoDigitPad(second),
            aaa = hour < 12 ? 'AM' : 'PM',
            EEEE = dayOfWeekNames[date.getDay()],
            EEE = EEEE.substr(0, 3),
            dd = twoDigitPad(day),
            M = month + 1,
            MM = twoDigitPad(M),
            MMMM = monthNames[month],
            MMM = MMMM.substr(0, 3),
            yyyy = year + "",
            yy = yyyy.substr(2, 2);
        // checks to see if month name will be used
        patternStr = patternStr
            .replace('hh', hh).replace('h', h)
            .replace('HH', HH).replace('H', hour)
            .replace('mm', mm).replace('m', minute)
            .replace('ss', ss).replace('s', second)
            .replace('S', miliseconds)
            .replace('dd', dd).replace('d', day)

            .replace('EEEE', EEEE).replace('EEE', EEE)
            .replace('yyyy', yyyy)
            .replace('yy', yy)
            .replace('aaa', aaa);
        if (patternStr.indexOf('MMM') > -1) {
            patternStr = patternStr
                .replace('MMMM', MMMM)
                .replace('MMM', MMM);
        } else {
            patternStr = patternStr
                .replace('MM', MM)
                .replace('M', M);
        }
        return patternStr;
    }

    function twoDigitPad(num) {
        return num < 10 ? "0" + num : num;
    }
    // console.log(formatDate(new Date()));
    // console.log(formatDate(new Date(), 'dd-MMM-yyyy')); //OP's request
    // console.log(formatDate(new Date(), 'EEEE, dd MMMM yyyy'));
    // console.log(formatDate(new Date(), 'EEE, MMM d, yyyy HH:mm'));
    // console.log(formatDate(new Date(), 'yyyy-MM-dd HH:mm:ss.S'));
    // console.log(formatDate(new Date(), 'M/dd/yyyy h:mmaaa'));
</script>

@if ($view == 'main')
    <script>
        var jumlah_kompetisi = $("#jumlah_kompetisi").val();

        for (var i = 0; i < jumlah_kompetisi; i++) {
            countdown_waktu(i);
        }


        function countdown_waktu(index) {

            var waktu = $("#waktu_" + index).val();
            var countDownDate = moment(waktu);

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = moment();

                // Find the distance between now and the count down date
                var distance = countDownDate.diff(now);

                // Time calculations for days, hours, minutes and seconds
                var days = moment.duration(distance).days();
                var hours = moment.duration(distance).hours();
                var minutes = moment.duration(distance).minutes();
                var seconds = moment.duration(distance).seconds();

                // Display the result in the element with id="countdown"
                document.getElementById("countdown_" + index).innerHTML = days + " Hari " + hours + ":" +
                    minutes + ":" + seconds;

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown_" + index).innerHTML = "EXPIRED";
                }
            }, 1000);
        }
        // Set the date we're counting down to
    </script>
    <Script>
        const selected_studies = [];
        var selected_competition = -1;
        const selected_time = [];

        let jam_bentrok = [];

        $('#image-syarat1').click(function() {
            $('#file1').trigger('click');
        });

        $("#file1").change(function() {
            document.getElementById('image-syarat1').src = window.URL.createObjectURL(this.files[0]);
            // $("#tutup1").show();
        });

        $('#image-syarat2').click(function() {
            $('#file2').trigger('click');
        });

        $("#file2").change(function() {
            document.getElementById('image-syarat2').src = window.URL.createObjectURL(this.files[0]);
            // $("#tutup1").show();
        });


        $('#image-syarat3').click(function() {
            $('#file3').trigger('click');
        });

        $("#file3").change(function() {
            document.getElementById('image-syarat3').src = window.URL.createObjectURL(this.files[0]);
            // $("#tutup1").show();
        });

        function syarat_gratis() {
            if (selected_studies.length > 0) {
                $("#modal-daftar").modal("hide");
                $("#modal-gratis").modal("show");
            } else {
                alert("tidak ada bidang studi yang diplih !");
            }

        }


        function daftar(id) {
            $("#modal-daftar").modal("show");
            $("#competition_id").val(id);
        }


        function personal_register() {
            var id = $("#competition_id").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('get_competition_data') }}",
                type: "POST",

                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {
                    jam_bentrok = [];
                    var details = data.detail;
                    $("#modal-subtitle").text("Pendaftaran Event " + data.data.title);

                    var html = '';
                    html += '<table class="table">';
                    for (var i = 0; i < details.length; i++) {


                        if (details[i].cart === null && details[i].transaction === null) {

                            jam_bentrok.push(0);

                            html += '<tr onclick="add_to_cart(' + details[i].id + ',' + details[i]
                                .competition_id +
                                ',' + i + ')" class="baris" id="baris_' + i + '">';
                            html +=
                                '<td width="15%"><img class="image-pendaftaran" src="{{ asset('template/frontend/assets/umum/study.png') }}"></td>';
                            html += '<td width="*" style="vertical-align:middle;"><span class="detail-name">' +
                                details[i].pelajaran.name +
                                ' ' + details[i].level.level_name + '</span><br><span class="detail-date">' +
                                formatDate(new Date(details[i].start_date), 'EEEE, dd MMMM yyyy') +
                                '</span><br><span class="detail-time">' + details[i].start_time.substring(0,
                                    5) +
                                ' - ' + details[i].finish_time.substring(0, 5) +
                                '</span><input type="hidden" id="jam_mulai_' + i + '" value="' + details[i]
                                .start_time + '"><input type="hidden" id="jam_selesai_' + i + '" value="' +
                                details[i].finish_time + '"><input type="hidden" id="tanggal_mulai_' + i +
                                '" value="' + details[i].start_date + '"></td>';
                            html +=
                                '<td width="10%"><span class="image-pilih" id="image_pilih_' + i +
                                '" style="display:none;">Added</span></td>';
                            html += '</tr>';
                        } else {
                            

                            jam_bentrok.push(details[i].start_time);

                            if (details[i].transaction !== null) {
                                html += '<tr class="baris baris-active" id="baris_' + i + '">';
                                html +=
                                    '<td width="15%"><img class="image-pendaftaran" src="{{ asset('template/frontend/assets/umum/study.png') }}"></td>';
                                html +=
                                    '<td width="*" style="vertical-align:middle;"><span class="detail-name">' +
                                    details[i].pelajaran.name +
                                    ' ' + details[i].level.level_name +
                                    '</span><br><span class="detail-date">' +
                                    formatDate(new Date(details[i].start_date), 'EEEE, dd MMMM yyyy') +
                                    '</span><br><span class="detail-time">' + details[i].start_time.substring(0,
                                        5) +
                                    ' - ' + details[i].finish_time.substring(0, 5) +
                                    '</span><input type="hidden" id="jam_mulai_' + i + '" value="' + details[i]
                                    .start_time + '"><input type="hidden" id="jam_selesai_' + i + '" value="' +
                                    details[i].finish_time + '"><input type="hidden" id="tanggal_mulai_' + i +
                                    '" value="' + details[i].start_date + '"></td>';
                                html +=
                                    '<td width="10%"><span id="image_pilih_' + i +
                                    '" class="image-register">Registered</span></td>';
                                html += '</tr>';
                            } else {
                                html += '<tr class="baris baris-active" id="baris_' + i + '">';
                                html +=
                                    '<td width="15%"><img class="image-pendaftaran" src="{{ asset('template/frontend/assets/umum/study.png') }}"></td>';
                                html +=
                                    '<td width="*" style="vertical-align:middle;"><span class="detail-name">' +
                                    details[i].pelajaran.name +
                                    ' ' + details[i].level.level_name +
                                    '</span><br><span class="detail-date">' +
                                    formatDate(new Date(details[i].start_date), 'EEEE, dd MMMM yyyy') +
                                    '</span><br><span class="detail-time">' + details[i].start_time.substring(0,
                                        5) +
                                    ' - ' + details[i].finish_time.substring(0, 5) +
                                    '</span><input type="hidden" id="jam_mulai_' + i + '" value="' + details[i]
                                    .start_time + '"><input type="hidden" id="jam_selesai_' + i + '" value="' +
                                    details[i].finish_time + '"><input type="hidden" id="tanggal_mulai_' + i +
                                    '" value="' + details[i].start_date + '"></td>';
                                html +=
                                    '<td width="10%"><span id="image_pilih_' + i +
                                    '" class="image-pilih">CART</span></td>';
                                html += '</tr>';
                            }

                        }


                    }
                    html += '</table>';
                    $("#modal-daftar-list-content").html(html);

                    $("#modal-daftar-list").modal("show");
                    console.log(jam_bentrok);
                }
            })
        }



        function add_to_cart(id, compete_id, ndex) {


            var tipe = "";
            if ($("#baris_" + ndex).hasClass("baris-active")) {
                $("#baris_" + ndex).removeClass("baris-active");

                $("#image_pilih_" + ndex).hide();

                let index = selected_studies.indexOf(id);
                if (index > -1) { // only splice array when item is found
                    selected_studies.splice(index, 1);
                    selected_time.splice(index, 1); // 2nd parameter means remove one item only
                    jam_bentrok[ndex] = 0;
                }

            } else {

                var start_time = $("#jam_mulai_" + ndex).val();
                var cek_jam = jam_bentrok.includes(start_time); // is true

                if (cek_jam) {
                    alert("Jadwal bidang yang anda pilih bentrok!");
                } else {
                    $("#baris_" + ndex).addClass("baris-active");
                    $("#image_pilih_" + ndex).show();
                    selected_studies.push(id);
                    selected_competition = compete_id;
                    selected_time.push(start_time);
                    jam_bentrok[ndex] = start_time;
                }


            }
            console.log(jam_bentrok);

        }


        function simpan_bayar() {
            if (selected_studies.length <= 0) {
                alert("Silahkan pilih bidang terlebih dahulu");
            } else {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ url('add_to_cart') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": selected_studies,
                        "compete_id": selected_competition,
                        "premium": 1,
                        "_token": csrf_token
                    },
                    success: function(data) {
                        $(".cart-number").text(data.jumlah);
                        if (data.jumlah > 0) {
                            $(".cart-number").show();
                        } else {
                            $(".cart-number").hide();
                        }

                        window.location = "{{ url('cart') }}";
                    }
                });
            }
        }

        $("#form-gratis-submit").submit(function(e) {
            e.preventDefault();
            if (selected_studies.length <= 0) {
                alert("Silahkan pilih bidang terlebih dahulu");
            } else {
                var form = new FormData($('#modal-gratis form')[0]);
                form.append("id", selected_studies);
                form.append("compete_id", selected_competition);
                form.append("premium", 0);
                $.ajax({
                    url: "{{ url('add_free_invoice') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: form,
                    success: function(data) {
                        window.location = "{{ url('transaction') }}";
                    }
                });
            }
        });
    </script>
@endif
@if ($view == 'cart')
    <script>
        function hapus_cart(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var popup = confirm("Anda yakin ingin menghapus item belanja anda ?");
            if (popup === true) {
                $.ajax({
                    url: "{{ url('cart-delete') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_token": csrf_token
                    },
                    success: function(data) {
                        if (data.success) {
                            window.location = "{{ url('cart') }}";
                        } else {
                            alert(data.message);
                        }
                    }
                })
            }
        }

        function pesan_sekarang() {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var pesan = confirm("Anda yakin akan melanjutkan pesanan ini..?");
            if (pesan === true) {
                $.ajax({
                    url: "{{ url('transaction-store') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "pesan": "pesan",
                        "_token": csrf_token
                    },
                    success: function(data) {
                        if (data.success) {
                            window.location = "{{ url('transaction') }}";
                        } else {
                            alert(data.message);
                        }
                    }
                })
            }
        }
    </script>
@endif

@if ($view == 'transaction')
    <script>
        $('#image-upload').click(function() {
            $('#image').trigger('click');
        });

        $("#image").change(function() {
            document.getElementById('image-upload').src = window.URL.createObjectURL(this.files[0]);
            // $("#tutup1").show();
        });
        $("#table-transaction").DataTable({
            order: [
                [0, 'desc']
            ]
        });

        function bayar(id) {
            $("#transaction_id").val(id);
            $("#modal-pembayaran").modal("show");
        }


        function payment(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('online-payment') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {
                    window.snap.pay(data.token, {
                        onSuccess: function(result) {
                            /* You may add your own implementation here */
                            window.location = "{{ url('transaction') }}";
                            console.log(result);
                        },
                        onPending: function(result) {
                            /* You may add your own implementation here */
                            window.location = "{{ url('transaction') }}";
                            console.log(result);
                        },
                        onError: function(result) {
                            /* You may add your own implementation here */
                            window.location = "{{ url('transaction') }}";
                            console.log(result);
                        },
                        onClose: function() {
                            /* You may add your own implementation here */
                            window.location = "{{ url('transaction') }}";
                        }
                    });

                }
            })
        }
    </script>
@endif


@if ($view == 'after-register')
    <script>
        $("#provinsi").select2();
        $("#kabupaten").select2();
        $("#kecamatan").select2();
        $("#nama_sekolah").select2();

        $("#provinsi").change(function() {
            var p = $(this).val();
            $.ajax({
                url: "{{ url('get_kabupaten_by_province_id') }}" + "/" + p,
                type: "GET",
                dataType: "JSON",
                success: function(data) {

                    console.log(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].regency_code + '">' + data[i].regency_name +
                            '</option>';
                    }

                    $("#kabupaten").html(html);
                    $("#kecamatan").html('<option value="">- Pilih Kabupaten Dahulu -</option>');
                    $("#nama_sekolah").html('<option value="">- Pilih Kecamatan Dahulu -</option>');
                    $("#container-sekolah-lain").hide();
                }
            })
        });


        $("#kabupaten").change(function() {
            var p = $(this).val();
            $.ajax({
                url: "{{ url('get_kecamatan_by_kabupaten_id') }}" + "/" + p,
                type: "GET",
                dataType: "JSON",
                success: function(data) {

                    console.log(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].district_code + '">' + data[i]
                            .district_name + '</option>';
                    }

                    $("#kecamatan").html(html);
                    $("#nama_sekolah").html('<option value="">- Pilih Kecamatan Dahulu -</option>');
                    $("#container-sekolah-lain").hide();
                }
            })
        });


        $("#kecamatan").change(function() {
            var p = $(this).val();
            $.ajax({
                url: "{{ url('get_sekolah_by_kecamatan_id') }}" + "/" + p,
                type: "GET",
                dataType: "JSON",
                success: function(data) {

                    console.log(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].sekolah + '">' + data[i].sekolah +
                            '</option>';
                    }
                    html += '<option value="lainnya">LAINNYA</option>';
                    $("#nama_sekolah").html(html);
                    $("#container-sekolah-lain").hide();
                }
            })
        });

        $("#nama_sekolah").change(function() {
            var p = $(this).val();
            if (p == 'lainnya') {
                $("#container-sekolah-lain").show();
            } else {
                $("#container-sekolah-lain").hide();
            }
        });

        function verif_email(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('send_email_passcode') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        $("#modal-email").modal("show");
                    }
                }
            })
        }


        function confirm_email(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var passcode = $("#email_passcode").val();
            $.ajax({
                url: "{{ url('verify_email_passcode') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "passcode": passcode,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        window.location = "{{ url('after_register') }}" + "/" + id;
                    } else {
                        window.location = "{{ url('after_register') }}" + "/" + id;
                    }
                }
            })
        }
    </script>
@endif

@if ($view == 'jadwal')
    <script>
        var jumlah_kompetisi = "{{ $nomor }}";



        for (var i = 0; i <= jumlah_kompetisi; i++) {
            countdown_jadwal(i);
        }


        function countdown_jadwal(index) {

            var tanggal = $("#tanggal_" + index).val();
            var jam = $("#jam_" + index).val();
            var waktu = tanggal + ' ' + jam;
            var countDownDate = moment(waktu);

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = moment();

                // Find the distance between now and the count down date
                var distance = countDownDate.diff(now);

                // Time calculations for days, hours, minutes and seconds
                var days = moment.duration(distance).days();
                var hours = moment.duration(distance).hours();
                var minutes = moment.duration(distance).minutes();
                var seconds = moment.duration(distance).seconds();

                // Display the result in the element with id="countdown"
                document.getElementById("countdown_" + index).innerHTML = days + " Hari " + hours + ":" +
                    minutes + ":" + seconds;

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown_" + index).innerHTML = "MULAI UJIAN";
                }
            }, 1000);
        }
    </script>
@endif

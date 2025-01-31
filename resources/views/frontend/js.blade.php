<script>
    function removeArray(arr) {
        var what, a = arguments,
            L = a.length,
            ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax = arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }

    function formatAngka(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }


    function formatKoma(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? ',' : '';
            rupiah += separator + ribuan.join(',');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }


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
</script>

@if ($view == 'login')
    <script>
        $(document).ready(function() {
            $("input[name='flexRadioDefault']").change(function() {
                var nilai = $(this).val();
                var html = '';
                if (nilai == 'username') {
                    html += '<input type="text" name="username" placeholder="Masukkan username anda">';
                    html += '<x-input-error :messages="$errors->get('
                    username ')" class="mt-2" />';

                } else if (nilai == 'email') {
                    html += '<input type="email" name="email" placeholder="Masukkan email anda">';
                    html += '<x-input-error :messages="$errors->get('
                    email ')" class="mt-2" />';
                } else if (nilai == 'wa') {
                    html +=
                        '<input type="text" maxlength="12" name="whatsapp" placeholder="Masukkan nomor whatsapp anda">';
                    html += '<x-input-error :messages="$errors->get('
                    whatsapp ')" class="mt-2" />';
                }

                $("#user-input-model").html(html);
            });
        })
    </script>
@endif

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
                    document.getElementById("countdown_" + index).innerHTML =
                        "<span style='color:red;'><strong>TUTUP</strong></span>";
                    $("#btn_daftar_" + index).attr("disabled", true);
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
        function hitung_subtotal() {
            var subtotal = 0;
            $(".subtotal").each(function() {
                subtotal = subtotal + +$(this).val();
            });
            $("#grand-total").text("Rp. " + formatKoma(subtotal));
            $("#grand-total-value").val(subtotal);
        }


        function tambahi(id) {
            var nilai = $("#unit_cart_" + id).text();
            var baru = parseInt(nilai) + 1;
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('cart.ubah') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "quantity": baru,
                    "_token": csrf_token
                },
                success: function(data) {
                    $("#unit_cart_" + id).text(baru);

                    var total = $("#unit_total_" + id).val();
                    var angka_total = baru * total;
                    $("#cart_total_text_" + id).html('<strong>Rp. ' + formatKoma(angka_total) + '</strong>');
                    $("#cart_total_" + id).val(angka_total);
                    hitung_subtotal();
                }
            })
        }


        function kurangi(id) {
            var nilai = $("#unit_cart_" + id).text();
            var angka = parseInt(nilai);
            var csrf_token = $('meta[name="csrf-token"]').attr('content');


            if (angka >= 2) {

                var baru = parseInt(nilai) - 1;
                $("#unit_cart_" + id).text(baru);
                $.ajax({
                    url: "{{ route('cart.ubah') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "quantity": baru,
                        "_token": csrf_token
                    },
                    success: function(data) {
                        $("#unit_cart_" + id).text(baru);

                        var total = $("#unit_total_" + id).val();
                        var angka_total = baru * total;
                        $("#cart_total_text_" + id).html('<strong>Rp. ' + formatKoma(angka_total) +
                            '</strong>');
                        $("#cart_total_" + id).val(angka_total);
                        hitung_subtotal();
                    }
                })

            }

        }

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

                        },
                        onPending: function(result) {
                            /* You may add your own implementation here */
                            window.location = "{{ url('transaction') }}";

                        },
                        onError: function(result) {
                            /* You may add your own implementation here */
                            window.location = "{{ url('transaction') }}";

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


        $('#profile-image-i').click(function() {
            $('#user-image').trigger('click');
        });


        $("#user-image").change(function() {
            document.getElementById('profile-image-i').src = window.URL.createObjectURL(this.files[0]);

        });


        $("#provinsi").change(function() {
            var p = $(this).val();
            $.ajax({
                url: "{{ url('get_kabupaten_by_province_id') }}" + "/" + p,
                type: "GET",
                dataType: "JSON",
                success: function(data) {


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
            $("#btn-email-verif").hide();
            $("#btn-email-verif2").show()
            $.ajax({
                url: "{{ url('send_email_passcode') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {
                    $("#btn-email-verif").show()
                    $("#btn-email-verif2").hide()
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

        var selected_products = [];


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
                    // document.getElementById("countdown_" + index).innerHTML = '<a onclick="mulai_ujian(' + index +
                    //     ')" href="jsvascript:void(0);">MULAI UJIAN</a>';
                    countdown_selesai(index);
                    $("#tombol_ujian_" + index).show();
                }
            }, 1000);
        }


        function countdown_selesai(index) {

            var tanggal = $("#tanggal_" + index).val();
            var jam = $("#selesai_" + index).val();
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
                document.getElementById("countdown_" + index).innerHTML = '<span style="color:green;">' + hours +
                    ":" +
                    minutes + ":" + seconds + '</span>';

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown_" + index).innerHTML = 'WAKTU HABIS';
                    $("#tombol_ujian_" + index).hide();
                }
            }, 1000);
        }


        function ikut_ujian(id) {
            var n = confirm('Anda ingin mengikuti ujian ini...?');

            if (n === true) {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ url('ujian-start') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_token": csrf_token
                    },
                    success: function(data) {
                        if (data.success) {
                            window.location = "{{ url('ujian') }}" + "/" + data.data;
                        } else {
                            alert(data.message);
                        }
                    }
                })
            }
        }

        $("#text-cari").keyup(function() {
            var nilai = $(this).val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var comid = $("#pengumuman-competition-id").val();
            var study = $("#pengumuman-study-id").val();

            $.ajax({
                url: "{{ route('search.pengumuman') }}",
                type: "POST",
                data: {
                    "comid": comid,
                    "study": study,
                    "search": nilai,
                    "_token": csrf_token
                },
                success: function(data) {

                    var html = '';

                    if (data.data.length > 0) {
                        for (var i = 0; i < data.data.length; i++) {
                            html += '<div onclick="order(' + data.data[i].id + ', ' + data.data[i]
                                .userid + ')" class="row row-pengumuman">';
                            html += '<div class="col-md-1">';
                            if (data.data[i].medali == 'emas') {
                                html +=
                                    '<img src="{{ asset('template/frontend/assets/umum/juara1.png') }}" class="img-medali">';
                            } else if (data.data[i].medali == 'perak') {
                                html +=
                                    '<img src="{{ asset('template/frontend/assets/umum/juara2.png') }}" class="img-medali">';
                            } else if (data.data[i].medali == 'perunggu') {
                                html +=
                                    '<img src="{{ asset('template/frontend/assets/umum/juara3.png') }}" class="img-medali">';
                            } else {
                                if (data.data[i].user.jenis_kelamin == 'Laki Laki') {
                                    html +=
                                        '<img src="{{ asset('template/frontend/assets/umum/profile2.png') }}" class="img-medali">';
                                } else {
                                    html +=
                                        '<img src="{{ asset('template/frontend/assets/umum/profile1.png') }}" class="img-medali">';
                                }

                            }


                            html += '</div>';
                            html += '<div class="col-md-9">';
                            html += '<div class="pemenang-item"><span class="ann-name">' + data.data[i]
                                .user.name
                                .toUpperCase() + '</span><br><span class="ann-province">' + data.data[i]
                                .user
                                .wilayah.province_name + ' - ' + data.data[i].user.nama_sekolah +
                                '</span><br>';
                            if (data.data[i].medali == 'emas') {
                                html += '<span class="ann-school">Peraih Medali Emas</span>';
                            } else if (data.data[i].medali == 'perak') {
                                html += '<span class="ann-school">Peraih Medali Perak</span>';
                            } else if (data.data[i].medali == 'perunggu') {
                                html += '<span class="ann-school">Peraih Medali Perunggu</span>';
                            } else {
                                html += '<span class="ann-school">Peserta Aktif</span>';
                            }

                            html += '</div>';

                            html += '</div>';
                            html += '<div class="col-md-2">';
                            html +=
                                '<img src="{{ asset('template/frontend/assets/umum/rippon.png') }}" class="img-rippon"><span class="nilai-medali">' +
                                data.data[i].nilai + '</span>';
                            html += '</div>';
                            html += '</div>';
                        }
                    } else {
                        html += '<center><span style="color:red;">data tidak ada</span></center>';
                    }

                    $("#pemenang-content").html(html);

                }

            });
        });

        function show_pengumuman(comid, study) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $("#pengumuman-competition-id").val(comid);
            $("#pengumuman-study-id").val(study);
            $.ajax({
                url: "{{ route('show.pengumuman') }}",
                type: "POST",
                data: {
                    "comid": comid,
                    "study": study,
                    "_token": csrf_token
                },
                success: function(data) {

                    $("#modal-pengumuman").modal("show");
                    $(".modal-head-title").text(data.com.title);
                    $("#modal-subtitle").text(data.study.pelajaran.name + ' ' + data.study.level.level_name);



                    var html = '';
                    if (data.data.length > 0) {
                        for (var i = 0; i < data.data.length; i++) {
                            html += '<div onclick="order(' + data.data[i].id + ', ' + data.data[i].userid +
                                ')" class="row row-pengumuman">';
                            html += '<div class="col-md-1">';
                            if (data.data[i].medali == 'emas') {
                                html +=
                                    '<img src="{{ asset('template/frontend/assets/umum/juara1.png') }}" class="img-medali">';
                            } else if (data.data[i].medali == 'perak') {
                                html +=
                                    '<img src="{{ asset('template/frontend/assets/umum/juara2.png') }}" class="img-medali">';
                            } else if (data.data[i].medali == 'perunggu') {
                                html +=
                                    '<img src="{{ asset('template/frontend/assets/umum/juara3.png') }}" class="img-medali">';
                            } else {
                                if (data.data[i].user.jenis_kelamin == 'Laki Laki') {
                                    html +=
                                        '<img src="{{ asset('template/frontend/assets/umum/profile2.png') }}" class="img-medali">';
                                } else {
                                    html +=
                                        '<img src="{{ asset('template/frontend/assets/umum/profile1.png') }}" class="img-medali">';
                                }

                            }


                            html += '</div>';
                            html += '<div class="col-md-9">';
                            html += '<div class="pemenang-item"><span class="ann-name">' + data.data[i].user
                                .name
                                .toUpperCase() + '</span><br><span class="ann-province">' + data.data[i].user
                                .wilayah.province_name + ' - ' + data.data[i].user.nama_sekolah + '</span><br>';
                            if (data.data[i].medali == 'emas') {
                                html += '<span class="ann-school">Peraih Medali Emas</span>';
                            } else if (data.data[i].medali == 'perak') {
                                html += '<span class="ann-school">Peraih Medali Perak</span>';
                            } else if (data.data[i].medali == 'perunggu') {
                                html += '<span class="ann-school">Peraih Medali Perunggu</span>';
                            } else {
                                html += '<span class="ann-school">Peserta Aktif</span>';
                            }

                            html += '</div>';

                            html += '</div>';
                            html += '<div class="col-md-2">';
                            html +=
                                '<img src="{{ asset('template/frontend/assets/umum/rippon.png') }}" class="img-rippon"><span class="nilai-medali">' +
                                data.data[i].nilai + '</span>';
                            html += '</div>';
                            html += '</div>';
                        }
                    } else {
                        html += '<center><span style="color:red;">data tidak ada</span></center>';
                    }

                    $("#pemenang-content").html(html);

                }

            });

        }


        function order(id, userid) {
            var user_aktif = "{{ Auth::user()->id }}";
            if (user_aktif == userid) {
                confirm_order(id);
            } else {
                var c = confirm(
                    'Anda memilih kartu pengumuman yang bukan nama anda. apakah anda yakin lanjut memesankan orang lain?'
                );
                if (c === true) {
                    confirm_order(id);
                }
            }
        }

        function confirm_order(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('confirm.order') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        $("#modal-product .modal-head-title").text(data.user.name);
                        $("#modal-product #modal-subtitle").text("Merchandise " + data.kompetisi.title);
                        $("#product-competition-id").val(data.kompetisi.id);
                        $("#product-study-id").val(data.study_id);
                        $("#product-user-id").val(data.user.id);

                        var html = '';
                        for (var i = 0; i < data.data.length; i++) {

                            html += '<div onclick="select_product(' + data.data[i].id +
                                ')" class="row product-row" id="row_' + data.data[i].id + '">';
                            html += '<div class="col-md-1">';
                            if (data.data[i].image == null) {
                                html +=
                                    '<img src="{{ asset('template/frontend/assets/umum/product.png') }}" class="img-product-pengumuman">';
                            } else {
                                html +=
                                    '<img src="{{ asset('storage/image_files/product') }}/'+data.data[i].image+'" class="img-product-pengumuman">';
                            }

                            html += '</div>';
                            html += '<div class="col-md-10"><span class="item-product-list">' + data.data[i]
                                .name + '</span>';
                            html += '<br>';

                            html += '<span class="item-product-desc">' + data.data[i].desc +
                                '</span>';


                            html += '<br>';

                            html += '<span class="item-product-price">Rp. ' + formatAngka(data.data[
                                        i]
                                    .price) +
                                '</span></div>';
                            html += '<div class="col-md-1">';
                            html += '<span style="display:none;" id="product_check_' + data.data[i].id +
                                '" class="product-check"><i class="fa fa-check"></i></span>';
                            html += '</div>';
                            html += '</div>';

                        }

                        $("#product-list-content").html(html);


                        $("#modal-product").modal("show");
                    } else {
                        alert(data.message);
                    }
                }
            });
        }

        function select_product(id) {
            if ($("#row_" + id).hasClass("product-selected")) {
                $("#row_" + id).removeClass("product-selected");
                $("#product_check_" + id).hide();
                removeArray(selected_products, id);
            } else {
                selected_products.push(id);
                $("#row_" + id).addClass("product-selected");
                $("#product_check_" + id).show();
            }

            console.log(selected_products);
        }


        function simpan_product_keranjang() {
            if (selected_products.length > 0) {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                var userid = $("#product-user-id").val();
                var competition_id = $("#product-competition-id").val();
                var study_id = $("#product-study-id").val();

                $.ajax({
                    url: "{{ route('simpan.product') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "userid": userid,
                        "competition_id": competition_id,
                        "study_id": study_id,
                        "selected_product": selected_products,
                        "_token": csrf_token
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            window.location = "{{ url('cart') }}";
                        } else {
                            alert(data.message);
                        }
                    }
                });

            } else {
                alert('belum ada produk merchandise yang dipilih..!');
            }
        }
    </script>
@endif

@if ($view == 'ujian')
    <script>
        let active = "<?= $nomor ?>";
        let selected_answer = "<?= $selected ?>";
        console.log(active);

        $(document).ready(function() {
            countdown_ujian();
            lihat_soal();
        });

        function countdown_ujian() {

            var tanggal = $("#tanggal-ujian").val();
            var jam = $("#jam-selesai").val();
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
                document.getElementById("waktu-ujian").innerHTML = hours +
                    ":" +
                    minutes + ":" + seconds;

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("waktu-ujian").innerHTML = 'WAKTU HABIS';
                    window.location = "{{ url('ujian-selesai') }}";

                }
            }, 1000);
        }

        function selected(id) {
            if (id == 1) {
                $("#jawaban-a").addClass("selected-jawaban");
                $("#jawaban-b").removeClass("selected-jawaban");
                $("#jawaban-c").removeClass("selected-jawaban");
                $("#jawaban-d").removeClass("selected-jawaban");
                $("#jawaban-e").removeClass("selected-jawaban");
                $("#jawaban-f").removeClass("selected-jawaban");

            } else if (id == 2) {
                $("#jawaban-b").addClass("selected-jawaban");
                $("#jawaban-a").removeClass("selected-jawaban");
                $("#jawaban-c").removeClass("selected-jawaban");
                $("#jawaban-d").removeClass("selected-jawaban");
                $("#jawaban-e").removeClass("selected-jawaban");
                $("#jawaban-f").removeClass("selected-jawaban");
            } else if (id == 3) {
                $("#jawaban-c").addClass("selected-jawaban");
                $("#jawaban-a").removeClass("selected-jawaban");
                $("#jawaban-b").removeClass("selected-jawaban");
                $("#jawaban-d").removeClass("selected-jawaban");
                $("#jawaban-e").removeClass("selected-jawaban");
                $("#jawaban-f").removeClass("selected-jawaban");
            } else if (id == 4) {
                $("#jawaban-d").addClass("selected-jawaban");
                $("#jawaban-a").removeClass("selected-jawaban");
                $("#jawaban-b").removeClass("selected-jawaban");
                $("#jawaban-c").removeClass("selected-jawaban");
                $("#jawaban-e").removeClass("selected-jawaban");
                $("#jawaban-f").removeClass("selected-jawaban");
            } else if (id == 5) {
                $("#jawaban-e").addClass("selected-jawaban");
                $("#jawaban-a").removeClass("selected-jawaban");
                $("#jawaban-b").removeClass("selected-jawaban");
                $("#jawaban-c").removeClass("selected-jawaban");
                $("#jawaban-d").removeClass("selected-jawaban");
                $("#jawaban-f").removeClass("selected-jawaban");
            } else if (id == 6) {
                $("#jawaban-f").addClass("selected-jawaban");
                $("#jawaban-b").removeClass("selected-jawaban");
                $("#jawaban-c").removeClass("selected-jawaban");
                $("#jawaban-d").removeClass("selected-jawaban");
                $("#jawaban-e").removeClass("selected-jawaban");
                $("#jawaban-a").removeClass("selected-jawaban");
            }

            selected_answer = id;


        }


        function simpan_jawaban() {

            if (selected_answer === 0) {
                alert('Anda belum memilih jawaban, silahkan pilih salah satu jawaban.');
                return false;;
            }

            var jumlah_soal = $("#jumlah-soal").val();


            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var competition_id = $("#competition-id").val();
            var study_id = $("#study-id").val();
            var no_soal = $("#no-soal").val();
            var id_soal = $("#id-soal").val();
            var token_id = $("#token-id").val();
            $.ajax({
                url: "{{ route('simpan.jawaban') }}",
                type: "POST",
                data: {
                    "competition_id": competition_id,
                    "study_id": study_id,
                    "no_soal": no_soal,
                    "id_soal": id_soal,
                    "selected_answer": selected_answer,
                    "active": active,
                    "token_id": token_id,
                    "_token": csrf_token
                },
                success: function(data) {

                    if (data.success) {
                        var av = data.active;
                        var HTML = '';
                        HTML += '<div class="col-md-2 col-sm-2 col-lg-2 nomor-soal-container">';
                        HTML += '<div id="content-number" class="content-number">';
                        HTML += '<div class="row" id="isi-nomor">';

                        HTML += '</div>';
                        HTML += '</div>';

                        HTML += '</div>';
                        HTML += '<div class="col-lg-10 col-md-10 col-sm-10">';
                        HTML += '<div class="soal-wrapper">';
                        HTML += '<p class="no-soal">Soal No. ' + data.data[av].question_number + ' dari ' +
                            jumlah_soal + '</p>';
                        HTML += '<input type="hidden" id="no-soal" value="' + data.data[av].question_number +
                            '">';
                        HTML += '<input type="hidden" id="id-soal" value="' + data.data[av].id + '">';
                        if (data.data[av].question_image != null) {
                            HTML += '<img src="{{ asset('storage/image_files/soal') }}/' + data.data[av]
                                .question_image + '" class="gambar-soal img-responsive">';
                        }

                        HTML += '<p class="soal-title">' + data.data[av].question_title + '</p>';
                        HTML += '</div>';
                        HTML += '<div class="jawaban-wrapper">';
                        HTML += '<p class="pilih-jawaban">Pilih Salah Satu Jawaban :</p>';
                        HTML += '<div class="row">';
                        HTML += '<div class="col-md-6">';

                        if (data.ada === 0) {
                            selected_answer = 0;
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'a') {
                            selected_answer = 1;
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'c') {
                            selected_answer = 3;
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'e') {
                            selected_answer = 5;
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        }


                        HTML += '</div>';
                        HTML += '<div class="col-md-6">';

                        if (data.ada == 1 && data.exist.jawaban_soal == 'b') {
                            selected_answer = 2;
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' +
                                data.data[av].option_b + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' + data
                                .data[av].option_b + '</div>';
                        }


                        if (data.ada == 1 && data.exist.jawaban_soal == 'd') {
                            selected_answer = 4;
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' +
                                data.data[av].option_d + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' + data
                                .data[av].option_d + '</div>';
                        }


                        HTML +=
                            '<div style="display:none;" onclick="lewati_soal()" id="jawaban-f" class="jawaban-item">LEWATI</div>';


                        HTML += '</div>';
                        HTML += '</div>';


                        HTML += '</div>';
                        HTML += '<hr />';
                        HTML +=
                            '<button onclick="sebelumnya()" class="btn-sebelumnya-insoft"><i class="fa fa-arrow-left"></i> Sebelumnya</button>';
                        HTML +=
                            '<button onclick="lewati_soal()" class="btn-selanjutnya-insoft"><i class="fa fa-arrow-right"></i> Selanjutnya</button>';
                        HTML +=
                            '<button onclick="simpan_jawaban()" class="btn-simpan-insoft"><i class="fa fa-save"></i> Simpan Jawaban</button>';
                        HTML +=
                            '<button onclick="selesai_ujian()" class="btn-selesai-insoft"><i class="fa fa-check"></i> Selesai</button>';
                        HTML += '<div style="margin-top:150px;"></div>';
                        HTML += '</div>';

                        $("#soal-container").html(HTML);
                        active = av;
                        lihat_soal();
                    } else {
                        var p = confirm(
                            'Ini adalah soal terakhir dalam ujian ini, apakah Anda ingin menyelesaikan ujian ini....?'
                        );
                        if (p === true) {
                            finish_ujian();
                        }
                    }


                }
            })
        }




        function lewati_soal() {


            var jumlah_soal = $("#jumlah-soal").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var competition_id = $("#competition-id").val();
            var study_id = $("#study-id").val();
            var no_soal = $("#no-soal").val();
            var id_soal = $("#id-soal").val();
            var token_id = $("#token-id").val();
            $.ajax({
                url: "{{ route('simpan.jawaban') }}",
                type: "POST",
                data: {
                    "competition_id": competition_id,
                    "study_id": study_id,
                    "no_soal": no_soal,
                    "id_soal": id_soal,
                    "selected_answer": 6,
                    "active": active,
                    "token_id": token_id,
                    "_token": csrf_token
                },
                success: function(data) {

                    if (data.success) {
                        var av = data.active;
                        var HTML = '';
                        HTML += '<div class="col-md-2 col-sm-2 col-lg-2 nomor-soal-container">';
                        HTML += '<div id="content-number" class="content-number">';
                        HTML += '<div class="row" id="isi-nomor">';

                        HTML += '</div>';
                        HTML += '</div>';

                        HTML += '</div>';
                        HTML += '<div class="col-lg-10 col-md-10 col-sm-10">';
                        HTML += '<div class="soal-wrapper">';

                        HTML += '<p class="no-soal">Soal No. ' + data.data[av].question_number + ' dari ' +
                            jumlah_soal + '</p>';
                        HTML += '<input type="hidden" id="no-soal" value="' + data.data[av].question_number +
                            '">';
                        HTML += '<input type="hidden" id="id-soal" value="' + data.data[av].id + '">';
                        if (data.data[av].question_image != null) {
                            HTML += '<img src="{{ asset('storage/image_files/soal') }}/' + data.data[av]
                                .question_image + '" class="gambar-soal img-responsive">';
                        }
                        HTML += '<p class="soal-title">' + data.data[av].question_title + '</p>';
                        HTML += '</div>';
                        HTML += '<div class="jawaban-wrapper">';
                        HTML += '<p class="pilih-jawaban">Pilih Salah Satu Jawaban :</p>';
                        HTML += '<div class="row">';
                        HTML += '<div class="col-md-6">';

                        if (data.ada === 0) {
                            selected_answer = 0;
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'a') {
                            selected_answer = 1;
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'c') {
                            selected_answer = 3;
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'e') {
                            selected_answer = 5;
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        }


                        HTML += '</div>';
                        HTML += '<div class="col-md-6">';

                        if (data.ada == 1 && data.exist.jawaban_soal == 'b') {
                            selected_answer = 2;
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' +
                                data.data[av].option_b + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' + data
                                .data[av].option_b + '</div>';
                        }


                        if (data.ada == 1 && data.exist.jawaban_soal == 'd') {
                            selected_answer = 4;
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' +
                                data.data[av].option_d + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' + data
                                .data[av].option_d + '</div>';
                        }


                        HTML +=
                            '<div style="display:none;" onclick="lewati_soal()" id="jawaban-f" class="jawaban-item">LEWATI</div>';


                        HTML += '</div>';
                        HTML += '</div>';


                        HTML += '</div>';
                        HTML += '<hr />';
                        HTML +=
                            '<button onclick="sebelumnya()" class="btn-sebelumnya-insoft"><i class="fa fa-arrow-left"></i> Sebelumnya</button>';
                        HTML +=
                            '<button onclick="lewati_soal()" class="btn-selanjutnya-insoft"><i class="fa fa-arrow-right"></i> Selanjutnya</button>';
                        HTML +=
                            '<button onclick="simpan_jawaban()" class="btn-simpan-insoft"><i class="fa fa-save"></i> Simpan Jawaban</button>';
                        HTML +=
                            '<button onclick="selesai_ujian()" class="btn-selesai-insoft"><i class="fa fa-check"></i> Selesai</button>';
                        HTML += '<div style="margin-top:150px;"></div>';
                        HTML += '</div>';

                        $("#soal-container").html(HTML);
                        active = av;
                        lihat_soal();
                    } else {
                        selesai_ujian();
                    }


                }
            })
        }



        function sebelumnya() {
            var jumlah_soal = $("#jumlah-soal").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var competition_id = $("#competition-id").val();
            var study_id = $("#study-id").val();
            var no_soal = $("#no-soal").val();
            var id_soal = $("#id-soal").val();
            var token_id = $("#token-id").val();
            $.ajax({
                url: "{{ route('jawaban.sebelumnya') }}",
                type: "POST",
                data: {
                    "competition_id": competition_id,
                    "study_id": study_id,
                    "no_soal": no_soal,
                    "id_soal": id_soal,
                    "selected_answer": selected_answer,
                    "active": active,
                    "token_id": token_id,
                    "_token": csrf_token
                },
                success: function(data) {

                    if (data.success) {
                        var av = data.active;
                        var HTML = '';
                        HTML += '<div class="col-md-2 col-sm-2 col-lg-2 nomor-soal-container">';
                        HTML += '<div id="content-number" class="content-number">';
                        HTML += '<div class="row" id="isi-nomor">';

                        HTML += '</div>';
                        HTML += '</div>';

                        HTML += '</div>';
                        HTML += '<div class="col-lg-10 col-md-10 col-sm-10">';
                        HTML += '<div class="soal-wrapper">';

                        HTML += '<p class="no-soal">Soal No. ' + data.data[av].question_number + ' dari ' +
                            jumlah_soal + '</p>';
                        HTML += '<input type="hidden" id="no-soal" value="' + data.data[av].question_number +
                            '">';
                        HTML += '<input type="hidden" id="id-soal" value="' + data.data[av].id + '">';
                        if (data.data[av].question_image != null) {
                            HTML += '<img src="{{ asset('storage/image_files/soal') }}/' + data.data[av]
                                .question_image + '" class="gambar-soal img-responsive">';
                        }
                        HTML += '<p class="soal-title">' + data.data[av].question_title + '</p>';
                        HTML += '</div>';
                        HTML += '<div class="jawaban-wrapper">';
                        HTML += '<p class="pilih-jawaban">Pilih Salah Satu Jawaban :</p>';
                        HTML += '<div class="row">';
                        HTML += '<div class="col-md-6">';

                        if (data.ada === 0) {
                            selected_answer = 0;
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'a') {
                            selected_answer = 1;
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'c') {
                            selected_answer = 3;
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'e') {
                            selected_answer = 5;
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        }


                        HTML += '</div>';
                        HTML += '<div class="col-md-6">';

                        if (data.ada == 1 && data.exist.jawaban_soal == 'b') {
                            selected_answer = 2;
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' +
                                data.data[av].option_b + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' + data
                                .data[av].option_b + '</div>';
                        }


                        if (data.ada == 1 && data.exist.jawaban_soal == 'd') {
                            selected_answer = 4;
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' +
                                data.data[av].option_d + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' + data
                                .data[av].option_d + '</div>';
                        }


                        HTML +=
                            '<div style="display:none;" onclick="lewati_soal()" id="jawaban-f" class="jawaban-item">LEWATI</div>';




                        HTML += '</div>';
                        HTML += '</div>';


                        HTML += '</div>';
                        HTML += '<hr />';
                        HTML +=
                            '<button onclick="sebelumnya()" class="btn-sebelumnya-insoft"><i class="fa fa-arrow-left"></i> Sebelumnya</button>';
                        HTML +=
                            '<button onclick="lewati_soal()" class="btn-selanjutnya-insoft"><i class="fa fa-arrow-right"></i> Selanjutnya</button>';
                        HTML +=
                            '<button onclick="simpan_jawaban()" class="btn-simpan-insoft"><i class="fa fa-save"></i> Simpan Jawaban</button>';
                        HTML +=
                            '<button onclick="selesai_ujian()" class="btn-selesai-insoft"><i class="fa fa-check"></i> Selesai</button>';
                        HTML += '<div style="margin-top:150px;"></div>';
                        HTML += '</div>';

                        $("#soal-container").html(HTML);
                        active = av;
                        lihat_soal();
                    }

                }
            })
        }

        function selesai_ujian() {
            var n = confirm('apakah anda yakin ingin meyelesaikan kompetisi ini..?');
            if (n === true) {
                window.location = "{{ url('ujian-selesai') }}";
            }
        }

        function lihat_soal() {

            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var token_id = $("#token-id").val();

            $.ajax({
                url: "{{ route('list.soal') }}",
                type: "POST",
                data: {
                    "token_id": token_id,
                    "_token": csrf_token
                },
                success: function(data) {
                    console.log(data);
                    var HTML = '';
                    HTML += '<h5>Navigasi Soal</h5>';
                    for (var i = 0; i < data.data.length; i++) {

                        if (data.data[i].exist === 1) {
                            HTML += '<div onclick="gotos(' + i +
                                ')" class="item-number-active col-md-2 col-md-2 col-md-2">' + data.data[i]
                                .question_number + '</div>';
                        } else {
                            HTML += '<div onclick="gotos(' + i + ')" class="item-number col-md-2">' +
                                data.data[i]
                                .question_number + '</div>';
                        }
                    }

                    $("#isi-nomor").html(HTML);
                    // $("#modal-soal").modal("show");
                }
            });


        }

        function gotos(index) {

            var jumlah_soal = $("#jumlah-soal").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var competition_id = $("#competition-id").val();
            var study_id = $("#study-id").val();
            var no_soal = $("#no-soal").val();
            var id_soal = $("#id-soal").val();
            var token_id = $("#token-id").val();
            $.ajax({
                url: "{{ route('go.to') }}",
                type: "POST",
                data: {
                    "competition_id": competition_id,
                    "study_id": study_id,
                    "active": index,
                    "token_id": token_id,
                    "_token": csrf_token
                },
                success: function(data) {

                    if (data.success) {
                        $("#modal-soal").modal("hide");
                        var av = data.active;
                        var HTML = '';
                        HTML += '<div class="col-md-2 col-sm-2 col-lg-2 nomor-soal-container">';
                        HTML += '<div id="content-number" class="content-number">';
                        HTML += '<div class="row" id="isi-nomor">';

                        HTML += '</div>';
                        HTML += '</div>';

                        HTML += '</div>';
                        HTML += '<div class="col-lg-10 col-md-10 col-sm-10">';
                        HTML += '<div class="soal-wrapper">';

                        HTML += '<p class="no-soal">Soal No. ' + data.data[av].question_number + ' dari ' +
                            jumlah_soal + '</p>';
                        HTML += '<input type="hidden" id="no-soal" value="' + data.data[av].question_number +
                            '">';
                        HTML += '<input type="hidden" id="id-soal" value="' + data.data[av].id + '">';
                        if (data.data[av].question_image != null) {
                            HTML += '<img src="{{ asset('storage/image_files/soal') }}/' + data.data[av]
                                .question_image + '" class="gambar-soal img-responsive">';
                        }
                        HTML += '<p class="soal-title">' + data.data[av].question_title + '</p>';
                        HTML += '</div>';
                        HTML += '<div class="jawaban-wrapper">';
                        HTML += '<p class="pilih-jawaban">Pilih Salah Satu Jawaban :</p>';
                        HTML += '<div class="row">';
                        HTML += '<div class="col-md-6">';

                        if (data.ada === 0) {
                            selected_answer = 0;
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'a') {
                            selected_answer = 1;
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(1)" id="jawaban-a" class="jawaban-item">';
                            if (data.data[av].option_image_a != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_a + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'A. ' + data.data[av].option_a + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'c') {
                            selected_answer = 3;
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(3)" id="jawaban-c" class="jawaban-item">';
                            if (data.data[av].option_image_c != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_c + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'C. ' + data.data[av].option_c + '</div>';
                        }

                        if (data.ada == 1 && data.exist.jawaban_soal == 'e') {
                            selected_answer = 5;
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }

                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(5)" id="jawaban-e" class="jawaban-item">';
                            if (data.data[av].option_image_e != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_e + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'E. ' + data.data[av].option_e + '</div>';
                        }


                        HTML += '</div>';
                        HTML += '<div class="col-md-6">';

                        if (data.ada == 1 && data.exist.jawaban_soal == 'b') {
                            selected_answer = 2;
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' +
                                data.data[av].option_b + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(2)" id="jawaban-b" class="jawaban-item">';
                            if (data.data[av].option_image_b != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_b + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'B. ' + data
                                .data[av].option_b + '</div>';
                        }


                        if (data.ada == 1 && data.exist.jawaban_soal == 'd') {
                            selected_answer = 4;
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item selected-jawaban">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' +
                                data.data[av].option_d + '</div>';
                        } else {
                            HTML +=
                                '<div onclick="selected(4)" id="jawaban-d" class="jawaban-item">';
                            if (data.data[av].option_image_d != null) {
                                HTML += '<img src="{{ asset('storage/image_files/jawaban') }}/' + data.data[av]
                                    .option_image_d + '" class="gambar-soal img-responsive">';
                            }
                            HTML += 'D. ' + data
                                .data[av].option_d + '</div>';
                        }

                        // if (data.ada == 1 && data.exist.jawaban_soal == 'f') {
                        //     selected_answer = 6;
                        //     HTML +=
                        //         '<div onclick="lewati_soal()" id="jawaban-f" class="jawaban-item selected-jawaban">LEWATI</div>';
                        // } else {
                        //     HTML +=
                        //         '<div onclick="lewati_soal()" id="jawaban-f" class="jawaban-item">LEWATI</div>';
                        // }



                        HTML += '</div>';
                        HTML += '</div>';


                        HTML += '</div>';
                        HTML += '<hr />';
                        HTML +=
                            '<button onclick="sebelumnya()" class="btn-sebelumnya-insoft"><i class="fa fa-arrow-left"></i> Sebelumnya</button>';
                        HTML +=
                            '<button onclick="lewati_soal()" class="btn-selanjutnya-insoft"><i class="fa fa-arrow-right"></i> Selanjutnya</button>';
                        HTML +=
                            '<button onclick="simpan_jawaban()" class="btn-simpan-insoft"><i class="fa fa-save"></i> Simpan Jawaban</button>';
                        HTML +=
                            '<button onclick="selesai_ujian()" class="btn-selesai-insoft"><i class="fa fa-check"></i> Selesai</button>';
                        HTML += '<div style="margin-top:150px;"></div>';
                        HTML += '</div>';

                        $("#soal-container").html(HTML);
                        active = av;
                        lihat_soal();
                    }

                }
            })
        }


        function selesai_ujian() {
            var p = confirm("Apakah anda ingin menyelesaikan ujian ini...?");
            if (p === true) {
                finish_ujian();
            }
        }



        function finish_ujian() {

            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var token_id = $("#token-id").val();

            $.ajax({
                url: "{{ url('selesai_ujian') }}",
                type: "POST",
                data: {
                    "token_id": token_id,
                    "_token": csrf_token
                },
                success: function(data) {
                    if (data.success) {
                        window.location = "{{ url('ujian-selesai') }}";
                    }

                }
            });
        }
    </script>
@endif

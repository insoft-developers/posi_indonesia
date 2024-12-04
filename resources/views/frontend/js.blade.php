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
    <Script>
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
                    console.log(data);
                    var details = data.detail;
                    $("#modal-subtitle").text("Pendaftaran Event " + data.data.title);

                    var html = '';
                    html += '<table class="table">';
                    for (var i = 0; i < details.length; i++) {

                        if (details[i].cart === null) {
                            html += '<tr onclick="add_to_cart(' + details[i].id + ',' + details[i]
                                .competition_id +
                                ',' + i + ')" class="baris" id="baris_' + i + '">';
                            html +=
                                '<td width="10%"><img class="image-pendaftaran" src="{{ asset('template/frontend/assets/umum/study.png') }}"></td>';
                            html += '<td width="*" style="vertical-align:middle;"><span class="detail-name">' +
                                details[i].pelajaran.name +
                                ' ' + details[i].level.level_name + '</span><br><span class="detail-date">' +
                                formatDate(new Date(details[i].start_date), 'EEEE, dd MMMM yyyy') +
                                '</span><br><span class="detail-time">' + details[i].start_time.substring(0,
                                5) +
                                ' - ' + details[i].finish_time.substring(0, 5) + '</span></td>';
                                html +=
                                '<td width="10%"><img id="image_pilih_'+i+'" style="display:none;" class="image-pendaftaran" src="{{ asset('template/frontend/assets/umum/checkout.png') }}"></td>';
                            html += '</tr>';
                        } else {
                            html += '<tr onclick="add_to_cart(' + details[i].id + ',' + details[i]
                                .competition_id +
                                ',' + i + ')" class="baris baris-active" id="baris_' + i + '">';
                            html +=
                                '<td width="10%"><img class="image-pendaftaran" src="{{ asset('template/frontend/assets/umum/study.png') }}"></td>';
                            html += '<td width="*" style="vertical-align:middle;"><span class="detail-name">' +
                                details[i].pelajaran.name +
                                ' ' + details[i].level.level_name + '</span><br><span class="detail-date">' +
                                formatDate(new Date(details[i].start_date), 'EEEE, dd MMMM yyyy') +
                                '</span><br><span class="detail-time">' + details[i].start_time.substring(0,
                                5) +
                                ' - ' + details[i].finish_time.substring(0, 5) + '</span></td>';
                                html +=
                                '<td width="10%"><img id="image_pilih_'+i+'" class="image-pendaftaran" src="{{ asset('template/frontend/assets/umum/checkout.png') }}"></td>';
                            html += '</tr>';
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
                tipe = "delete";
                $("#image_pilih_"+ndex).hide();
            } else {
                $("#baris_" + ndex).addClass("baris-active");
                tipe = 'add';
                $("#image_pilih_"+ndex).show();
            }
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('add_to_cart') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "compete_id": compete_id,
                    "type": tipe,
                    "_token": csrf_token
                },
                success: function(data) {
                    $(".cart-number").text(data.jumlah);
                    if(data.jumlah > 0) {
                        $(".cart-number").show();
                    } else {
                        $(".cart-number").hide();
                    }
                }
            })
        }
    </script>
@endif

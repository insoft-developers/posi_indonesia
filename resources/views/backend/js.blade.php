
@include('backend.custom_js.common_js')
@include('backend.custom_js.competition_js')
@include('backend.custom_js.pelajaran_js')
@include('backend.custom_js.kelas_js')
@include('backend.custom_js.level_js')
@include('backend.custom_js.product_js')
@include('backend.custom_js.user_js')
@include('backend.custom_js.pesanan_js')
@include('backend.custom_js.soal_js')
@include('backend.custom_js.question_js')
@include('backend.custom_js.cart_js')
@include('backend.custom_js.collective_js')
@include('backend.custom_js.hasil_js')
@include('backend.custom_js.pengumuman_js')
@include('backend.custom_js.winner_js')
@include('backend.custom_js.berita_js')
@include('backend.custom_js.event_js')
@include('backend.custom_js.homepage_js')
@include('backend.custom_js.team_js')
@include('backend.custom_js.partner_js')
@include('backend.custom_js.testimony_js')


@if ($view == 'about')
<script>
    CKEDITOR.replace('about_text');
    CKEDITOR.replace('content1');
    CKEDITOR.replace('content2');
    CKEDITOR.replace('content3');
</script>
@endif

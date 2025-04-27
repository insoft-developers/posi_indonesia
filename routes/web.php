<?php

use App\Http\Controllers\Admin\JuaraController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\CollectiveController;
use App\Http\Controllers\Backend\CompetitionController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\Hasil2Controller;
use App\Http\Controllers\Backend\HasilController;
use App\Http\Controllers\Backend\HomepageController;
use App\Http\Controllers\Backend\KelasController;
use App\Http\Controllers\Backend\LevelController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\PelajaranController;
use App\Http\Controllers\Backend\PengumumanController;
use App\Http\Controllers\Backend\PesananController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileSettingController;
use App\Http\Controllers\Backend\QuestionController;
use App\Http\Controllers\Backend\SoalController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonyController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\AdministrativeController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JadwalController;
use App\Http\Controllers\Frontend\RiwayatController;
use App\Http\Controllers\Frontend\TransactionController;
use App\Http\Controllers\Frontend\UjianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WinnerListController;
use App\Mail\RegisMail;
use App\Models\Administrasi;
use App\Models\ExamSession;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use phpseclib3\Crypt\Rijndael;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('path', function(){
//     return public_path('/');
// });

Route::prefix('posiadmin')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login-post', [LoginController::class, 'login_post'])->name('login.post');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::group(['prefix' => 'posiadmin', 'middleware' => 'adminauth'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    
    Route::resource('/competition', CompetitionController::class)->middleware('notutor');
    Route::get('/competition-table', [CompetitionController::class, 'competition_table'])->name('competition.table')->middleware('notutor');
    Route::post('/simpan_study', [CompetitionController::class, 'simpan_study'])->middleware('notutor');
    Route::post('/update_study', [CompetitionController::class, 'update_study'])->middleware('notutor');
    Route::get('/edit_study/{id}', [CompetitionController::class, 'edit_study'])->middleware('notutor');
    Route::post('/delete_study', [CompetitionController::class, 'delete_study'])->middleware('notutor');
    Route::post('/get_sekolah_from_db', [CompetitionController::class, 'get_sekolah_from_db'])->middleware('notutor');

    Route::get('/get_kabupaten_by_province_id/{id}', [AdministrativeController::class, 'get_kabupaten'])->middleware('notutor');
    Route::get('/get_kecamatan_by_kabupaten_id/{id}', [AdministrativeController::class, 'get_kecamatan'])->middleware('notutor');
    Route::post('/get_sekolah_by_kecamatan_id', [AdministrativeController::class, 'get_sekolah_by_jenjang'])->middleware('notutor');

    Route::resource('/pelajaran', PelajaranController::class)->middleware('notutor');
    Route::get('/pelajaran-table', [PelajaranController::class, 'pelajaran_table'])->name('pelajaran.table')->middleware('notutor');

    Route::resource('/kelas', KelasController::class)->middleware('notutor');
    Route::get('/kelas-table', [KelasController::class, 'kelas_table'])->name('kelas.table')->middleware('notutor');

    Route::resource('/level', LevelController::class)->middleware('notutor');
    Route::get('/level-table', [LevelController::class, 'level_table'])->name('level.table')->middleware('notutor');

    Route::resource('/product', ProductController::class)->middleware('notutor');
    Route::get('/product-table', [ProductController::class, 'product_table'])->name('product.table')->middleware('notutor');
    Route::post('/product_study', [ProductController::class, 'product_study'])->middleware('notutor');
    Route::post('/simpan_document', [ProductController::class, 'simpan_document'])->middleware('notutor');
    Route::post('/update_document', [ProductController::class, 'update_document'])->middleware('notutor');
    Route::post('/document-list', [ProductController::class, 'document_list'])->middleware('notutor');
    Route::post('/document-delete', [ProductController::class, 'document_delete'])->middleware('notutor');
    Route::get('/document-edit/{id}', [ProductController::class, 'document_edit'])->middleware('notutor');

    Route::resource('/user', UserController::class)->middleware('notutor');
    Route::get('/user-table', [UserController::class, 'user_table'])->name('user.table')->middleware('notutor');
    Route::post('/list_kelas', [UserController::class, 'list_kelas'])->middleware('notutor');
    Route::post('/list_kabupaten', [UserController::class, 'list_kabupaten'])->middleware('notutor');
    Route::post('/list_kecamatan', [UserController::class, 'list_kecamatan'])->middleware('notutor');
    Route::post('/list_sekolah', [UserController::class, 'list_sekolah'])->middleware('notutor');
    Route::post('/reset_password', [UserController::class, 'reset_password'])->middleware('notutor');
    Route::post('/admin_user_login', [UserController::class, 'admin_user_login'])->name('admin.user.login')->middleware('notutor');


    Route::resource('/pesanan', PesananController::class)->middleware('notutor');
    Route::post('/pesanan-table', [PesananController::class, 'pesanan_table'])->name('pesanan.table')->middleware('notutor');
    Route::post('/pesanan-table-not-approve', [PesananController::class, 'pesanan_table_not_approve'])->name('pesanan.table.not.approve')->middleware('notutor');
    Route::post('/pesanan-table-approve', [PesananController::class, 'pesanan_table_approve'])->name('pesanan.table.approve')->middleware('notutor');
    Route::post('/transaction_list', [PesananController::class, 'transaction_list'])->middleware('notutor');
    Route::post('/transaction_approve', [PesananController::class, 'transaction_approve'])->middleware('notutor');
    Route::post('/transaction_reset', [PesananController::class, 'transaction_reset'])->middleware('notutor');
    Route::post('/bulk_approve', [PesananController::class, 'bulk_approve'])->middleware('notutor');


    Route::resource('/soal', SoalController::class);
    Route::get('/soal-table', [SoalController::class, 'soal_table'])->name('soal.table');
    Route::post('/get_level', [SoalController::class, 'get_level']);
    Route::post('/get_study', [SoalController::class, 'get_study']);
    Route::get('/copydata/{id}', [SoalController::class, 'copy_data']);
    Route::post('/copynow', [SoalController::class, 'copynow']);
    Route::post('/soal_clean', [SoalController::class, 'soal_clean']);


    Route::resource('/ujian', QuestionController::class);
    Route::get('/question-table/{link}', [QuestionController::class, 'question_table']);
    Route::get('/preview/{id}', [QuestionController::class, 'preview']);

    Route::resource('/cart', CartController::class)->middleware('notutor');
    Route::get('/cart_table', [CartController::class, 'cart_table'])->name('cart.table')->middleware('notutor');

    Route::resource('/collective', CollectiveController::class)->middleware('notutor');
    Route::get('/collective_table', [CollectiveController::class, 'collective_table'])->name('collective.table')->middleware('notutor');
    Route::get('/collective_study_table/{id}', [CollectiveController::class, 'collective_study_table'])->middleware('notutor');
    Route::get('/collective_list_table/{comid}/{id}', [CollectiveController::class, 'collective_list_table'])->middleware('notutor');
    Route::post('/get_daftar', [CollectiveController::class, 'get_daftar'])->middleware('notutor');
    Route::get('/download_template_pendaftaran', [CollectiveController::class, 'download_template_pendaftaran'])->middleware('notutor');
    Route::post('/pendaftaran_upload', [CollectiveController::class, 'pendaftaran_upload'])->name('pendaftaran.upload')->middleware('notutor');
    Route::get('/collective_list/{comid}/{id}',  [CollectiveController::class, 'collective_list'])->middleware('notutor');

    Route::resource('/hasil', Hasil2Controller::class)->middleware('notutor');
    Route::get('/hasil_table', [Hasil2Controller::class, 'hasil_table'])->name('hasil.table')->middleware('notutor');


    Route::get('/hasil_detail_table/{id}', [HasilController::class, 'hasil_detail_table'])->middleware('notutor');
    Route::post('/hasil_detail_delete', [HasilController::class, 'hasil_detail_delete'])->middleware('notutor');

    Route::get('/competition_result/{comid}/{studyid?}', [HasilController::class, 'index'])->middleware('notutor');
    Route::get('/session_exam_table/{comid}/{studyid?}', [HasilController::class, 'hasil_table'])->middleware('notutor');

    Route::post('/bulk_delete', [HasilController::class, 'bulk_delete'])->middleware('notutor');
    



    Route::resource('/pemberitahuan', PengumumanController::class)->middleware('notutor');
    Route::get('/pemberitahuan_table', [PengumumanController::class, 'pemberitahuan_table'])->name('pemberitahuan.table')->middleware('notutor');
    Route::get('/get_pengumuman_study/{id}', [PengumumanController::class, 'get_pengumuman_study'])->middleware('notutor');
    Route::get('/get_pengumuman_level/{pelajaran}/{competition}', [PengumumanController::class, 'get_pengumuman_level'])->middleware('notutor');
    Route::post('/hitung_hasil_ujian', [PengumumanController::class, 'hitung_hasil_ujian'])->middleware('notutor');

    Route::resource('winner', WinnerListController::class)->middleware('notutor');
    Route::get('/winner_table/{id}', [WinnerListController::class, 'winner_table'])->middleware('notutor');

    Route::resource('beritas', BeritaController::class)->middleware('notutor');
    Route::get('/berita_table', [BeritaController::class, 'berita_table'])->name('berita.table')->middleware('notutor');
    
    Route::resource('/event', EventController::class)->middleware('notutor');
    Route::get('/event_table', [EventController::class, 'event_table'])->name('event.table')->middleware('notutor');


    Route::get('/visi-misi', [HomepageController::class, 'visi_misi'])->middleware('notutor');
    Route::post('/visi_update', [HomepageController::class, 'visi_update'])->name('visi.update')->middleware('notutor');


    Route::get('/flow', [HomepageController::class, 'flow'])->middleware('notutor');
    Route::post('/flow_update', [HomepageController::class, 'flow_update'])->name('flow.update')->middleware('notutor');

    Route::get('/privacy', [HomepageController::class, 'privacy'])->middleware('notutor');
    Route::post('/privacy_update', [HomepageController::class, 'privacy_update'])->name('privacy.update')->middleware('notutor');

    Route::get('/term', [HomepageController::class, 'term'])->middleware('notutor');
    Route::post('/term_update', [HomepageController::class, 'term_update'])->name('term.update')->middleware('notutor');


    Route::get('/refund', [HomepageController::class, 'refund'])->middleware('notutor');
    Route::post('/refund_update', [HomepageController::class, 'refund_update'])->name('refund.update')->middleware('notutor');

    Route::resource('/team', TeamController::class)->middleware('notutor');
    Route::get('/team_table', [TeamController::class, 'team_table'])->name('team.table')->middleware('notutor');

    Route::resource('/partner', PartnerController::class)->middleware('notutor');
    Route::get('/partner_table', [PartnerController::class, 'partner_table'])->name('partner.table')->middleware('notutor');

    Route::resource('/testimony', TestimonyController::class)->middleware('notutor');
    Route::get('/testimony_table', [TestimonyController::class, 'testimony_table'])->name('testimony.table')->middleware('notutor');


    Route::resource('/abouts', AboutController::class)->middleware('notutor');

    Route::resource('/admins', AdminsController::class)->middleware('sadmin');
    Route::get('/admins_table', [AdminsController::class, 'admins_table'])->name('admins.table')->middleware('sadmin');

    Route::get('/facility_file/{product_id}/{competition_id}', [ProductController::class, 'facility_file']);

    Route::post('/simpan_setting', [ProductController::class, 'simpan_setting']);

    Route::get('/setting_css/{product_id}/{competition_id}', [ProductController::class, 'setting_css']);

    Route::resource('/order', OrderController::class);
    Route::post('/order_table', [OrderController::class, 'order_table'])->name('order.table');


    Route::get('/profile_setting', [ProfileSettingController::class, 'index']);
    Route::post('/update_admin_profile', [ProfileSettingController::class, 'update'])->name('admin.profile.update');
    Route::get('/change_password', [ProfileSettingController::class, 'change_password']);
    Route::post('/password_update', [ProfileSettingController::class, 'password_update'])->name('admin.change.password');

});

// =====================================================================================
//                                        FRONT END
// =====================================================================================

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/event', [HomeController::class, 'event']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/pengumuman', [HomeController::class, 'pengumuman']);
Route::get('/events', [HomeController::class, 'events']);
Route::get('/event-detail/{slug}', [HomeController::class, 'event_detail']);
Route::get('/privacy_policy', [HomeController::class, 'privacy_policy']);
Route::get('/term_condition', [HomeController::class, 'term_condition']);
Route::get('/refund_policy', [HomeController::class, 'refund_policy']);
// Route::get('/berita-detail/{id}', [HomeController::class, 'berita_detail']);

Route::get('/berita-detail/{id}', [HomeController::class, 'berita_detail']);
Route::get('/berita-category/{category}', [HomeController::class, 'berita_category']);

Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleController::class, 'callbackGoogle']);
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/main', [HomeController::class, 'main'])->middleware('cdata');
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit')
        ->middleware('cdata');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('get_competition_data', [HomeController::class, 'get_competition_data']);
    Route::post('add_to_cart', [HomeController::class, 'add_to_cart']);
    Route::post('add_free_invoice', [TransactionController::class, 'add_free_invoice']);
    Route::get('cart', [HomeController::class, 'cart'])->middleware('cdata');
    Route::post('cart-delete', [HomeController::class, 'cart_delete']);
    Route::post('cart-ubah-quantity', [HomeController::class, 'cart_ubah'])->name('cart.ubah');
    Route::post('ro-kota', [HomeController::class, 'ro_kota'])->name('ro.kota');
    Route::post('ro-district', [HomeController::class, 'ro_district'])->name('ro.district');
    Route::post('ro-cost', [HomeController::class, 'ro_cost'])->name('ro.cost');

    Route::get('transaction', [TransactionController::class, 'index'])->middleware('cdata');
    Route::post('transaction-store', [TransactionController::class, 'store']);
    Route::post('online-payment', [TransactionController::class, 'online_payment']);
    Route::post('upload-bukti', [TransactionController::class, 'upload_bukti'])->name('upload.bukti');

    Route::get('show-invoice/{invoice}', [TransactionController::class, 'show_invoice']);

    Route::get('after_register/{id}', [ProfileController::class, 'after_register']);
    Route::post('after_register_store', [ProfileController::class, 'after_register_store'])->name('register.after');

    Route::post('send_email_passcode', [ProfileController::class, 'send_email_passcode']);
    Route::post('verify_email_passcode', [ProfileController::class, 'verify_email_passcode']);
    Route::get('get_kelas_by_jenjang/{level}', [ProfileController::class, 'get_kelas']);

    Route::get('get_kabupaten_by_province_id/{p}', [AdministrativeController::class, 'get_kabupaten']);
    Route::get('get_kecamatan_by_kabupaten_id/{p}', [AdministrativeController::class, 'get_kecamatan']);
    // Route::get('get_sekolah_by_kecamatan_id/{p}', [AdministrativeController::class, 'get_sekolah']);
    Route::post('/get_sekolah_by_kecamatan_id', [AdministrativeController::class, 'get_sekolah_by_jenjang']);
    
    Route::get('jadwal', [JadwalController::class, 'index'])->middleware('cdata');
    Route::post('show_pengumuman', [JadwalController::class, 'show_pengumuman'])->name('show.pengumuman');
    Route::post('search_pengumuman', [JadwalController::class, 'search_pengumuman'])->name('search.pengumuman');
    Route::post('confirm_order', [JadwalController::class, 'confirm_order'])->name('confirm.order');
    Route::post('simpan_product', [JadwalController::class, 'simpan_product'])->name('simpan.product');

    Route::post('ujian-start', [UjianController::class, 'ujian_start']);
    Route::get('ujian/{token}', [UjianController::class, 'index']);
    Route::post('simpan-jawaban', [UjianController::class, 'simpan_jawaban'])->name('simpan.jawaban');
    Route::post('jawaban-sebelumnya', [UjianController::class, 'jawaban_sebelumnya'])->name('jawaban.sebelumnya');

    Route::get('ujian-selesai', [UjianController::class, 'ujian_selesai']);
    Route::post('ujian-habis-waktu', [UjianController::class, 'ujian_habis_waktu']);
    Route::post('list-soal', [UjianController::class, 'list_soal'])->name('list.soal');
    Route::post('goto', [UjianController::class, 'goto'])->name('go.to');
    Route::post('selesai_ujian', [UjianController::class, 'selesai_ujian']);

    Route::get('riwayat', [RiwayatController::class, 'index'])->middleware('cdata');
    Route::post('bonus_claim', [RiwayatController::class, 'bonus_claim'])->name('bonus.claim');
    Route::post('facility_show', [RiwayatController::class, 'facility_show'])->name('facility.show');
    Route::get('facility_file/{transactionid}/{token}', [RiwayatController::class, 'facility_file']);

    Route::get('password_setting', [ProfileController::class, 'password_setting']);
    Route::post('password_frontend_change', [ProfileController::class, 'password_frontend_change'])->name('password.frontend.change');

    

});

Route::post('midtrans-callback', [TransactionController::class, 'callback']);
Route::get('get_kelas_register/{level}', [ProfileController::class, 'get_kelas']);


require __DIR__ . '/auth.php';

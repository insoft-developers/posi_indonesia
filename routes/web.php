<?php

use App\Http\Controllers\Admin\JuaraController;
use App\Http\Controllers\Backend\CompetitionController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KelasController;
use App\Http\Controllers\Backend\LevelController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\PelajaranController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\AdministrativeController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JadwalController;
use App\Http\Controllers\Frontend\RiwayatController;
use App\Http\Controllers\Frontend\TransactionController;
use App\Http\Controllers\Frontend\UjianController;
use App\Http\Controllers\ProfileController;
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

Route::get('path', function(){
    return public_path('/');
});

Route::prefix('posiadmin')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login-post', [LoginController::class, 'login_post'])->name('login.post');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::group(['prefix' => 'posiadmin', 'middleware' => 'adminauth'], function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/competition', CompetitionController::class);
    Route::get('/competition-table', [CompetitionController::class, 'competition_table'])->name('competition.table');
    Route::post('/simpan_study', [CompetitionController::class, 'simpan_study']);
    Route::post('/update_study', [CompetitionController::class, 'update_study']);
    Route::get('/edit_study/{id}', [CompetitionController::class, 'edit_study']);
    Route::post('/delete_study', [CompetitionController::class, 'delete_study']);

    Route::get('/get_kabupaten_by_province_id/{id}', [AdministrativeController::class, 'get_kabupaten']);
    Route::get('/get_kecamatan_by_kabupaten_id/{id}', [AdministrativeController::class, 'get_kecamatan']);
    Route::post('/get_sekolah_by_kecamatan_id', [AdministrativeController::class, 'get_sekolah_by_jenjang']);

    Route::resource('/pelajaran', PelajaranController::class);
    Route::get('/pelajaran-table', [PelajaranController::class, 'pelajaran_table'])->name('pelajaran.table');

    Route::resource('/kelas', KelasController::class);
    Route::get('/kelas-table', [KelasController::class, 'kelas_table'])->name('kelas.table');

    Route::resource('/level', LevelController::class);
    Route::get('/level-table', [LevelController::class, 'level_table'])->name('level.table');

    Route::resource('/product', ProductController::class);
    Route::get('/product-table', [ProductController::class, 'product_table'])->name('product.table');
    Route::post('/product_study', [ProductController::class, 'product_study']);


    Route::resource('/user', UserController::class);
    Route::get('/user-table', [UserController::class, 'user_table'])->name('user.table');

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
    Route::post('list-soal', [UjianController::class, 'list_soal'])->name('list.soal');
    Route::post('goto', [UjianController::class, 'goto'])->name('go.to');
    Route::post('selesai_ujian', [UjianController::class, 'selesai_ujian']);

    Route::get('riwayat', [RiwayatController::class, 'index'])->middleware('cdata');
    Route::post('bonus_claim', [RiwayatController::class, 'bonus_claim'])->name('bonus.claim');
    Route::post('facility_show', [RiwayatController::class, 'facility_show'])->name('facility.show');
    Route::get('facility_file/{transactionid}/{token}', [RiwayatController::class, 'facility_file']);
});

Route::post('midtrans-callback', [TransactionController::class, 'callback']);

// Route::get('raja', function () {
//     $curl = curl_init();

//     curl_setopt_array($curl, [
//         CURLOPT_URL => 'https://pro.rajaongkir.com/api/subdistrict?city=112',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'GET',
//         CURLOPT_HTTPHEADER => ['key: ' . config('app.raja_key') . ''],
//     ]);

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) {
//         echo 'cURL Error #:' . $err;
//     } else {
//         echo $response;
//     }
// });

// Route::get('hitung_juara/{com}/{study}', [JuaraController::class, 'hitung']);

// Route::get('clear_number', function(){
//     session(['nomor'=> 0]);
// });

// Route::get('send_mail', function(){
//     $email = "irdn.software@gmail.com";
//     $user = User::where('email', $email)->first();

//     $details = [
//         'nama' => $user->name,
//         'email' => $email,
//         'passcode' => '123345'
//     ];

//     Mail::to($email)->send(new RegisMail($details));
// });

// Route::get('data_sekolah/{page}', function () {
//     // $payload = json_encode($data);

//     $page = Request::segment(2);

//     $headers = ['Content-Type: application/json'];

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, 'https://api-sekolah-indonesia.vercel.app/sekolah?kab_kota=070100&page=1&perPage=1387');
//     curl_setopt($ch, CURLOPT_POST, false);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//     curl_setopt($ch, CURLOPT_VERBOSE, true);
//     $response = curl_exec($ch);
//     $err = curl_error($ch);
//     curl_close($ch);

//     if ($err) {
//         return response()->json(
//             [
//                 'message' => 'Curl Error ' . $err,
//             ],
//             500,
//         );
//     } else {
//         $data = json_decode($response);
//         $sekolah = $data->dataSekolah;
//         // return $sekolah[0]->kode_prop;

//         foreach ($sekolah as $index => $s) {
//             $adm = new Administrasi();
//             $adm->province_code = $s->kode_prop;
//             $adm->province_name = $s->propinsi;
//             $adm->regency_code = $s->kode_kab_kota;
//             $adm->regency_name = $s->kabupaten_kota;
//             $adm->district_code = $s->kode_kec;
//             $adm->district_name = $s->kecamatan;
//             $adm->nspn = $s->npsn;
//             $adm->school_name = $s->sekolah;
//             $adm->bentuk = $s->bentuk;
//             $adm->page = $index;
//             $adm->save();

//             echo $index . '/';
//         }
//     }
// });

require __DIR__ . '/auth.php';

<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\isAdmin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\AdminController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profil', function () {
    $user = Auth::user();
    return view('profil.index', compact('user'));
})->name('profil.index');



Auth::routes();

Route::get('/profil/edit', function () {
    return view('profil.edit', ['user' => Auth::user()]);
})->middleware('auth')->name('profil.edit');


Route::post('/profil/update', function (Illuminate\Http\Request $request) {
    $user = Auth::user();

    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'jenis_kelamin' => 'required|in:L,P',
        'alamat' => 'nullable|string',
        'no_telp' => 'required|string|max:15',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only(['nama_lengkap', 'username', 'email', 'jenis_kelamin', 'alamat', 'no_telp']);
if ($request->hasFile('foto')) {
    // Hapus foto lama
    if ($user->foto && Storage::disk('public')->exists('foto/' . $user->foto)) {
        Storage::disk('public')->delete('foto/' . $user->foto);
    }
    
    // Simpan foto baru
    $filename = uniqid() . '.' . $request->foto->extension();
    $request->foto->storeAs('public/foto', $filename);
    $data['foto'] = $filename;
}

    $user->update($data);

    return redirect('/profil')->with('success', 'Profil berhasil diperbarui');
})->name('profil.update');

Route::delete('/profil/foto', function () {
    $user = Auth::user();

    if ($user->foto && Storage::disk('public')->exists('foto/' . $user->foto)) {
        Storage::disk('public')->delete('foto/' . $user->foto);
        $user->update(['foto' => null]);
    }

    return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
})->name('profil.deleteFoto');
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});


Route::middleware(['auth', isAdmin::class])->group(function(){
 Route::get('/dana/transfer', [DanaController::class, 'transferForm'])->name('dana.transfer');
    Route::post('/dana/transfer', [DanaController::class, 'transfer'])->name('dana.transfer');

    Route::resource('dana', DanaController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


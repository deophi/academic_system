<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kepsek;
use App\Http\Controllers\Guru;
use App\Http\Controllers\Profil;
use App\Http\Controllers\ChangeLevel;
use App\Http\Controllers\Langgar;
use App\Http\Controllers\DaftarUser;
use App\Http\Controllers\AksesAdmin;
use App\Http\Controllers\kelas;
use App\Http\Controllers\Mapel;
use App\Http\Controllers\Jadwal;
use App\Http\Controllers\Pegawai;
use App\Http\Controllers\Land;

Route::resource('auth', App\Http\Controllers\Author::class);

Route::middleware(['auth', 'verified'])->group(function () {

	Route::resource('akademik/artikel', App\Http\Controllers\Berita::class);

	Route::get('akademik/fouls/sumsrc=', [Kepsek::class, 'jmlpoinsrc'])->name('kepseksumsrc');
	Route::get('akademik/fouls/sum', [Kepsek::class, 'jmlpoin'])->name('kepseksum');
	Route::get('akademik/fouls', [Kepsek::class, 'index'])->name('kepsekfls');

	Route::resource('akademik/listkelas', App\Http\Controllers\Siswa::class);

	Route::get('akademik/kelas', [Guru::class, 'wali'])->name('walind');
	Route::get('akademik/guru/cetakjadwal', [Guru::class, 'ctkjadwal'])->name('ctkjadwal');

	Route::post('akademik/profil/upfoto', [Profil::class, 'upgbr'])->name('upgbr');
	Route::get('akademik/profil/foto', [Profil::class, 'gbr'])->name('gbr');
	Route::get('akademik/profil/password', [Profil::class, 'pass'])->name('pass');
	Route::post('akademik/profil/mottoup', [Profil::class, 'mottoup'])->name('upm');
	Route::get('akademik/profil/motto', [Profil::class, 'motto'])->name('motto');
	Route::post('akademik/profil/updatepw', [Profil::class, 'upw'])->name('gantipw');
	Route::resource('akademik/profil', Profil::class);

	Route::get('akademik/status=src', [ChangeLevel::class, 'src'])->name('csrc');
	Route::resource('akademik/status', ChangeLevel::class);

	Route::get('akademik/pelanggaran/auto', [Langgar::class, 'auto'])->name('autolgr');
	Route::post('akademik/pelanggaran/konfirmasi', [Langgar::class, 'mstore'])->name('mstore');
	Route::post('akademik/pelanggaran/simpan', [Langgar::class, 'storelgr'])->name('storelgr');
	Route::get('akademik/pelanggaran/tambah', [Langgar::class, 'newlgr'])->name('newlgr');
	Route::get('akademik/pelanggaran/poin=src', [Langgar::class, 'jmlpoinsrc'])->name('jmlpoinsrc');
	Route::get('akademik/pelanggaran/poin', [Langgar::class, 'jmlpoin'])->name('jmlpoin');
	Route::get('akademik/pelanggaran/print={id}', [Langgar::class, 'cetak'])->name('print');
	Route::resource('akademik/pelanggaran', Langgar::class);

	Route::get('akademik/siswa/kelas', [DaftarUser::class, 'ksiswa'])->name('ksiswa');
	Route::get('akademik/siswa/kelasid={id}', [DaftarUser::class, 'kelas'])->name('siswakelas');
	Route::get('akademik/siswa/{id}/kelas', [DaftarUser::class, 'tkelas'])->name('tkelas');
	Route::post('akademik/siswa/kelas/simpan', [DaftarUser::class, 'storekelas'])->name('storekelas');
	Route::get('akademik/siswa/{id}/ubahkelas', [DaftarUser::class, 'ukelas'])->name('ukelas');
	Route::post('akademik/siswa/kelas/update{id}', [DaftarUser::class, 'updatekelas'])->name('updatekelas');
	Route::get('akademik/kelasid={id}/cetak/jadwal', [DaftarUser::class, 'cetakjdwl'])->name('printjdwl');
	Route::get('akademik/kelasid={id}/cetak/daftarsiswa', [DaftarUser::class, 'cetaksis'])->name('printsis');

	Route::get('akademik/kelasid={id}/mpl', [AksesAdmin::class, 'buatjadwal'])->name('buatjadwal');
	Route::post('akademik/storejadwal', [AksesAdmin::class, 'storejdwl'])->name('storejdwl');

	Route::get('akademik/siswa/jurusanid={id}', [DaftarUser::class, 'jurusan'])->name('siswajurusan');
	Route::get('akademik/siswa/jurusan', [DaftarUser::class, 'jsiswa'])->name('jsiswa');
	Route::get('akademik/siswa/{id}/jurusan', [DaftarUser::class, 'tjurusan'])->name('tjurusan');
	Route::post('akademik/siswa/jurusan/simpan{id}', [DaftarUser::class, 'storejurusan'])->name('storejurusan');
	Route::get('akademik/siswa/{id}/ubahjurusan', [DaftarUser::class, 'ujurusan'])->name('ujurusan');

	Route::get('akademik/guru/pelajaransrc', [Guru::class, 'gurusrc'])->name('gurusrc');
	Route::get('akademik/guru/pelajaran{id}', [Guru::class, 'gurukat'])->name('gurukat');
	Route::get('akademik/guru/pelajaran', [Guru::class, 'index'])->name('pelajaran.index');
	Route::get('akademik/guru/nonpnssrc', [Guru::class, 'pnsnosrc'])->name('pnsnosrc');
	Route::get('akademik/guru/pnssrc', [Guru::class, 'pnsyessrc'])->name('pnsyessrc');
	Route::post('akademik/guru/pns/store', [Guru::class, 'gurupnsstore'])->name('gurupnsstore');
	Route::get('akademik/guru/pnsgol{id}', [Guru::class, 'pnsgol'])->name('gurupnsgol');
	Route::get('akademik/guru/pns', [Guru::class, 'pns'])->name('gurupns');

	Route::resource('akademik/pegawai', Pegawai::class);
	Route::get('akademik/pegawaisrc', [Pegawai::class, 'src'])->name('pgwsrc');

	Route::post('akademik/procaj/angkatan', [AksesAdmin::class, 'angkatan'])->name('angkatan');

	Route::post('akademik/procaj/mapelup', [Mapel::class, 'ubah'])->name('ubahmapel');
	Route::resource('akademik/procaj/mapel', Mapel::class);

	Route::resource('akademik/procaj/kelas', App\Http\Controllers\Kls::class);
	Route::resource('akademik/procaj/jurusan', App\Http\Controllers\Jur::class);

	Route::get('akademik/procaj', [AksesAdmin::class, 'jurkel'])->name('jurkel');

	Route::post('akademik/jadwal/{id}/step2', [Jadwal::class, 'stepnext'])->name('stepnext');
	Route::resource('akademik/jadwal', Jadwal::class);

	Route::post('akademik/updatecoba{id}', [DaftarUser::class, 'updatecoba'])->name('updatecoba');

	Route::resource('akademik/materi', App\Http\Controllers\Materi::class);
	Route::resource('akademik/pns', App\Http\Controllers\Pns::class);
	Route::resource('akademik/kegiatan', App\Http\Controllers\Act::class);
	Route::resource('akademik/profilsekolah', App\Http\Controllers\Prof::class);
	Route::resource('akademik/pengaturan', App\Http\Controllers\Pengaturan::class);
	Route::resource('akademik/surattugas/klasifikasi', App\Http\Controllers\Klasifikasi::class);
	Route::resource('akademik/surattugas', App\Http\Controllers\Surat::class);
	Route::resource('akademik', App\Http\Controllers\Dash::class);
});

Route::get('/', [Land::class, 'index'])->name('index');
Route::get('{id}', [Land::class, 'show'])->name('show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

@section('judul', 'Kelas '.$kls->nama)

@section('dkls')
    class="active"
  @endsection

@include('dash.head')
@include('dash.side')

@if(Auth::user()->levels_id == 8)
    @include('siswa.jadwal')
    @include('siswa.siswa')
@elseif(Auth::user()->levels_id > 4 && Auth::user()->levels_id < 7)
    @include('siswa.jadwal')
    @include('siswa.siswa')
@elseif(Auth::user()->levels_id == 2)
  <div class="alert alert-info">
    <div class="alert-title">Selamat Datang {{ Auth::user()->name }}</div>
    Akun anda belum terverifikasi. Silahkan tunggu atau hubungi admin untuk verifikasi akun anda.
  </div>
@elseif(Auth::user()->levels_id == 3)
  <div class="alert alert-info">
    <div class="alert-title">Selamat Datang {{ Auth::user()->name }}</div>
    Akun anda telah dinonaktifkan. Silahkan hubungi admin untuk keterangan lebih lanjut.
  </div>
@else
  <div class="alert alert-info">
    <div class="alert-title">Selamat Datang {{ Auth::user()->name }}</div>
    Mohon maaf karena anda tidak dapat mengakses halaman ini.
  </div>
@endif

@include('dash.foot')
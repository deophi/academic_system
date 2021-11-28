@section('set')
  class="active"
@endsection

@section('dropset', 'active')

@section('judul', 'Pengaturan')

@include('dash.head')
@include('dash.side')

@if(Auth::user()->levels_id == 2)
  <div class="alert alert-info">
    <div class="alert-title">Selamat Datang {{ Auth::user()->name }}</div>
    Akun anda belum terverifikasi. Silahkan tunggu atau hubungi admin untuk verifikasi akun anda.
  </div>
@elseif(Auth::user()->levels_id == 3)
  <div class="alert alert-info">
    <div class="alert-title">Selamat Datang {{ Auth::user()->name }}</div>
    Akun anda telah dinonaktifkan. Silahkan hubungi admin untuk keterangan lebih lanjut.
  </div>
@elseif(Auth::user()->levels_id > 3)
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@else
  <div class="row">
    <div class="col-7">
      @include('pengaturan.bio')
      @include('pengaturan.somed')
    </div>
    <div class="col-5">
      @include('pengaturan.gbr')
    </div>
  </div>
  @include('pengaturan.sambut')
@endif

@include('dash.foot')
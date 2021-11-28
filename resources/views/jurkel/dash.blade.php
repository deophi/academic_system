@section('jurkel')
  class="active"
@endsection

@section('dropset', 'active')
@section('judul', 'Proses Ajar')

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
          @include('jurkel.listangkatan')
          @include('jurkel.formangkatan')
        </div>
        <div class="row">
          @include('jurkel.listjur')
          @include('jurkel.formjur')
        </div>
        <div class="row">
          @include('jurkel.listkls')
          @include('jurkel.formkls')
        </div>
@endif
@include('dash.foot')
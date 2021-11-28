@section('ksiswa')
	class="active"
@endsection

@section('dropdaf', 'active')
@section('dropsis', 'active')

@section('judul', 'Halaman Kelas')

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
              @include('list.listsiswa')
            </div>

            <div class="row">
              @include('list.listjadwal')
            </div>
@endif

@include('dash.foot')
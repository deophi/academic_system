@section('Foto Profil')
	class="active"
@endsection

@section('judul', 'Upload Foto Profil')

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
@else
      <div class="container mt-12">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card">
              <div class="card-body">
                <form method="post" action="{{ route('upgbr') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group" align="center">
                    <input type="file" name="gambar" class="form-control" align="center">
                    <label>Gunakan skala foto 1:1 agar hasil gambar sempurna.</label>
                  </div>
                    <button class="btn btn-block btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
            
    </div>
@endif
@include('dash.foot')
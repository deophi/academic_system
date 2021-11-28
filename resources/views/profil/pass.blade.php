@section('Ubah Password')
	class="active"
@endsection

@section('judul', 'Ubah Password')

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
            <div class="card">
              <!-- <div class="card-header"></div> -->

              <div class="card-body">
                @if(Session::has('pesan'))
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert"><span>&times;</span></button>
                      {{ Session('pesan') }}
                    </div>
                  </div>
                @endif

                <form method="post" action="{{ route('gantipw') }}">
                  @csrf
                  <div class="row">
                    <div class="form-group col-4">
                      <label>Password Lama</label>
                      <input type="password" name="lama" class="form-control" required>
                    </div>
                    <div class="form-group col-4">
                      <label>Password Baru</label>
                      <input type="password" name="baru" class="form-control" required>
                    </div>
                    <div class="form-group col-4">
                      <label>Konfirmasi Password Baru</label>
                      <input type="password" name="konfirm" class="form-control" required>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                </form>

              </div>
            </div>
    </div>
@endif
@include('dash.foot')
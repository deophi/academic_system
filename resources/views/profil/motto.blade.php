@section('Motto')
	class="active"
@endsection

@section('judul', 'Motto')

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
                <form method="post" action="{{ route('upm') }}">
                  @csrf
                  <div class="form-group">
                    <label>Motto Anda</label>
                    <input type="text" name="motto" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                </form>

              </div>
            </div>
    </div>
@endif
@include('dash.foot')
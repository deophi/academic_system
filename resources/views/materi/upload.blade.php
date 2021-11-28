@section('mto')
	class="active"
@endsection

@section('judul', 'Materi Online')

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
@elseif(Auth::user()->levels_id < 8)
                <div class="card">
                  <div class="card-header">
                    <h4>Upload Materi</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <div class="col-sm-12 col-md-12">
                        <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right">Judul</label>
                            <div class="col-12">
                              <input type="text" class="form-control" name="judul" required>
                            </div>
                            <label class="col-form-label text-md-right">Materi</label>
                            <div class="col-12">
                              <input type="file" class="form-control" name="materi">
                            </div>
                          </div>
                          <button class="btn btn-primary btn-block">Publish</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
@else
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@endif

@include('dash.foot')
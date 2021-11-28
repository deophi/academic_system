@section('judul', 'Halaman Kelas')

@section('dropsis', 'active')
@section('dropdaf', 'active')

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
		        <div class="card card-primary">
              <div class="card-header"><h4>Masukkan dalam Kelas</h4></div>
			
              <div class="card-body">
                <form action="{{ route('storekelas', $user->id) }}" method="POST">
                	@csrf
                	<div class="row">
                    <div class="form-group col-4">
                      <label>NISN</label>
                      <input type="text" class="form-control" value="{{ $user->id }}" disabled>
                      <input type="hidden" name="id" value="{{ $user->id }}">
                    </div>
                    <div class="form-group col-4">
                      <label>Nama</label>
                      <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="form-group col-4">
                      <label>Jenis Kelamin</label>
                      <input type="text" class="form-control"
                        @if($user->jks == 1)
                          value="Laki-Laki"
                        @else
                          value="Perempuan"
                        @endif disabled>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-4">
                      <label>No. HP</label>
                      <input type="text" class="form-control" value="{{ $user->hp }}" disabled>
                    </div>
                    <div class="form-group col-8">
                      <label>Alamat</label>
                      <input type="text" class="form-control" value="{{ $user->alamat }}" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Kelas</label>
                      <select name="kelas" class="form-control">
                        @foreach($kls as $r)
                          <option value="{{ $r->id }}">{{ $r->nama }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Simpan Perubahan
                    </button>
                  </div>
                </form>
              </div>
		</div>
@endif
@include('dash.foot')
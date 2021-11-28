@section('lvl')
  class="active"
@endsection

@section('judul', 'Tambah Jadwal Pelajaran')

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
        <div class="card">
          <div class="card-header">
            <h4>Tentukan Jadwal Mata Pelajaran</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('jadwal.store') }}" method="post">
              @csrf
              <input type="hidden" name="kid" value="{{ $id }}">
              <div class="row">
                <div class="form-group col-6">
                  <label>Mata Pelajaran</label>
                  @foreach($mpl as $r)
                    <input type="text" class="form-control" value="{{ $r->nama }}" disabled>
                  @endforeach
                </div>
                <div class="form-group col-6">
                  <label>Guru</label>
                  <select class="form-control select2" name="mpl">
                    @foreach($guru as $r)
                      <option value="{{ $r->id }}">{{ $r->users->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Hari</label>
                  <select class="form-control" name="hari">
                    <option value="1">Senin</option>
                    <option value="2">Selasa</option>
                    <option value="3">Rabu</option>
                    <option value="4">Kamis</option>
                    <option value="5">Jum'at</option>
                    <option value="6">Sabtu</option>
                  </select>
                </div>
                <div class="form-group col-3">
                  <label>Jam Mulai</label>
                  <input type="text" class="form-control" name="awal" placeholder="07:00" required>
                </div>
                <div class="form-group col-3">
                  <label>Jam Berakhir</label>
                  <input type="text" class="form-control" name="akhir" placeholder="08:30" required>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Jadwal</button>
              </div>
            </div>
          </form>
        </div>
      </div>
@endif
@include('dash.foot')

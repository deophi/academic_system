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
            <h4>Pilih Mata Pelajaran</h4>
          </div>
          <div class="card-body">
                  <form action="{{ route('stepnext', $id) }}" method="post">
                    @csrf
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Mata Pelajaran</label>
                        <select class="form-control select2" name="mpl">
                          <?php $nama = '012937' ?>
                          @foreach($mpl as $r)
                            @if($r->nama != $nama)
                              <option value="{{ $r->id }}">{{ $r->nama }}</option>
                            @endif
                            <?php $nama = $r->nama ?>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label style="color: white;">a</label>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Pilih</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
@endif
@include('dash.foot')
@section('judul', 'Buat Surat Tugas')

@section('srttgs')
    class="active"
  @endsection

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
            <div class="card card-primary">
              <div class="card-header"><h4>Buat Surat Tugas</h4></div>
      
              <div class="card-body">
                <form action="{{ route('surattugas.update', $srt->id) }}" method="post">
                  @csrf
                  @method('patch')
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Klasifikasi Dasar</label>
                      <select class="form-control" disabled>
                        <option>{{ str_pad($kd->id, 3, '0', STR_PAD_LEFT) }} - {{ $kd->nama }}</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Klasifikasi</label>
                      <select class="form-control" name="kid">
                        @foreach($k as $r)
                          <option value="{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }}">{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }} - {{ $r->nama }}</option>
                        @endforeach
                      </select>
                      <small style="color: red;">Klasifikasi sebelumnya adalah {{ $srt->surats_id }} - {{ $srt->surats->nama }}</small>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Nama</label>
                      <select class="form-control select2" name="uid">
                        <option value="{{ $srt->users_id }}">{{ $srt->users->name }}</option>
                        @foreach($usr as $r)
                          @if($srt->users_id != $r->id)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Untuk</label>
                      <input type="text" name="tujuan" class="form-control" value="{{ $srt->tujuan }}" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Tempat</label>
                      <input type="text" name="tempat" class="form-control" value="{{ $srt->tempat }}" required>
                    </div>
                    <div class="form-group col-6">
                      <label>Tanggal & Waktu</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="text" name="tgl" class="form-control datetimepicker" value="{{ $srt->waktu }}">
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-block">Buat Surat Tugas</button>
                </form>
              </div>
            </div>
  
@else
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>      
@endif
@include('dash.foot')
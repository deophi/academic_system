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
                <form action="{{ route('surattugas.store') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <label>Klasifikasi Dasar</label>
                      <select class="form-control" disabled>
                        <option>{{ str_pad($kd->id, 3, '0', STR_PAD_LEFT) }} - {{ $kd->nama }}</option>
                      </select>
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label>Klasifikasi</label>
                      <select class="form-control" name="kid">
                        @foreach($srt as $r)
                          <option value="{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }}">{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }} - {{ $r->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <label class="col-4">Nama</label>
                      @if(Auth::user()->levels_id == 1)
                        <select class="form-control select2 col-12" name="uid">
                          @foreach($usr as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                          @endforeach
                        </select>
                      @else
                        <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                      @endif
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label>Penugasan</label>
                      <select class="form-control select2 col-12" name="jenis">
                        <option value="1">Dalam Kota</option>
                        <option value="2">Luar Kota</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <label>Untuk</label>
                      <input type="text" name="tujuan" class="form-control" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label>Tempat</label>
                      <input type="text" name="tempat" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <label>Tanggal Penugasan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="text" name="tgl" class="form-control datetimepicker">
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label>Akhir Penugasan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="text" name="akhir" class="form-control datetimepicker">
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
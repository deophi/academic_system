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
                <form action="{{ route('surattugas.create') }}" method="get">
                  <div class="row">
                    <div class="form-group col-12 col-sm-7">
                      <label>Klasifikasi Dasar</label>
                      <select class="form-control" name="kd">
                        @foreach($srt as $r)
                          <option value="{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }}">{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }} - {{ $r->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-12 col-sm-5">
                      <label style="color: #fff">tombol</label>
                      <button type="submit" class="btn btn-primary btn-block btn-action">Pilih Klasifikasi</button>
                    </div>
                  </div>
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
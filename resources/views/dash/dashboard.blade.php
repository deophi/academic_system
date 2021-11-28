@section('judul', 'Dashboard')

@section('dashboard')
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
@else
          @if(Auth::user()->levels_id == 1)
            @include('dash.jumlah')
            <div class="row">
              <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                @include('dash.tindakan')
              </div>
              <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                @include('dash.pelanggaran')
              </div>
            </div>
          @elseif(Auth::user()->levels_id == 4)
            @include('dash.jumlah')
            <div class="row">
              <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                @include('kepsek.surat')
              </div>
              <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                @include('dash.pelanggaran')
              </div>
            </div>
          @elseif(Auth::user()->levels_id < 7)
            @if($kls == NULL)
              @include('guru.jadwal')
            @else
              <div class="row">
                <div class="form-group col-7">
                  @include('guru.siswa')
                </div>
                <div class="form-group col-5">
                  @include('guru.jadwal')
                </div>
              </div>
            @endif
          @elseif(Auth::user()->levels_id == 7)
            @if(!empty($srt))
              @include('kepsek.surat')
            @endif
            @include('staff.plg')
          @elseif(Auth::user()->levels_id == 8)
            @include('dash.plgsis')
            
            @if($kls != NULL)
              @include('dash.jadsis')
            @endif
          @endif
    </div>
@endif

@include('dash.foot')
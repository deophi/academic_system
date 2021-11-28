@section('ksiswa')
	class="active"
@endsection

@section('dropdaf', 'active')
@section('dropsis', 'active')

@section('judul', 'Halaman Kelas')

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
      			<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Siswa Tanpa Kelas</h4>
                    <div class="card-header-action">
                      <div class="dropdown dropleft">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pilih Kelas</a>
                        <div class="dropdown-menu dropleft">
                          @foreach($kls as $r)
                            <a class="dropdown-item" href="{{ route('siswakelas', $r->id) }}">{{ $r->nama }}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if($siswa->isNotEmpty())
                        <div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">Silahkan masukkan siswa ini ke dalam kelasnya</div></div>
                      @endif
                      @if(Session::has('berhasil'))
                        <div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('berhasil') }}
                          </div>
                        </div>
                      @endif
                      <table class="table table-sm table-striped" text-align="center">
                        @if($siswa->isEmpty())
                          <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Semua siswa sudah memiliki kelas.</div></div>
                        @else
                          <tr>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th></th>
                          </tr>
                        @foreach($siswa as $r)
                          <tr>
                            <td>{{ $r->siswa->nis }}</td>
                            <td>{{ $r->siswa->nisn }}</td>
                            <td>{{ $r->name }}</td>
                            <td style="text-align: center;">
                              @if($r->jks == '1')
                                <div class="badge badge-success">Laki-Laki</div>
                              @else
                                <div class="badge badge-info">Perempuan</div>
                              @endif
                            </td>
                            <td>
                              @if($r->siswa->jurusans_id == 0)
                                <div class="badge badge-danger">Belum Memiliki Jurusan</div>
                              @else
                                <div class="badge badge-info">{{ $r->siswa->jurusans->nama }}</div>
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('tkelas', $r->id) }}" class="btn btn-primary btn-sm">Pilih Kelas</a>
                            </td>
                          </tr>
                        @endforeach
                        @endif
                      </table>
                      {{ $siswa->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endif

@include('dash.foot')
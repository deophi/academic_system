@section('jsiswa')
	class="active"
@endsection

@section('dropdaf', 'active')
@section('dropsis', 'active')

@section('judul', 'Halaman Jurusan')

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
                    <h4>Jurusan {{ $idjur->nama }}</h4>
                    <div class="card-header-action">
                      <div class="dropdown dropleft">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pilih Jurusan</a>
                        <div class="dropdown-menu dropleft">
                          <a href="{{ route('jsiswa') }}" class="dropdown-item">Tanpa Jurusan</a>
                          @foreach($jur as $r)
                            @if($r->id != 0)
                              <a class="dropdown-item" href="{{ route('siswajurusan', $r->id) }}">{{ $r->nama }}</a>
                            @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div class="alert alert-info alert-dismissible show fade">
                        <div class="alert-body">
                          Laki-Laki: {{ $co }}<br>
                          Perempuan: {{ $ce }}
                        </div>
                      </div>
                      <table class="table table-sm table-striped">
                        @if($jurusan->isEmpty())
                          <div class="alert alert-info alert-dismissible show fade" align="center">
                            <div class="alert-body">
                              Tidak ada siswa dalam jurusan ini.
                            </div>
                          </div>
                        @else
                          <tr>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th></th>
                          </tr>
                          @foreach($jurusan as $r)
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
                                <a href=" {{ route('tjurusan', $r->id) }}" class="btn btn-primary btn-icon btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endif

@include('dash.foot')
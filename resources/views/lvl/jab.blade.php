@section('lvl')
	class="active"
@endsection

@section('dropdaf', 'active')

@section('judul', 'Daftar Keanggotaan')

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
                    <h4>Ubah Status</h4>
                    <div class="card-header-form">
                      <div class="row">
                        <form action=" {{route('csrc')}} " method="get">
                          <div class="input-group">
                            <input type="text" class="form-control" name="cari" placeholder="Search">
                            <div class="input-group-btn">
                              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <a href="{{ route('status.create') }}" class="btn btn-sm btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Jabatan</a>
                      <br><br>
                      <table class="table table-sm table-striped">
                        @if(Session::has('berhasil'))
                          <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert"><span>&times;</span></button>
                              {{ Session('berhasil') }}
                            </div>
                          </div>
                        @endif
                        @if($user->isEmpty())
                          <div class="alert alert-danger alert-dismissible show fade" align="center"><div class="alert-body">Belum ada user terdaftar.</div></div>
                        @else
                          <tr>
                            <th>ID Pengenal</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th style="text-align: center;">Jabatan</th>
                            <th>Waktu Pembuatan</th>
                            <th></th>
                          </tr>
                          @foreach($user as $r)
                            <tr>
                              <td style="vertical-align: middle;">{{ $r->id }}</td>
                              <td style="vertical-align: middle;">{{ $r->name }}</td>
                              <td style="text-align: center; vertical-align: middle;">
                                @if($r->jks == '1')
                                  <div class="badge badge-success">Laki-Laki</div>
                                @else
                                  <div class="badge badge-info">Perempuan</div>
                                @endif
                              </td>
                              <td style="text-align: center; vertical-align: middle;">
                                @if($r->levels_id == "2")
                                  <div class="badge badge-danger">{{ $r->levels->nama }}</div>
                                @elseif($r->levels_id == "3")
                          	  	  <div class="badge badge-danger">{{ $r->levels->nama }}</div>
                                @else
                                  <div class="badge badge-warning">{{ $r->levels->nama }}</div>
                                @endif
                              </td>
                              <td style="vertical-align: middle;">{{ $r->created_at }}</td>
                              <td>
                                <a href=" {{ route('status.edit', $r->id) }}" class="btn btn-primary btn-icon btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </table>
                      {{ $user->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endif

@include('dash.foot')
@section('judul', 'Verifikasi Akun')

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
@elseif(Auth::user()->levels_id > 1)
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@else
  <div class="card card-primary">
    <div class="card-header">
      <h4>Data Akun</h4> <span class="badge badge-warning">Mendaftar sebagai 
      @if($istat == 1)
        Siswa
      @else
        Non-Siswa
      @endif
      </span>
    </div>

    <div class="card-body">
      <form method="post" action="{{ route('status.update', $user->id) }}">
        @csrf
        @method('patch')
        <div class="row">
          <div class="form-group col-md-4">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $user->name }}" disabled>
          </div>
          <div class="form-group col-md-4">
            <?php
            if($user->jks == 1){
              $j = 'Laki-Laki';
            }else{
              $j = 'Perempuan';
            }
            ?>
            <label>Jenis Kelamin</label>
            <input type="text" class="form-control" value="{{ $j }}" disabled>
          </div>
          <div class="form-group col-md-4">
            <label>No. HP</label>
            <input type="text" class="form-control" value="{{ $user->hp }}" disabled>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4 col-lg-3">
            <label>Level Akun</label>
            <select class="form-control select2 col-12" name="level">
              <option value="{{ $user->levels_id }}" >{{ $user->levels->nama }}</option>
              @foreach($lvl as $r)
                @if($r->id != $user->levels_id)
                  <option value="{{ $r->id }}">{{ $r->nama }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-8 col-lg-7">
            <label>Alamat</label>
            <input type="text" class="form-control" value="{{ $user->alamat }}" disabled>
          </div>
        </div>
        <small>Abaikan jika <a style="color: red;">Level Akun</a> tidak memerlukan jabatan.</small>
        <div class="row">
          <div class="form-group col-md-4">
            <label>Jabatan Kepegawaian</label>
            <select class="form-control select2" name="jabsel">
              @if($index == 1)
                <option value="{{ $pgs->pos_id }}">{{ $pgs->pos->nama }}</option>
                <option value="0">Lainnya</option>
                @foreach($pos as $r)
                  @if($r->id != $pgs->pos_id)
                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                  @endif
                @endforeach
              @else
                <option value="0">Lainnya</option>
                @foreach($pos as $r)
                  <option value="{{ $r->id }}">{{ $r->nama }}</option>
                @endforeach
              @endif
            </select>
            <small>Pilih <a style="color: red;">Lainnya</a> jika jabatan tidak tersedia.</small>
          </div>
          <div class="form-group col-md-4">
            <label>Jabatan Baru</label>
            <input type="text" name="jabin" class="form-control">
            <small>Diisi jika memilih <a style="color: red;">Lainnya</a> pada kolom <a style="color: red;">Jabatan Kepegawaian</a>.</small>
          </div>
        </div>
        <button class="btn btn-block btn-primary">Simpan Perubahan</button>        
      </form>
    </div>
  </div>
@endif

@include('dash.foot')
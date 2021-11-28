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
@elseif(Auth::user()->levels_id == 7)
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@elseif(Auth::user()->levels_id < 9)

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Jadwal Pelajaran Kelas {{ $kls->nama }}</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
    body{
      font-family:'Times New Roman';
    }
    .container{
      width:100%;
      height:auto;
    }
    table{
      border:0px solid;
      border-collapse:collapse;
      margin:0;
      width:100%;
    }
    td, tr, th{
      font-size: 14px;
      border:1px solid;
      padding-left: 5px;
      padding-right: 5px;
    }
    th{
      text-align: center;
      font-size: 14px;
    }
    .judul{
      text-align: center;
      font-size: 18px;
      font-style: bold;
      font-family:'Times New Roman';
    }
    .ket{
      font-size: 14px;
      font-family:'Times New Roman';
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="judul">
      SMA NEGERI 1 ANYER<br>
      Daftar Pelajaran Kelas {{ $kls->nama }}<br>
      {{ $kls->angkatans->tahun }}
    </div>
    <br>
    <div class="ket">
      Wali Kelas: {{ $kls->wali->name }}<br>
    </div>
    <br>

    @if($senin->isNotEmpty())
      <table class="table table-sm table-striped">
        <tr>
          <th rowspan="8" style="text-align: center; vertical-align: middle; width: 10%;">Senin</th>
          <th style="width: 35%;">Mata Pelajaran</th>
          <th style="width: 40%;">Guru</th>
          <th style="width: 15%;">Jam</th>
        </tr>
        <?php $i = 0 ?>
        @foreach($senin as $r)
        <?php $i++ ?>
        <tr>
          <td style="text-align: center;">{{ $r->mapels->nama }}</td>
          <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
          <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
        </tr>
        @endforeach
      </table>
    @endif
    @if($selasa->isNotEmpty())
      <table class="table table-sm table-striped">
        <tr>
          <th rowspan="8" style="text-align: center; vertical-align: middle; width: 10%;">Selasa</th>
          <th style="width: 35%;">Mata Pelajaran</th>
          <th style="width: 40%;">Guru</th>
          <th style="width: 15%;">Jam</th>
        </tr>
        @foreach($selasa as $r)
        <tr>
          <td style="text-align: center;">{{ $r->mapels->nama }}</td>
          <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
          <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
        </tr>
        @endforeach
      </table>
    @endif
    @if($rabu->isNotEmpty())
      <table class="table table-sm table-striped">
        <tr>
          <th rowspan="8" style="text-align: center; vertical-align: middle; width: 10%;">Rabu</th>
          <th style="width: 35%;">Mata Pelajaran</th>
          <th style="width: 40%;">Guru</th>
          <th style="width: 15%;">Jam</th>
        </tr>
        @foreach($rabu as $r)
        <tr>
          <td style="text-align: center;">{{ $r->mapels->nama }}</td>
          <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
          <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
        </tr>
        @endforeach
      </table>
    @endif
    @if($kamis->isNotEmpty())
      <table class="table table-sm table-striped">
        <tr>
          <th rowspan="8" style="text-align: center; vertical-align: middle; width: 10%;">Kamis</th>
          <th style="width: 35%;">Mata Pelajaran</th>
          <th style="width: 40%;">Guru</th>
          <th style="width: 15%;">Jam</th>
        </tr>
        @foreach($kamis as $r)
        <tr>
          <td style="text-align: center;">{{ $r->mapels->nama }}</td>
          <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
          <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
        </tr>
        @endforeach
      </table>
    @endif
    @if($jumat->isNotEmpty())
      <table class="table table-sm table-striped">
        <tr>
          <th rowspan="8" style="text-align: center; vertical-align: middle; width: 10%;">Jum'at</th>
          <th style="width: 35%;">Mata Pelajaran</th>
          <th style="width: 40%;">Guru</th>
          <th style="width: 15%;">Jam</th>
        </tr>
        @foreach($jumat as $r)
        <tr>
          <td style="text-align: center;">{{ $r->mapels->nama }}</td>
          <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
          <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
        </tr>
        @endforeach
      </table>
    @endif
    @if($sabtu->isNotEmpty())
      <table class="table table-sm table-striped">
        <tr>
          <th rowspan="8" style="text-align: center; vertical-align: middle; width: 10%;">Sabtu</th>
          <th style="width: 35%;">Mata Pelajaran</th>
          <th style="width: 40%;">Guru</th>
          <th style="width: 15%;">Jam</th>
        </tr>
        @foreach($sabtu as $r)
        <tr>
          <td style="text-align: center;">{{ $r->mapels->nama }}</td>
          <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
          <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
        </tr>
        @endforeach
      </table>
    @endif
  </div>
</body>
</html>

@else
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@endif
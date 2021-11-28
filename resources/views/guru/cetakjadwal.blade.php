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

  <title>Jadwal Mengajar {{ Auth::user()->name }}</title>

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
      Jadwal Mengajar
    </div>
    <br>
    <div class="ket">
      <table>
        <tr>
          <td style="border: none;" width="100px">NIP</td>
          <td style="border: none;">: {{ $pns->id }}</td>
        </tr>
        <tr>
          <td style="border: none;" width="100px">Nama Pendidik</td>
          <td style="border: none;">: {{ Auth::user()->name }}</td>
        </tr>
      </table>
    </div>
    <br>

    <table>
      <tr>
        <th>Kelas</th>
        <th>Hari</th>
        <th>Jam</th>
      </tr>
      @foreach($jadwal as $r)
     <tr>
       <td style="text-align: center;">{{ $r->kelas->nama }}</td>
       <td style="text-align: center;"><?php
        if ($r->hari == 1) {
          echo "Senin";
        }elseif ($r->hari == 2) {
          echo "Selasa";
        }elseif ($r->hari == 3) {
          echo "Rabu";
        }elseif ($r->hari == 4) {
          echo "Kamis";
        }elseif ($r->hari == 5) {
          echo "Jum'at";
        }else {
          echo "Sabtu";
        }
       ?></td>
       <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
     </tr>
     @endforeach
    </table>
  </div>
</body>
</html>

@else
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@endif
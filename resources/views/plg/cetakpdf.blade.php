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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Surat Izin Masuk / Keluar</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
    body{
      font-family:'Times New Roman';
    }
    .container{
      margin:0 auto;
      width:750px;
      height:auto;
    }

    table{
      border:0px solid;
      border-collapse:collapse;
      margin:0;
      width:375px;
    }
    td, tr, th{
      font-size: 12px;
      padding:8px;
      border:1px solid;
    }
    th{
      text-align: center;
      font-size: 14px;
    }
    .ttd{
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="container">
    <table>
      <tr><th>SURAT IZIN MASUK / KELUAR</th></tr>
      <tr><td>
        Nama Siswa : {{ $fls->users->name }}<br>
        @foreach($u as $i)
        Kelas : {{ $i->kelas->nama }}<br>
        @endforeach
        Masuk / Pulang Jam ke : {{ $fls->jam }}<br>
        Mata Pelajaran : {{ $fls->mapel }}<br>
        Alasan : {{ $fls->keterangan }}<br>
        <div class="ttd">
          Anyer, {{ $fls->created_at->translatedFormat('d F Y') }}<br>
          Guru Piket,<br><br><br>
          {{ $fls->piket->name }}<br>
          NIP. {{ $fls->piket_id }}
        </div>
      </td></tr>
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
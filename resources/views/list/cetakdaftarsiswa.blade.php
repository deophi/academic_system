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

  <title>Daftar Siswa Kelas {{ $kls->nama }}</title>

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
      Daftar Siswa Kelas {{ $kls->nama }}<br>
      {{ $kls->angkatans->tahun }}
    </div>
    <br>
    <div class="ket">
      Wali Kelas: {{ $kls->wali->name }}<br>
      Siswa Laki-Laki: {{ $co }}<br>
      Siswa Perempuan: {{ $ce }}<br>
    </div>
    <br>

    <table>
      <tr>
        <th style="width: 10%;">NIPD</th>
        <th style="width: 25%;">Nama</th>
        <th style="width: 10%;">Jenis Kelamin</th>
        <th style="width: 15%;">No. HP</th>
        <th style="width: 40%;">Alamat</th>
      </tr>
      @foreach($siswa as $kls)
        <tr>
          <td>{{ $kls->users->siswa->nis }}</td>
          <td>{{ $kls->users->name }}</td>
          <td>
            @if($kls->users->jks == 1)
              Laki-Laki
            @else
              Perempuan
            @endif
          </td>
          <td>{{ $kls->users->hp }}</td>
          <td>{{ $kls->users->alamat }}</td>
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
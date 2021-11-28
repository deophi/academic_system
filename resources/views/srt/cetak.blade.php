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

  <title>Surat Tugas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="{{ public_path('dom.css') }}">
</head>
<body>
  <div class="container">
    <div class="judul">
      <table width="100%" style="border-style: none;">
        <tr>
          <td width="15%" style="float: left;"><img src="{{ public_path('image/set/'.$bio->kop) }}" height="120px"></td>
          <td width="85%" style="text-align: center;">
            <a style="font-size: 20px;">
              PEMERINTAH PROVINSI BANTEN<br>
              DINAS PENDIDIKAN & KEBUDAYAAN<br>
              UNIT PELAKSANA TEKNIS<br>
              <b style="font-family: 'Arial Black';">SMA NEGERI 1 ANYER</b><br>
            </a>
            <i style="font-size: 10;">
              {{ $bio->alamat }}, <a> </a> Telp. 0254 - {{ $bio->telp }}, <a> </a> Fax. 0254 - {{ $bio->fax }}<br>
              Website: http://www.{{ $bio->web }} <a> </a> email: {{ $bio->mail }}
            </i>
          </td>
        </tr>
        <hr>
      </table>
    </div>
    <br>
    <div style="font-style: bold; text-align: center; font-size: 18px;">
      SURAT PERINTAH TUGAS<hr style="width: 35%; margin-bottom: 0px;">
    </div>
    <div style="text-align: center;">Nomor: {{ $srt->surats_id }}/{{ $srt->idkeluar }}/02-SMAN 1 Anyer/{{ $b }}/{{ Carbon\Carbon::parse($srt->waktu)->translatedFormat('Y') }}</div>
    <br><br>
    Kepala Sekolah Menengah Atas Negeri 1 Anyer, memberi tugas kepada :
    <br><br>
    <table style="margin-left: 30px;">
      <tr>
        <td width="150px">Nama</td>
        <td>: {{ $srt->users->name }}</td>
      </tr>
      <tr>
        <td>NIP</td>
        <td>: {{ $nip }}</td>
      </tr>
      <tr>
        <td>Pangkat, Golongan</td>
        <td>: {{ $gol }}</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        @if($jab->pos_id == NULL)
          <td>: -</td>
        @else
          <td>: {{ $jab->pos->nama }}</td>
        @endif
      </tr>
      <tr>
        <td>Untuk</td>
        <td>: {{ $srt->tujuan }}</td>
      </tr>
      <tr>
        <td>Hari / Tanggal</td>
        <?php
          $awal  = Carbon\Carbon::parse($srt->waktu)->translatedFormat('l, d F Y');
          $akhir = Carbon\Carbon::parse($srt->waktuend)->translatedFormat('l, d F Y')
        ?>
        <td>
          : {{ $awal }} 
          @if($awal != $akhir)
            s.d. {{ $akhir }}
          @endif
        </td>
      </tr>
      <tr>
        <td>Tempat</td>
        <td>: {{ $srt->tempat }}</td>
      </tr>
      <tr>
        <td>Pukul</td>
        <td>: {{ Carbon\Carbon::parse($srt->waktu)->translatedFormat('H.i') }} WIB s.d selesai</td>
      </tr>
    </table>
    <br>
    Demikian surat ini dibuat, setelah melaksanakan tugas, harap Saudara menyampaikan laporan secara tertulis.
    <br><br><br>
    <div style="float: right; text-align: left; margin-right: 50px;">
      Anyer, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
      Kepala,
      <br>
      <img src="{{ public_path('image/set/'.$bio->ttd) }}" height="100px">
      <br>
      <b>
        {{ $pgs->gd }} {{ $kep->users->name }}, {{ $pgs->gb }}<br>
        NIP. {{ $kep->id }}
      </b>
    </div>
    <div style="margin-top: 220px;">
      <table style="width: 30%">
        <tr>
          <td colspan="4">Telah Melaksanakan Tugas</td>
        </tr>
        <tr>
          <td width="75px">Hari</td>
          <td colspan="3">:</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td colspan="3">:</td>
        </tr>
        <tr>
          <td colspan="4">Kepala,<br><br><br><br></td>
        </tr>
        <tr>
          <td colspan="3"><hr></td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>

@else
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@endif
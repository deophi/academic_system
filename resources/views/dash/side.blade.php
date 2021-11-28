<?php
  $logo = App\Models\Settings::select('logo')->first();
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('index') }}" target="_blank">SMAN 1 ANYER</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('index') }}" target="_blank">
              <img alt="image" src="{{ asset('image/set/'.$logo->logo) }}" class="rounded-circle mr-1" height="30px">
            </a>
          </div>
          
          <ul class="sidebar-menu">
            @if(Auth::user()->levels_id == 1)
              <li class="menu-header">Menu Admin</li>
              <li @yield('dashboard')><a href="{{ route('akademik.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
              
              <li class="dropdown @yield('dropfoul')">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Pelanggaran</span></a>
                <ul class="dropdown-menu">
                  <li @yield('foul')><a class="nav-link" href="{{ route('pelanggaran.index') }}"><i class="fa fa-fire"></i><span>Daftar Pelanggaran</span></a></li>
                  <li @yield('jmlpoin')><a class="nav-link" href="{{ route('jmlpoin') }}"><i class="fa fa-fire"></i><span>Statistik</span></a></li>
                </ul>
              </li>

              <li @yield('srttgs')><a href="{{ route('surattugas.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Surat Tugas</span></a></li>

              <li class="dropdown @yield('dropdaf')">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Keanggotaan</span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown @yield('dropsis')">
                    <a href="#" class="nav-link has-dropdown"><i class="fa fa-columns"></i><span>Siswa</span></a>
                    <ul class="dropdown-menu">
                      <li @yield('ksiswa')><a href="{{ route('ksiswa') }}" class="nav-link"><i class="fa fa-fire"></i><span>Kelas</span></a></li>
                      <li @yield('jsiswa')><a href="{{ route('jsiswa') }}" class="nav-link"><i class="fa fa-fire"></i><span>Jurusan</span></a></li>
                    </ul>
                  </li>
              
                  <li class="dropdown @yield('dropguru')">
                    <a href="#" class="nav-link has-dropdown"><i class="fa fa-columns"></i><span>Guru</span></a>
                    <ul class="dropdown-menu">
                      <li @yield('guru')><a href="{{ route('pelajaran.index') }}" class="nav-link"><i class="fa fa-fire"></i><span>Mata Pelajaran</span></a></li>
                      <li @yield('gurupns')><a href="{{ route('gurupns') }}" class="nav-link"><i class="fa fa-fire"></i><span>Guru PNS</span></a></li>
                    </ul>
                  </li>
                  
                  <li @yield('pegawai')><a href="{{ route('pegawai.index') }}" class="nav-link"><i class="fa fa-fire"></i><span>Pegawai</span></a></li>
                  <li @yield('lvl')><a href="{{ route('status.index') }}" class="nav-link"><i class="fa fa-fire"></i><span>Seluruh Anggota</span></a></li>
                </ul>
              </li>

              <li @yield('mto')><a href="{{ route('materi.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Materi Online</span></a></li>
              <li @yield('news')><a href="{{ route('artikel.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Artikel</span></a></li>

              <li class="dropdown @yield('dropset')">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                  <li @yield('set')><a class="nav-link" href="{{ route('pengaturan.index') }}"><i class="fa fa-fire"></i><span>Sekolah</span></a></li>
                  <li @yield('prof')><a class="nav-link" href="{{ route('profilsekolah.index') }}"><i class="fa fa-fire"></i><span>Profil Sekolah</span></a></li>
                  <li @yield('act')><a class="nav-link" href="{{ route('kegiatan.index') }}"><i class="fa fa-fire"></i><span>Kegiatan Siswa</span></a></li>
                  <li @yield('jurkel')><a class="nav-link" href="{{ route('jurkel') }}"><i class="fa fa-fire"></i><span>Pendidikan</span></a></li>
                </ul>
              </li>
            @elseif(Auth::user()->levels_id == 4)
              <li class="menu-header">Menu Kepala Sekolah</li>
              <li @yield('dashboard')><a href="{{ route('akademik.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
              <li @yield('srttgs')><a href="{{ route('surattugas.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Surat Tugas</span></a></li>
              <li class="dropdown @yield('dropfoul')">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Pelanggaran</span></a>
                <ul class="dropdown-menu">
                  <li @yield('foul')><a href="{{ route('pelanggaran.index') }}" class="nav-link"><i class="fa fa-fire"></i><span>Daftar Pelanggaran</span></a></li>
                  <li @yield('jmlpoin')><a href="{{ route('jmlpoin') }}" class="nav-link"><i class="fa fa-fire"></i><span>Jumlah Poin</span></a></li>
                </ul>
              </li>
              <li @yield('mto')><a href="{{ route('materi.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Materi Online</span></a></li>
            @elseif(Auth::user()->levels_id > 4 && Auth::user()->levels_id < 8)
              <?php
                $set = App\Models\Settings::findorfail(1);
                $kls = App\Models\Kelas::where('wali_id', Auth::user()->id)->where('angkatans_id', $set->angkatans_id)->orderBy('angkatans_id', 'desc')->first();
              ?>
              <li class="menu-header">Menu Guru & Pegawai</li>
              <li @yield('dashboard')><a href="{{ route('akademik.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

              <li class="dropdown @yield('dropfoul')">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Pelanggaran</span></a>
                <ul class="dropdown-menu">
                  <li @yield('foul')><a class="nav-link" href="{{ route('pelanggaran.index') }}"><i class="fa fa-fire"></i><span>Daftar Pelanggaran</span></a></li>
                  <li @yield('jmlpoin')><a class="nav-link" href="{{ route('jmlpoin') }}"><i class="fa fa-fire"></i><span>Jumlah Poin</span></a></li>
                </ul>
              </li>

              <li @yield('srttgs')><a href="{{ route('surattugas.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Surat Tugas</span></a></li>
              @if(Auth::user()->levels_id == 6)
                <li @yield('dkls')><a href="{{ route('walind') }}" class="nav-link"><i class="fas fa-fire"></i><span>Kelas</span></a></li>
              @endif
              <li @yield('mto')><a href="{{ route('materi.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Materi Online</span></a></li>
            @else
              <li class="menu-header">Menu Siswa</li>
              <li @yield('dashboard')><a href="{{ route('akademik.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
              <li @yield('dkls')><a href="{{ route('listkelas.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Daftar Kelas</span></a></li>
              <li @yield('mto')><a href="{{ route('materi.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Materi Online</span></a></li>
            @endif
          </ul>
        </aside>
      </div>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('judul')</h1>
          </div>
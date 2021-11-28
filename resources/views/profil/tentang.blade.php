              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('image/profil/'.Auth::user()->gambar) }}" class="rounded-circle profile-widget-picture" height="100px" >
                    @if(Auth::user()->levels_id == 8)
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Jurusan</div>
                        @if($sis->jurusans_id == 0)
                          <div class="profile-widget-item-value">Belum Ada Jurusan</div>
                        @else
                          <div class="profile-widget-item-value">{{ $sis->jurusans->nama }}</div>
                        @endif
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Kelas</div>
                        @foreach($kls as $r)
                        <div class="profile-widget-item-value">{{ $r->kelas->nama }}</div>
                        @endforeach
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">
                      {{ Auth::user()->name }}
                      <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div>
                      @foreach($user as $r)
                        {{ $r->levels->nama }}
                      @endforeach
                    </div>
                  </div>
                  @if(Session::has('motto'))
                  <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert"><span>&times;</span></button>
                      {{ Session('motto') }}
                    </div>
                  </div>
                  @elseif(Session::has('gbr'))
                  <div class="alert alert-info alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert"><span>&times;</span></button>
                      {{ Session('gbr') }}
                    </div>
                  </div>
                  @endif
                  {{ Auth::user()->bio }}<br>
                  <div class="row">
                    <div class="form-group col-6">
                      <a href="{{ route('gbr') }}"><span><< Ganti Foto</span></a>
                    </div>
                    <div class="form-group col-6 text-right">
                      <a href="{{ route('motto') }}">
                        <span>
                          @if(Auth::user()->bio == NULL)
                            Tambah Motto >>
                          @else
                            Ubah Motto >>
                          @endif
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
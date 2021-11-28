@section('judul', 'Masuk')

@include('auth.loginhead')

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                @if(Session::has('berhasil'))
                  <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert"><span>&times;</span></button>
                      {{ Session('berhasil') }}
                    </div>
                  </div>
                @elseif(Session::has('gagal'))
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert"><span>&times;</span></button>
                      {{ Session('gagal') }}
                    </div>
                  </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label>Email / ID</label>
                    <input type="text" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Email / ID harus diisi
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="{{ route('password.request') }}" class="text-small">
                          Lupa Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Password harus diisi
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  Belum Memiliki Akun?<br>
                  <a href="{{ route('auth.show', 1) }}">Buat Akun Siswa</a><br>
                  <a href="{{ route('auth.show', 2) }}">Buat Akun Guru / Pegawai</a>
                </form>
              </div>
            </div>

            <!-- <div class="simple-footer">
              Copyright &copy; SMAN 1 Anyer 2020
            </div> -->
          </div>
        </div>
      </div>
    </section>
  </div>
@include('auth.loginfoot')
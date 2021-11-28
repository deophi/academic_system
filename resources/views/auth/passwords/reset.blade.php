@section('judul', 'Reset Password')
@include('auth.loginhead')

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate="">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" readonly>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label>Konfirmasi Password</label>
                      <input type="password" name="password_confirmation" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Simpan Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@include('auth.loginfoot')
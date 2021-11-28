@section('judul', 'Reset Password')
@include('auth.loginhead')

            <div class="card card-primary">
              <div class="card-header"><h4>Lupa Password</h4></div>
              <div class="card-body">
                @if(session('status'))
                  <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                  </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Kirim Link Pemulihan Password
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
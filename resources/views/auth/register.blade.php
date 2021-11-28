@include('auth.registerhead')
              <div class="card-body">
                <form action="{{ route('auth.store') }}" method="POST">
                  @csrf
                  @if($id == 1)
                    @include('auth.siswa')
                  @else
                    @include('auth.pg')
                  @endif

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
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
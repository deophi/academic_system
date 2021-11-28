				  <input type="hidden" name="nis" value="0">
				  <div class="row">
				  	<div class="form-group col-3">
				  	  <label>Gelar Depan</label>
				  	  <input type="text" name="gd" class="form-control" placeholder="Prof. Dr.">
				  	  <small style="color: red;">Diisi jika ada.</small>
				  	</div>
				  	<div class="form-group col-6">
				  	  <label>Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" required>
				  	</div>
				  	<div class="form-group col-3">
				  		<label>Gelar Belakang</label>
				  	  <input type="text" name="gb" class="form-control" placeholder="S.Kom., M.Pd.">
				  	  <small style="color: red;">Diisi jika ada.</small>
				  	</div>
				  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Email</label>
                      <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-6">
                      <label>No. HP</label>
                      <input type="text" name="hp" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="pass" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Konfirmasi Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="konfirm" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Tempat, Tanggal Lahir</label>
                      <div class="row">
                        <div class="form-group col-5">
                          <input type="text" name="tempat" class="form-control" placeholder="Serang" required>
                        </div>
                        <div class="form-group col-7">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control datepicker" name="lahir">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label>Jenis Kelamin</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="jks" value="1" class="selectgroup-input" checked>
                          <span class="selectgroup-button">Laki-Laki</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="jks" value="2" class="selectgroup-input">
                          <span class="selectgroup-button">Perempuan</span>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                     <label>Alamat</label>
                     <input type="text" name="alamat" class="form-control" placeholder="Jl. Raya Anyer-Sirih" required>
                  </div>
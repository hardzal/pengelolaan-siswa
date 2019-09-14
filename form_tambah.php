<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="info">
            <i class="fas fa-edit"></i> Input Data Siswa
        </div>

        <div class="card">
            <div class="card-body">
                <form action="proses_simpan.php" method="post" class="needs-validation" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="form-group col-md-12">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" name="nis" maxlength="5" onKeyPress="return goodchars(event, '0123456789', this)" autocomplete="off" id="nis" required />
                                <div class="invalid-feedback">NIS Tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off" id="nama" required />
                                <div class="invalid-feedback">Nama siswa tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="jenis_kelamin" class="mb-3">Jenis Kelamin</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="Laki-laki" id="jenis_kelamin_laki_laki" name="jenis_kelamin" required />
                                    <label class="custom-control-label" for="jenis_kelamin_laki_laki">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio mb-4">
                                    <input type="radio" name="jenis_kelamin" class="custom-control-input" id="jenis_kelamin_perempuan" value="Perempuan" required />
                                    <label for="jenis_kelamin_perempuan" class="custom-control-label">Perempuan</label>
                                </div>
                                <div class="invalid-feedback">Pilih salah satu jenis kelamin.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama" id="agama" autocomplete="off" required>
                                    <option value=""></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                                <div class="invalid-feedback">Agama tidak boleh kosong.</div>
                            </div>

                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" autocomplete="off" required />
                                <div class="invalid-feedback">
                                    Tempat lahir tidak kosong
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" id="tempat_lahir" required />
                                <div class="invalid-feedback">
                                    Tanggal lahir tidak boleh kosong.
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" rows="2" name="alamat" autocomplete="off" required></textarea>
                                <div class="invalid-feedback">
                                    Alamat tidak boleh kosong.
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" name="no_hp" maxlength="13" onKeyPress="return goodchars(event, '0123456789', this)" autocomplete="off" required />
                                <div class="invalid-feedback">No Hp tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label for="foto_siswa">Foto Siswa</label>
                                <input type="file" name="foto" class="form-control-file mb-3" id="foto_siswa" onchange="return validasiFile()" autocomplete="off" required />
                                <div id="imagepreview">
                                    <img src="foto/default.png" class="foto-preview" />
                                </div>
                                <div class="invalid-feedback">Foto siswa tidak boleh kosong.</div>
                            </div>
                        </div>
                    </div>

                    <div class="my-md-4 pt-md-1 border-top"></div>

                    <div class="form-group col-md-12 right">
                        <input type="submit" class="btn btn-info mr-2" name="simpan" value="SIMPAN" />
                        <a href="index.php" class="btn btn-secondary btn-reset">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];

    $query = mysqli_query($db, "SELECT * FROM siswa WHERE nis = '$nis'") or die("Query error : " . mysqli_error($db));

    $data = mysqli_fetch_assoc($query);

    $nis            = $data['nis'];
    $nama           = $data['nama'];
    $tempat_lahir   = $data['tempat_lahir'];
    $tanggal_lahir  = date('d-m-Y', strtotime($data['tanggal_lahir']));
    $jenis_kelamin  = $data['jenis_kelamin'];
    $agama          = $data['agama'];
    $alamat         = $data['alamat'];
    $no_hp          = $data['no_hp'];
    $foto           = $data['foto'];

    mysqli_close($db);
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-edit"></i> Ubah Data Siswa
        </div>

        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="col">
                            <div class="form-group col-md-12">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" name="nis" maxlength="5" onKeyPress="return goodchars(event, '0123456789', this)" autocomplete="off" value="<?= $nis; ?>" readonly required />
                            </div>

                            <div class="form-group col-md-12">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" autocomplete="off" value="<?= $nama; ?>" required />
                            </div>

                            <div class="form-group col-md-12">
                                <label class="mb-3" for="jenis_kelamin">Jenis Kelamin</label>
                                <?php
                                if ($jenis_kelamin == 'Laki - Laki') : ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="jenis_kelamin" value="Laki - Laki" class="custom-control-input" id="jenis_kelamin_laki_laki" checked required />
                                        <label class="custom-control-label" for="jenis_kelamin_laki_laki">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-4">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="custom-control-input" id="jenis_kelamin_perempuan" required />
                                        <label class="custom-control-label" for="jenis_kelamin_perempuan">Perempuan</label>
                                    </div>
                                <?php else : ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="jenis_kelamin" value="Laki - Laki" class="custom-control-input" id="jenis_kelamin_laki_laki" required />
                                        <label class="custom-control-label" for="jenis_kelamin_laki_laki">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-4">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="custom-control-input" id="jenis_kelamin_perempuan" checked required />
                                        <label class="custom-control-label" for="jenis_kelamin_perempuan">Perempuan</label>
                                    </div>
                                <?php endif; ?>
                                <div class="invalid-feedback">
                                    Pilih salah satu jenis kelamin.
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control" autocomplete="off" required>
                                    <option value="<?= $agama; ?>"><?= $agama; ?></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                                <div class="invalid-feedback">
                                    Agama tidak boleh kosong.
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" autocomplete="off" value="<?= $tempat_lahir; ?>" required />
                                <div class="invalid-feedback">
                                    Tempat lahir tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" value="<?= $tanggal_lahir; ?>" required />
                                <div class="invalid-feedback">
                                    Tanggal lahir tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" rows="2" name="alamat" autocomplete="off" required><?= $alamat; ?></textarea>
                                <div class="invalid-feedback">
                                    Alamat tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="no_hp">No Hp</label>
                                <input type="text" name="no_hp" class="form-control" maxlength="13" onKeyPress="return goodchars(event, '0123456789', this)" autocomplete="off" value="<?= $no_hp; ?>" required />
                                <div class="invalid-feedback">
                                    No. HP tidak boleh kosong.
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label for="foto">Foto Siswa</label>
                                <input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" value="<?= $foto; ?>" />
                                <div id="imagePreview"><img src="foto/<?= $foto; ?>" class="foto-preview" /></div>
                            </div>
                        </div>
                    </div>

                    <div class="my-md-4 pt-md-1 border-top"></div>

                    <div class="form-group col-md-12 right">
                        <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="SIMPAN" />
                        <a href="index.php" class="btn btn-secodary btn-reset">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
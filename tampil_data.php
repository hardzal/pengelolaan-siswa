<?php

if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
} else {
    $cari = "";
}
?>

<div class="row">
    <div class="col-md-12">
        <?php
        if (empty($_GET['alert'])) {
            echo "";
        } else if ($_GET['alert'] == 1) {
            ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Sukses</strong> Data siswa berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } else if ($_GET['alert'] == 2) {
            ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Sukses</strong> Data siswa berhasil diubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } else if ($_GET['alert'] == 3) {
            ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Sukses</strong> Data siswa berhasil dihapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } else if ($_GET['alert'] == 4) {
            ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Gagal</strong> NIS <b><?= $_GET['nis']; ?></b> sudah ada .
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <form class="mr-3" action="index.php" method="post">
            <div class="form-row">
                <div class="col-3">
                    <input type="text" class="form-control" name="cari" placeholder="cari nis  atau nama siswa" value="<?= $cari; ?>" />
                </div>
                <div class="col-8 mb-3">
                    <button type="submit" class="btn btn-info">Cari</button>
                </div>
                <div class="col mb-3">
                    <a class="btn btn-info" href="?page=tambah" role="button"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
        </form>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat, tanggal lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>No. Hp</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $batas = 5;
                if (isset($cari)) {
                    $query = mysqli_query($db, "SELECT count(nis) as jumlah FROM siswa where nis LIKE '%$cari%' OR nama LIKE '%$cari%'") or die("Ada kesalahan pada query jumlah: " . mysqli_error($db));
                } else {
                    $query = mysqli_query($db, "SELECT count(nis) as jumlah FROM siswa") or die("Ada kesalahan pada query jumlah: " . mysqli_error($db));
                }
                // paginasi
                $data_jumlah = mysqli_fetch_assoc($query);
                $jumlah      = $data_jumlah['jumlah'];
                $halaman     = ceil($jumlah / $batas);
                $page        = (isset($_GET['hal']) ? (int) $_GET['hal'] : 1);
                $mulai       = ($page - 1) * $batas;

                $no  = $mulai + 1;
                if (isset($cari)) {
                    $query = mysqli_query($db, "SELECT * FROM siswa WHERE nis LIKE '%$cari%' OR nama LIKE '%$cari%' ORDER BY nis DESC LIMIT $mulai, $batas") or die("Ada kesalahan pada query siswa: " . mysqli_error($db));
                } else {
                    $query = mysqli_query($db, "SELECT * FROM siswa ORDER BY nis DESC LIMIT $mulai, $batas");
                }

                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td width="30" class="center"><?= $no; ?></td>
                        <td width="45"><img class="foto-thumbnail" src="foto/<?= $row['foto']; ?>" alt="Foto siswa" /></td>
                        <td width="80" class="center"><?= $row['nis']; ?></td>
                        <td width="180"><?= $row['nama']; ?></td>
                        <td width="180"><?= $row['tempat_lahir']; ?></td>
                        <td width="120"><?= $row['jenis_kelamin']; ?></td>
                        <td width="100"><?= $row['agama']; ?></td>
                        <td width="180"><?= $row['alamat']; ?></td>
                        <td width="70" class="center"><?= $row['no_hp']; ?></td>
                        <td width="120">
                            <a title="Ubah" class="btn btn-outline-info" href="?page=ubah&nis=<?= $row['nis']; ?>"><i class="fas fa-edit"></i></a>
                            <a title="Hapus" href="proses_hapus.php?nis=<?= $row['nis']; ?>" onclick="return confirm('Anda yakin ingin menghapus siswa <?= $data['nama']; ?>?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>

        <?php

        if (empty($_GET['hal'])) {
            $halaman_aktif = 1;
        } else {
            $halaman_aktif = $_GET['hal'];
        }

        ?>
        <div class="row">
            <div class="col">
                <a>
                    Halaman <?= $halaman_aktif; ?> dari <?= $halaman; ?><br>
                    Total <?= $jumlah; ?> data
                </a>
            </div>
            <div class="col">
                <nav aria-label="page navigation example">
                    <ul class="pagination justify-content-end">
                        <?php
                        if ($halaman_aktif <= 1) { ?>
                            <li class="page-item disabled"><span class="page-link">Sebelumnya</span></li>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="?hal=<?= $page - 1 ?>">Sebelumnya</a></li>
                        <?php }

                        for ($i = 1; $i <= $halaman; $i++) :
                            ?>
                            <li class="page-item"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>

                        <?php
                        if ($halaman_aktif >= $halaman) : ?>
                            <li class="page-item disabled"><span class="page-link">Selanjutnya</span></li>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="?hal=<?= $page + 1; ?>">Selanjutnya</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
if ($_SESSION['level'] == 'pimpinan') {
?>
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Transaksi</a></li>
        <li class="active">Absensi Pegawai</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Absensi Pegawai</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">List Data Absensi</h4>
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Tanggal </th>
                                <th>NIP </th>
                                <th>Nama Pegawai </th>
                                <th>Hadir </th>
                                <th>Sakit</th>
                                <th>Ijin</th>
                                <th>Tanpa Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("config/database.php");
                            $halaman = "index.php?p=absen_pimpinan";
                            $action = "model/hapus_absen.php?";
                            $i = 0;
                            $sql = "SELECT * FROM `view_absen`";
                            $tampil = mysqli_query($conn, $sql);
                            while ($data = mysqli_fetch_array($tampil)) {
                                $i++;
                                $nip = $data['id'];
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $data['bulan'] . ' / ' . $data['tahun']; ?></td>
                                    <td><?php echo $data['nip']; ?></td>
                                    <td><?php echo $data['nama_pegawai']; ?></td>
                                    <td><?php echo $data['hadir']; ?></td>
                                    <td><?php echo $data['sakit']; ?></td>
                                    <td><?php echo $data['ijin']; ?></td>
                                    <td><?php echo $data['tanpa_keterangan']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
<?php
} else {
?>
    <script type="text/javascript">
        window.location.href = "../../halaman_error.php";
    </script>
<?php
}
?>
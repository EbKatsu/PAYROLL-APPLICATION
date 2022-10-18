<?php
    if ($_SESSION['level'] == 'bendahara') {
    ?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Transaksi</a></li>
    <li class="active">Gaji</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data Gaji</h1>

<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">List Data Gaji</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Periode Gaji</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Gaji Bresih</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("config/database.php");
                            $halaman = "index.php?p=data_gaji_bendahara";
                            $action = "model/hapus_penggajian.php?";
                            $i = 0;
                            $sql = "SELECT * FROM `view_gaji` ";
                            $tampil = mysqli_query($conn, $sql);
                            while ($data = mysqli_fetch_array($tampil)) {
                                $nip = $data['no_penggajian'];
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date("d-F-Y", strtotime($data['tanggal_penggajian'])); ?></td>
                                    <td><?php echo $data['bulan'] . ' / ' . $data['tahun']; ?></td>
                                    <td><?php echo $data['nip']; ?></td>
                                    <td><?php echo $data['nama_pegawai']; ?></td>
                                    <td align="right"><?php echo 'Rp. ' . number_format($data['gaji_bersih']); ?></td>


                                    <td>
                                        <a href='index.php?p=edit_penggajian_bendahara&&no_penggajian=<?php echo $data['no_penggajian']; ?>' class="btn btn-default btn-icon btn-sm" title='Edit'><i class="fa fa-expand"></i></a>
                                        <a data-nip="<?php echo $nip; ?>" data-halaman="<?php echo $halaman ?>" data-action="<?php echo $action ?>" class="btn btn-danger btn-icon btn-sm delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Periode Gaji</th>
                                <th>Total Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("config/database.php");
                            $halaman = "index.php?p=data_gaji";
                            $action = "model/hapus_penggajian.php?";
                            $i = 0;
                            $sql = "SELECT bulan, tahun, SUM(gaji_bersih) as gaji FROM `view_gaji` GROUP BY bulan, tahun";
                            $tampil = mysqli_query($conn, $sql);
                            while ($data = mysqli_fetch_array($tampil)) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $data['bulan'] . ' / ' . $data['tahun']; ?></td>
                                    <td align="right"><?php echo 'Rp. ' . number_format($data['gaji']); ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
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
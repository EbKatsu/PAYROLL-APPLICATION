<?php
if ($_SESSION['level'] == 'admin') {
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
        <div class="col-md-6">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">Input Absensi</h4>
                </div>
                <div class="panel-body panel-form">

                    <form class="form-horizontal form-bordered" data-parsley-validate="true" name="absen" action="./model/input_absen.php" method="POST">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">Bulan/Tahun </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="bulan">
                                            <?php
                                            $arr = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                            foreach ($arr as $key) {
                                                echo "<option value='$key'>$key";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="tahun" class="form-control">
                                            <?php
                                            for ($i = 2015; $i < 2021; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">NIP</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="nip" id="nipp" data-live-search="true" data-style="btn-white" class="form-control selectpicker">
                                    <option value="1">---- Pilih NIP ----</option>
                                    <?php
                                    include("config/database.php");
                                    $sql = mysqli_query($conn, "SELECT * FROM t_pegawai ORDER BY nama_pegawai ASC");
                                    if (mysqli_num_rows($sql) != 0) {
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            echo '<option value=' . $data['nip'] . '>' . $data['nip'] . ' ' . '[' . $data['nama_pegawai'] . ']' . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">Nama Pegawai</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" name="nama_pegawai" id="nama_pegawaii" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">Hadir</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" name="hadir" value="0" data-parsley-required="true" data-parsley-type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">Sakit</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" name="sakit" value="0" data-parsley-required="true" data-parsley-type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">Ijin</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" name="ijin" value="0" data-parsley-required="true" data-parsley-type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">Tanpa Keterangan</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" name="tanpa_keterangan" value="0" data-parsley-required="true" data-parsley-type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4"></label>
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button> <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>

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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $halaman = "index.php?p=absen";
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
                                    <td>
                                        <a href='index.php?p=edit_absen&&id=<?php echo $data['id']; ?>' class="btn btn-default btn-icon btn-sm" title='Edit'><i class="fa fa-expand"></i></i></a>
                                        <a data-nip="<?php echo $nip; ?>" data-halaman="<?php echo $halaman ?>" data-action="<?php echo $action ?>" class="delete btn btn-danger btn-icon btn-sm delete"><i class="fa fa-trash"></i></a>
                                        </a>
                                    </td>
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
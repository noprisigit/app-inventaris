        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $second_title ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                                <li class="breadcrumb-item active"><?= $second_title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">

                <?= $this->session->flashdata('message') ?>

                <!-- Default box -->
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Merk Barang</th>
                                    <th class="text-center">Jenis Barang</th>
                                    <th class="text-center">Kondisi Barang</th>
                                    <th class="text-center">Foto Barang</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($stok_hardware as $item) :
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $item['kode_barang'] ?></td>
                                    <td><?= $item['nama_barang'] ?></td>
                                    <td class="text-center"><?= $item['merk_barang'] ?></td>
                                    <td class="text-center"><?= $item['jenis_barang'] ?></td>
                                    <td class="text-center"><?= $item['kondisi_barang'] ?></td>
                                    <td class="text-center">
                                        <a href="#" class="pop-image">
                                            <img id="imgsource" src="<?= base_url('assets/dist/img/hardware/') . $item['foto_barang'] ?>" alt="" width="80">
                                        </a>
                                    </td>
                                    <?php if($item['tgl_pengembalian'] != null) : ?>
                                        <td class="text-center">
                                            <span class="badge badge-success">Barang Sudah Dikembalikan</span>
                                        </td>
                                    <?php else : ?>
                                        <td class="text-center">
                                            <button type="button" data-id="<?= $item['id_stok'] ?>" data-kode="<?= $item['kode_barang'] ?>" data-nama="<?= $item['nama_barang'] ?>" data-merk="<?= $item['merk_barang'] ?>" data-jenis="<?= $item['jenis_barang'] ?>" data-kondisi="<?= $item['kondisi_barang'] ?>" data-jenis="<?= $item['jenis_barang'] ?>" data-tgl="<?= $item['tgl_masuk'] ?>" data-gambar="<?= $item['foto_barang'] ?>" class="btn btn-sm btn-info btn-pengembalian"><i class="fas fa-edit"></i> Pengembalian</button>
                                            <!-- <a href="<?= base_url('hardware/delete-stok-hardware/' . $item['id_stok']) ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" data-toogle="tooltip" data-placement="top" title="Hapus" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash-alt"></i></a> -->
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php
                                    $no += 1;
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Jenis Hardware</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('hardware/tambah-jenis-hardware') ?>" method="post">
                            <div class="form-group">
                                <label for="nama-jenis-hardware">Nama Jenis Hardware</label>
                                <input type="text" class="form-control" name="nama_jenis_hardware" placeholder="ex : Keyboard, Mouse & etc" required>
                            </div>
                            <div class="form-group">
                                <label for="kode-jenis-hardware">Kode Jenis Hardware</label>
                                <input type="text" class="form-control" name="kode_jenis_hardware" placeholder="ex : KYBRD, MS & etc" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jenis Hardware</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('hardware/edit-jenis-hardware') ?>" method="post">
                            <input type="hidden" name="id_jenis_hardware" id="edit-id-jenis-hardware">
                            <div class="form-group">
                                <label for="nama-jenis-hardware">Nama Jenis Hardware</label>
                                <input type="text" class="form-control" id="edit-nama-jenis-hardware" name="nama_jenis_hardware" placeholder="ex : Keyboard, Mouse & etc" required>
                            </div>
                            <div class="form-group">
                                <label for="kode-jenis-hardware">Kode Jenis Hardware</label>
                                <input type="text" class="form-control" id="edit-kode-jenis-hardware" name="kode_jenis_hardware" placeholder="ex : KYBRD, MS & etc" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary pull-right">Perbaharui</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-pengembalian">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pengembalian Hardware</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid d-flex mx-auto" alt="foto-barang" id="pengembalian-gambar-barang" width="128">
                        <table class="table table-bordered mt-3">
                            <tr>
                                <td width="40%">Kode Barang</td>
                                <td id="pengembalian-kd-barang"></td>
                            </tr>
                            <tr>
                                <td width="40%">Nama Barang</td>
                                <td id="pengembalian-nama-barang"></td>
                            </tr>
                            <tr>
                                <td width="40%">Merk Barang</td>
                                <td id="pengembalian-merk-barang"></td>
                            </tr>
                            <tr>
                                <td width="40%">Jenis Barang</td>
                                <td id="pengembalian-jenis-barang"></td>
                            </tr>
                            <tr>
                                <td width="40%">Kondisi Barang</td>
                                <td id="pengembalian-kondisi-barang"></td>
                            </tr>
                            <tr>
                                <td width="40%">Tanggal Masuk</td>
                                <td id="pengembalian-tgl-barang"></td>
                            </tr>
                        </table>
                        <form action="<?= base_url('hardware/pengembalian-proses') ?>" id="form-pengembalian" method="post">
                            <input type="hidden" name="id_stok" id="id_stok">
                            <div class="card">
                                <div class="card-body">    
                                    <div class="form-group">
                                        <label for="">Tanggal Pengembalian</label>
                                        <input type="date" class="form-control" name="tgl_pengembalian" id="pengembalian-tgl-pengembalian" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary pull-right">Proses</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-preview">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="imagepreview" style="width: 400px;">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
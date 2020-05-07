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

                <?= $this->session->flashdata('message'); ?>

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('atk/input-stok-atk') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Tambah Stok ATK</a>
                        <a href="<?= base_url('cetak/cetak-pdf-atk') ?>" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Cetak PDF</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kode ATK</th>
                                    <th class="text-center">Nama ATK</th>
                                    <th class="text-center">Merk ATK</th>
                                    <th class="text-center">Jenis ATK</th>
                                    <th class="text-center">Stok ATK</th>
                                    <th class="text-center">Tanggal Masuk</th>
                                    <th class="text-center">Foto ATK</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($stok_atk as $item) :
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $item['kode_atk'] ?></td>
                                    <td><?= $item['nama_atk'] ?></td>
                                    <td class="text-center"><?= $item['merk_atk'] ?></td>
                                    <td class="text-center"><?= $item['jenis_atk'] ?></td>
                                    <td class="text-center"><?= $item['stok_atk'] ?> Buah</td>
                                    <!-- <?php if ($item['kondisi_barang'] == 'Baik') : ?>
                                        <td class="text-center text-success"><?= $item['kondisi_barang'] ?></td>
                                    <?php else : ?>
                                        <td class="text-center text-danger"><?= $item['kondisi_barang'] ?></td>
                                    <?php endif; ?> -->
                                    <?php $date = date_create($item['tgl_masuk']) ?>
                                    <td class="text-center"><?= date_format($date, 'd-m-Y') ?></td>
                                    <td class="text-center">
                                        <a href="#" class="pop-image">
                                            <img id="imgsource" src="<?= base_url('assets/dist/img/atk/') . $item['foto_atk'] ?>" alt="foto-stok" width="80">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('atk/edit-stok-atk/') . $item['id_stok']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('atk/delete-stok-atk/' . $item['id_stok']) ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" data-toogle="tooltip" data-placement="top" title="Hapus" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                    </td>
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
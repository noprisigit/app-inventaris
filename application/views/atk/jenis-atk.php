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
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">Tambah Jenis ATK</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Jenis ATK</th>
                                    <th class="text-center">Kode Jenis ATK</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($jenis_atk as $item) :
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $item['nama_jenis_atk'] ?></td>
                                    <td class="text-center"><?= $item['kode_jenis_atk'] ?></td>
                                    <td class="text-center">
                                        <span data-toggle="modal" data-target="#modal-edit">
                                            <button type="button" class="btn btn-sm btn-info btn-edit-jenis-hardware" data-toggle="tooltip" data-placement="top" title="Edit" data-id="<?= $item['id_jenis_atk'] ?>" data-nama="<?= $item['nama_jenis_atk'] ?>" data-kode="<?= $item['kode_jenis_atk'] ?>"><i class="fas fa-edit"></i></button>
                                        </span>
                                        <a href="<?= base_url('atk/delete-jenis-atk/' . $item['id_jenis_atk']) ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" data-toogle="tooltip" data-placement="top" title="Hapus" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
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

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Jenis ATK</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('atk/tambah-jenis-atk') ?>" method="post">
                            <div class="form-group">
                                <label for="nama-jenis-hardware">Nama Jenis ATK</label>
                                <input type="text" class="form-control" name="nama_jenis_atk" placeholder="ex : Pena, Kertas & etc" required>
                            </div>
                            <div class="form-group">
                                <label for="kode-jenis-hardware">Kode Jenis ATK</label>
                                <input type="text" class="form-control" name="kode_jenis_atk" placeholder="ex : PENA, KRTS & etc" required>
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
                        <h4 class="modal-title">Edit Jenis ATK</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('atk/edit-jenis-atk') ?>" method="post">
                            <input type="hidden" name="id_jenis_atk" id="edit-id-jenis-hardware">
                            <div class="form-group">
                                <label for="nama-jenis-hardware">Nama Jenis ATK</label>
                                <input type="text" class="form-control" id="edit-nama-jenis-hardware" name="nama_jenis_atk" placeholder="ex : Keyboard, Mouse & etc" required>
                            </div>
                            <div class="form-group">
                                <label for="kode-jenis-hardware">Kode Jenis ATK</label>
                                <input type="text" class="form-control" id="edit-kode-jenis-hardware" name="kode_jenis_atk" placeholder="ex : KYBRD, MS & etc" required>
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
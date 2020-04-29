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

                <!-- Default box -->
                <div class="card">
                    <?php echo form_open_multipart('atk/edit-stok-atk');?>
                        <div class="card-body">
                            <img src="<?= base_url('assets/dist/img/atk/') . $stok_atk['foto_atk'] ?>" alt="foto-atk" width="200px" class="mb-3 img-thumbnail img-fluid">
                            <input type="hidden" name="id_stok" value="<?= $stok_atk['id_stok']; ?>">
                            <div class="form-group">
                                <label for="jenis-barang">Jenis ATK</label>
                                <input type="text" class="form-control" name="jenis_atk" value="<?= $stok_atk['jenis_atk']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kode-barang">Kode ATK</label>
                                <input type="text" class="form-control" name="kode_atk" value="<?= $stok_atk['kode_atk']; ?>" readonly placeholder="ex. 31/..../...">
                            </div>
                            <div class="form-group">
                                <label for="nama-barang">Nama ATK</label>
                                <input type="text" class="form-control" name="nama_atk" value="<?= $stok_atk['nama_atk']; ?>" placeholder="ex. Keyboard Praktikan">
                                <?= form_error('nama_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="merk-barang">Merk ATK</label>
                                <input type="text" class="form-control" name="merk_atk" value="<?= $stok_atk['merk_atk']; ?>" placeholder="ex. Logitech, Razer">
                                <?= form_error('merk_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kondisi-barang">Stok ATK</label>
                                <input type="number" class="form-control" name="stok_atk" value="<?= $stok_atk['stok_atk'] ?>">
                                <?= form_error('stok_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="foto-barang">Foto ATK</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_atk" id="foto_atk">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <?= form_error('foto_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
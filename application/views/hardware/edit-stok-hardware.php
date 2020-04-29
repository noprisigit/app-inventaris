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
                    <?php echo form_open_multipart('hardware/edit-stok-hardware');?>
                        <div class="card-body">
                            <img src="<?= base_url('assets/dist/img/hardware/') . $stok_hardware['foto_barang'] ?>" alt="foto-barang" width="200px" class="mb-3 img-thumbnail img-fluid">
                            <input type="hidden" name="id_stok" value="<?= $stok_hardware['id_stok']; ?>">
                            <div class="form-group">
                                <label for="jenis-barang">Jenis Barang</label>
                                <input type="text" class="form-control" name="jenis_barang" value="<?= $stok_hardware['jenis_barang']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kode-barang">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" value="<?= $stok_hardware['kode_barang']; ?>" readonly placeholder="ex. 31/..../...">
                                <?= form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama-barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="<?= $stok_hardware['nama_barang']; ?>" placeholder="ex. Keyboard Praktikan">
                                <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="merk-barang">Merk Barang</label>
                                <input type="text" class="form-control" name="merk_barang" value="<?= $stok_hardware['merk_barang']; ?>" placeholder="ex. Logitech, Razer">
                                <?= form_error('merk_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kondisi-barang">Kondisi Barang</label>
                                <select name="kondisi_barang" class="form-control">
                                    <?php if ($stok_hardware['kondisi_barang'] == 'Baik') :  ?>
                                        <option value="Baik" selected>Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    <?php else : ?>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak" selected>Rusak</option>
                                    <?php endif; ?>
                                </select>
                                <?= form_error('kondisi_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="foto-barang">Foto Barang</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_barang" id="foto_barang">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <?= form_error('foto_barang', '<small class="text-danger">', '</small>'); ?>
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
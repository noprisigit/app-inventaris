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
                    <?php echo form_open_multipart('atk/input-stok-atk');?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis-barang">Jenis ATK</label>
                                <select name="jenis_atk" class="form-control">
                                    <option selected disabled>Pilih Jenis ATK</option>
                                    <?php foreach($jenis_atk as $item) : ?>
                                        <option value="<?= $item['nama_jenis_atk'] ?>"><?= $item['nama_jenis_atk'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('jenis_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kode-barang">Kode ATK</label>
                                <input type="text" class="form-control" name="kode_atk" placeholder="ex. 31/..../...">
                                <?= form_error('kode_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama-barang">Nama ATK</label>
                                <input type="text" class="form-control" name="nama_atk" placeholder="ex. Kertas A4">
                                <?= form_error('nama_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="merk-barang">Merk ATK</label>
                                <input type="text" class="form-control" name="merk_atk" placeholder="ex. Kenko, etc">
                                <?= form_error('merk_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="merk-barang">Stok ATK</label>
                                <input type="number" class="form-control" name="stok_atk" placeholder="ex. 8 Buah">
                                <?= form_error('stok_atk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="foto-barang">Foto Barang</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_atk">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
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
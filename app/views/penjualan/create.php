  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Penjualan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/penjualan/simpanpenjualan" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Jumlah Penjualan</label>
                    <input type="text" class="form-control" placeholder="masukkan jumlah penjualan..." name="jumlah">
                  </div>
                  <div class="form-group">
                    <label >Harga Jual</label>
                    <input type="numeric" class="form-control" placeholder="masukkan harga jual barang..." name="harga">
                  </div>
                <!-- /.card-body -->
                <div class="form-group">
                    <label >Barang</label>
                    <select class="form-control" name="barang">
                        <option value="">Pilih</option>
                         <?php foreach ($data['barang'] as $row) :?>
                        <option value="<?= $row['idbarang']; ?>"><?= $row['NamaBarang']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Pelanggan</label>
                    <select class="form-control" name="pelanggan">
                        <option value="">Pilih</option>
                         <?php foreach ($data['pelanggan'] as $row) :?>
                        <option value="<?= $row['IdPelanggan']; ?>"><?= $row['namaPelanggan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
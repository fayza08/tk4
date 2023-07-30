  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pelanggan</h1>
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
              <form role="form" action="<?= base_url; ?>/pelanggan/simpanpelanggan" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Pelanggan</label>
                    <input type="text" class="form-control" placeholder="masukkan nama pelanggan..." name="nama">
                  </div>
                  <div class="form-group">
                    <label >No Telp Pelanggan</label>
                    <input type="numeric" class="form-control" placeholder="masukkan no telp pelanggan..." name="telp">
                  </div>
                  <div class="form-group">
                    <label >Alamat</label>
                    <input type="text" class="form-control" placeholder="masukkan alamat pelanggan..." name="alamat">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
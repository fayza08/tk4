  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Utama</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hello</h3>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-counter primary">
              <i class="fa fa-code-fork"></i>

              <?php foreach ($data['penjualan'] as $row) :?>
                <span class="count-numbers"><?= $penjualan = $row['total_penjualan']?></span>                      
              <?php  endforeach; ?>

              <span class="count-name">Pemasukkan</span>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card-counter danger">
              <i class="fa fa-ticket"></i>
                <?php foreach ($data['pembelian'] as $row) :?>
                  <span class="count-numbers"><?= $pembelian = $row['total_pembelian']?></span>                      
                <?php  endforeach; ?>
              <span class="count-name">Pengeluaran</span>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card-counter success">
              <i class="fa fa-database"></i>
              <span class="count-numbers"><?= $penjualan - $pembelian?></span>
              <span class="count-name">Laba/Rugi</span>
            </div>
          </div>
        </div>
      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


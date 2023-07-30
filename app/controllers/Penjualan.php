<?php

class Penjualan extends Controller {
	
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	}
	
	public function index()
	{
		$data['title'] = 'Data Penjualan';
		$data['penjualan'] = $this->model('PenjualanModel')->getAllPenjualan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Penjualan';
		$data['penjualan'] = $this->model('PenjualanModel')->getAllPenjualan();
		$this->view('penjualan/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['penjualan'] = $this->model('PenjualanModel')->getAllPenjualan();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN PELANGGAN',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(85,6,'JUMLAH PEMBELIAN',1);
			$pdf->Cell(30,6,'HARGA BELI',1);
			$pdf->Cell(30,6,'BARANG',1);
			$pdf->Cell(15,6,'SUPPLIER',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['penjualan'] as $row) {
			    $pdf->Cell(85,6,$row['JumlahPenjualan'],1);
			    $pdf->Cell(30,6,$row['hargaBeli'],1);
			    $pdf->Cell(30,6,$row['namaBarang'],1);
			    $pdf->Cell(15,6,$row['namaSupplier'],1); 
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Penjualan.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Penjualan';
		$data['penjualan'] = $this->model('PenjualanModel')->cariPenjualan();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/index', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Penjualan';		
		$data['barang'] = $this->model('BarangModel')->getAllBarang();	
		$data['pelanggan'] = $this->model('PelangganModel')->getAllPelanggan();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPenjualan(){		

		if( $this->model('PenjualanModel')->tambahPenjualan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/penjualan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/penjualan');
			exit;	
		}
	}

}
<?php

class Pembelian extends Controller {
	
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
		$data['title'] = 'Data Pembelian';
		$data['pembelian'] = $this->model('PembelianModel')->getAllPembelian();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pembelian/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Pembelian';
		$data['pembelian'] = $this->model('PembelianModel')->getAllPembelian();
		$this->view('pembelian/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['pembelian'] = $this->model('PembelianModel')->getAllPembelian();

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
			 
			foreach($data['pembelian'] as $row) {
			    $pdf->Cell(85,6,$row['JumlahPembelian'],1);
			    $pdf->Cell(30,6,$row['hargaBeli'],1);
			    $pdf->Cell(30,6,$row['namaBarang'],1);
			    $pdf->Cell(15,6,$row['namaSupplier'],1); 
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Pembelian.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Pembelian';
		$data['pembelian'] = $this->model('PembelianModel')->cariPembelian();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pembelian/index', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Pembelian';		
		$data['barang'] = $this->model('BarangModel')->getAllBarang();	
		$data['supplier'] = $this->model('SupplierModel')->getAllSupplier();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pembelian/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPembelian(){		

		if( $this->model('PembelianModel')->tambahPembelian($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pembelian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pembelian');
			exit;	
		}
	}

}
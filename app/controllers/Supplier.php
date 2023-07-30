<?php

class Supplier extends Controller {
	
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
		$data['title'] = 'Data Supplier';
		$data['supplier'] = $this->model('SupplierModel')->getAllSupplier();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('supplier/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Supplier';
		$data['supplier'] = $this->model('SupplierModel')->getAllSupplier();
		$this->view('supplier/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['supplier'] = $this->model('SupplierModel')->getAllSupplier();

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
			$pdf->Cell(85,6,'NAMA',1);
			$pdf->Cell(30,6,'TELEPON',1);
			$pdf->Cell(30,6,'ALAMAT',1);
			$pdf->Cell(15,6,'STATUS',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['supplier'] as $row) {
			    $pdf->Cell(85,6,$row['namaSupplier'],1);
			    $pdf->Cell(30,6,$row['telpSupplier'],1);
			    $pdf->Cell(30,6,$row['alamat'],1);
			    $pdf->Cell(15,6,$row['status'],1); 
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Supplier.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Supplier';
		$data['supplier'] = $this->model('SupplierModel')->cariSupplier();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('supplier/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Supplier';
		// $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['supplier'] = $this->model('SupplierModel')->getSupplierById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('supplier/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Supplier';		
		// $data['kategori'] = $this->model('KategoriModel')->getAllKategori();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('supplier/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSupplier(){		

		if( $this->model('SupplierModel')->tambahSupplier($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/supplier');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/supplier');
			exit;	
		}
	}

	public function updateSupplier(){	
		if( $this->model('SupplierModel')->updateDataSupplier($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/supplier');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/supplier');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SupplierModel')->deleteSupplier($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/supplier');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/supplier');
			exit;	
		}
	}
}
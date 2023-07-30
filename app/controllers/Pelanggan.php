<?php

class Pelanggan extends Controller {
	
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
		$data['title'] = 'Data Pelanggan';
		$data['pelanggan'] = $this->model('PelangganModel')->getAllPelanggan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pelanggan/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Pelanggan';
		$data['pelanggan'] = $this->model('PelangganModel')->getAllPelanggan();
		$this->view('pelanggan/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['pelanggan'] = $this->model('PelangganModel')->getAllPelanggan();

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
			 
			foreach($data['pelanggan'] as $row) {
			    $pdf->Cell(85,6,$row['namaPelanggan'],1);
			    $pdf->Cell(30,6,$row['telpPelanggan'],1);
			    $pdf->Cell(30,6,$row['alamat'],1);
			    $pdf->Cell(15,6,$row['status'],1); 
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Pelanggan.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Pelanggan';
		$data['pelanggan'] = $this->model('PelangganModel')->cariPelanggan();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pelanggan/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Pelanggan';
		// $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['pelanggan'] = $this->model('PelangganModel')->getPelangganById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pelanggan/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Pelanggan';		
		// $data['kategori'] = $this->model('KategoriModel')->getAllKategori();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pelanggan/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPelanggan(){		

		if( $this->model('PelangganModel')->tambahPelanggan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pelanggan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pelanggan');
			exit;	
		}
	}

	public function updatePelanggan(){	
		if( $this->model('PelangganModel')->updateDataPelanggan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/pelanggan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/pelanggan');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('PelangganModel')->deletePelanggan($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/pelanggan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/pelanggan');
			exit;	
		}
	}
}
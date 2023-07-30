<?php

class PenjualanModel {
	
	private $table = 'penjualan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPenjualan()
	{
		$this->db->query("SELECT penjualan.*, barang.namaBarang, pelanggan.namaPelanggan FROM " . $this->table . " JOIN barang ON barang.IdBarang = penjualan.IdBarang JOIN pelanggan ON pelanggan.IdPelanggan = penjualan.IdPelanggan");
		return $this->db->resultSet();
	}

	// public function getPenjualanById($id)
	// {
	// 	$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPenjualan=:id');
	// 	$this->db->bind('id',$id);
	// 	return $this->db->single();
	// }

	public function tambahPenjualan($data)
	{
		$query = "INSERT INTO penjualan (jumlahPenjualan, HargaJual, IdPelanggan, IdBarang) VALUES(:jumlah, :harga, :pelanggan, :barang)";
		$this->db->query($query);
		$this->db->bind('jumlah', $data['jumlah']);
		$this->db->bind('harga', $data['harga']);
		$this->db->bind('pelanggan', $data['pelanggan']);
		$this->db->bind('barang', $data['barang']);
		$this->db->execute();

		
		$query = "UPDATE barang SET stok=stok-:stok WHERE idbarang=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['barang']);
		$this->db->bind('stok',$data['jumlah']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	// public function cariPenjualan()
	// {
	// 	$key = $_POST['key'];
		
	// 	// $this->db->query("SELECT buku.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = buku.kategori_id WHERE judul LIKE :key");
	// 	$this->db->query("SELECT * FROM " . $this->table . " WHERE namaPenjualan LIKE :key");
	// 	$this->db->bind('key',"%$key%");
	// 	return $this->db->resultSet();
	// }
}
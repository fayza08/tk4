<?php

class PembelianModel {
	
	private $table = 'pembelian';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPembelian()
	{
		$this->db->query("SELECT pembelian.*, barang.namaBarang, supplier.namaSupplier FROM " . $this->table . " JOIN barang ON barang.IdBarang = pembelian.IdBarang JOIN supplier ON supplier.IdSupplier = pembelian.IdSupplier");
		return $this->db->resultSet();
	}

	// public function getPembelianById($id)
	// {
	// 	$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPembelian=:id');
	// 	$this->db->bind('id',$id);
	// 	return $this->db->single();
	// }

	public function tambahPembelian($data)
	{
		$query = "INSERT INTO pembelian (jumlahPembelian, HargaBeli, IdSupplier, IdBarang) VALUES(:jumlah, :harga, :supplier, :barang)";
		$this->db->query($query);
		$this->db->bind('jumlah', $data['jumlah']);
		$this->db->bind('harga', $data['harga']);
		$this->db->bind('supplier', $data['supplier']);
		$this->db->bind('barang', $data['barang']);
		$this->db->execute();

		
		$query = "UPDATE barang SET stok=stok+:stok WHERE idbarang=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['barang']);
		$this->db->bind('stok',$data['jumlah']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	// public function cariPembelian()
	// {
	// 	$key = $_POST['key'];
		
	// 	// $this->db->query("SELECT buku.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = buku.kategori_id WHERE judul LIKE :key");
	// 	$this->db->query("SELECT * FROM " . $this->table . " WHERE namaPembelian LIKE :key");
	// 	$this->db->bind('key',"%$key%");
	// 	return $this->db->resultSet();
	// }
}
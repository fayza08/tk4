<?php

class PelangganModel {
	
	private $table = 'pelanggan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPelanggan()
	{
		$this->db->query("SELECT * from pelanggan");
		return $this->db->resultSet();

		// CONTOH JOIN
		// $this->db->query("SELECT buku.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = buku.kategori_id");
		// return $this->db->resultSet();
	}

	public function getPelangganById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPelanggan=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahPelanggan($data)
	{
		$query = "INSERT INTO pelanggan (namaPelanggan, telpPelanggan, alamat, status) VALUES(:nama_pelanggan, :telp_pelanggan, :alamat, :status)";
		$this->db->query($query);
		$this->db->bind('nama_pelanggan', $data['nama']);
		$this->db->bind('telp_pelanggan', $data['telp']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('status', "ACTIVE");
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPelanggan($data)
	{
		$query = "UPDATE pelanggan SET namaPelanggan=:nama_pelanggan, telpPelanggan=:telp_pelanggan, alamat=:alamat WHERE idpelanggan=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('nama_pelanggan', $data['nama']);
		$this->db->bind('telp_pelanggan', $data['telp']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePelanggan($id)
	{
		$this->db->query('UPDATE pelanggan SET status=:status WHERE idpelanggan=:id');
		$this->db->bind('id',$id);
		$this->db->bind('status',"INACTIVE");
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariPelanggan()
	{
		$key = $_POST['key'];
		
		// $this->db->query("SELECT buku.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = buku.kategori_id WHERE judul LIKE :key");
		$this->db->query("SELECT * FROM " . $this->table . " WHERE namaPelanggan LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
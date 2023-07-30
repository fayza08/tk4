<?php

class BarangModel {
	
	private $table = 'barang';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllBarang()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getBarangById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE idbarang=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahBarang($data)
	{
		$query = "INSERT INTO barang (NamaBarang, Keterangan, stok, Satuan, iduser, status) VALUES(:NamaBarang, :Keterangan, :stok, :Satuan, :iduser, :status)";
		$this->db->query($query);
		$this->db->bind('NamaBarang',$data['NamaBarang']);
		$this->db->bind('Keterangan',$data['Keterangan']);
		$this->db->bind('stok',0);
		$this->db->bind('Satuan',$data['Satuan']);
		$this->db->bind('iduser', 1);
		$this->db->bind('status',"ACTIVE");
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataBarang($data)
	{
		$query = "UPDATE barang SET NamaBarang=:nama_barang, Keterangan=:keterangan, Satuan=:satuan, iduser=:iduser, status=:status WHERE idbarang=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('nama_barang',$data['NamaBarang']);
		$this->db->bind('keterangan',$data['Keterangan']);
		$this->db->bind('satuan',$data['Satuan']);
		$this->db->bind('iduser', 1);
		$this->db->bind('status',"ACTIVE");
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteBarang($id)
	{
		$this->db->query('UPDATE barang SET status=:status WHERE idbarang=:id');
		$this->db->bind('id',$id);
		$this->db->bind('status',"INACTIVE");
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariBarang()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE NamaBarang LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
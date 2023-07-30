<?php

class SupplierModel {
	
	private $table = 'supplier';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSupplier()
	{
		$this->db->query("SELECT * from supplier");
		return $this->db->resultSet();
	}

	public function getSupplierById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdSupplier=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahSupplier($data)
	{
		$query = "INSERT INTO supplier (namaSupplier, noHpSupplier, alamat, status) VALUES(:nama_supplier, :telp_supplier, :alamat, :status)";
		$this->db->query($query);
		$this->db->bind('nama_supplier', $data['nama']);
		$this->db->bind('telp_supplier', $data['telp']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('status', "ACTIVE");
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataSupplier($data)
	{
		$query = "UPDATE supplier SET namaSupplier=:nama_supplier, noHpSupplier=:telp_supplier, alamat=:alamat WHERE IdSupplier=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('nama_supplier', $data['nama']);
		$this->db->bind('telp_supplier', $data['telp']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteSupplier($id)
	{
		$this->db->query('UPDATE supplier SET status=:status WHERE idsupplier=:id');
		$this->db->bind('id',$id);
		$this->db->bind('status',"INACTIVE");
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSupplier()
	{
		$key = $_POST['key'];
		
		$this->db->query("SELECT * FROM " . $this->table . " WHERE namaSupplier LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
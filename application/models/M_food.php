<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_food extends CI_Model{
 
	function deleteData($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	public function inputData($table, $data)
	{
		 return $this->db->insert($table, $data);
	}

	public function viewDataMakanan()
	{
		return $this->db->query("select * from pesanan where status = 'makanan';
		");
    }

	public function viewDataMinuman()
	{
		return $this->db->query("select * from pesanan where status = 'minuman';
		");
    }

	public function viewDataMeja()
	{
		return $this->db->get('meja');
	}
	
	public function viewDataTransaksi()
	{
		return $this->db->get('transaksi');
    }
    public function viewDataBuku()
	{

		return $this->db->query('select DISTINCT id_buku, isbn, judul_buku, pengarang, penerbit, id_kategori, nama_kategori from buku join kategori on kategori_id= id_kategori ORDER BY id_buku ASC');
	}

	public function editData($where, $table)
	{
		return $this->db->get_where($table. $where);
	}

	public function updateData($where, $data, $table)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function countPesanan()
	{
		$this->db->query("select count(no_transaksi) from transaksi where no_transaksi='2112190001'");		
	}
}
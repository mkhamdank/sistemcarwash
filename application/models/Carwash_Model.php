<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carwash_Model extends CI_Model {

	public function getTransaksi()
	{
		$this->db->select('transaksi.id_transaksi as id_transaksi, transaksi.nama_pelanggan as nama_pelanggan, transaksi.fk_mobil as fk_mobil, DATE_FORMAT(transaksi.tanggal,"%d-%m-%Y") as tanggal, transaksi.no_antrian as no_antrian, mobil.id_mobil as id_mobil, mobil.nama_mobil as nama_mobil, mobil.fk_jenis as fk_jenis, jenis.id_jenis as id_jenis, jenis.jenis_mobil as jenis_mobil, jenis.harga as harga');
		$this->db->join('mobil', 'mobil.id_mobil = transaksi.fk_mobil', 'join');
		$this->db->join('jenis', 'jenis.id_jenis = mobil.fk_jenis', 'join');
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get('transaksi');
		return $query->result();
	}

	public function getTransaksiById($id_transaksi)
	{
		$this->db->select('transaksi.id_transaksi as id_transaksi, transaksi.nama_pelanggan as nama_pelanggan, transaksi.fk_mobil as fk_mobil, transaksi.tanggal as tanggal, transaksi.no_antrian as no_antrian, mobil.id_mobil as id_mobil, mobil.nama_mobil as nama_mobil, mobil.fk_jenis as fk_jenis, jenis.id_jenis as id_jenis, jenis.jenis_mobil as jenis_mobil, jenis.harga as harga');
		$this->db->join('mobil', 'mobil.id_mobil = transaksi.fk_mobil', 'join');
		$this->db->join('jenis', 'jenis.id_jenis = mobil.fk_jenis', 'join');
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get('transaksi');
		return $query->result();
	}

	public function getTransaksiByMobil($fk_mobil)
	{
		$this->db->select('transaksi.id_transaksi as id_transaksi, transaksi.nama_pelanggan as nama_pelanggan, transaksi.fk_mobil as fk_mobil, DATE_FORMAT(transaksi.tanggal,"%d-%m-%Y") as tanggal, transaksi.no_antrian as no_antrian, mobil.id_mobil as id_mobil, mobil.nama_mobil as nama_mobil, mobil.fk_jenis as fk_jenis, jenis.id_jenis as id_jenis, jenis.jenis_mobil as jenis_mobil, jenis.harga as harga');
		$this->db->join('mobil', 'mobil.id_mobil = transaksi.fk_mobil', 'join');
		$this->db->join('jenis', 'jenis.id_jenis = mobil.fk_jenis', 'join');
		$this->db->where('fk_mobil', $fk_mobil);
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get('transaksi');
		return $query->result();
	}

	public function createTransaksi()
	{
		$object = array('id_transaksi' => $this->input->post('id_transaksi'),
		'nama_pelanggan' => $this->input->post('nama_pelanggan'),
		'fk_mobil' => $this->input->post('fk_mobil'),
		'tanggal' => $this->input->post('tanggal'),
		'no_antrian' => $this->input->post('no_antrian'));
		$this->db->insert('transaksi', $object);
	}

	public function editTransaksi($id_transaksi)
	{
		$object = array('id_transaksi' => $this->input->post('id_transaksi'),
		'nama_pelanggan' => $this->input->post('nama_pelanggan'),
		'fk_mobil' => $this->input->post('fk_mobil'),
		'tanggal' => $this->input->post('tanggal'),
		'no_antrian' => $this->input->post('no_antrian'));
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $object);
	}

	public function deleteTransaksi($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('transaksi');
	}

	public function getMobil()
	{
		$this->db->select('mobil.id_mobil as id_mobil, mobil.nama_mobil as nama_mobil, mobil.fk_jenis as fk_jenis, jenis.id_jenis as id_jenis, jenis.jenis_mobil as jenis_mobil, jenis.harga as harga');
		$this->db->join('jenis', 'jenis.id_jenis = mobil.fk_jenis', 'join');
		$query = $this->db->get('mobil');
		return $query->result();
	}

	public function getMobilById($id_mobil)
	{
		$this->db->select('mobil.id_mobil as id_mobil, mobil.nama_mobil as nama_mobil, mobil.fk_jenis as fk_jenis, jenis.id_jenis as id_jenis, jenis.jenis_mobil as jenis_mobil, jenis.harga as harga');
		$this->db->join('jenis', 'jenis.id_jenis = mobil.fk_jenis', 'join');
		$this->db->where('id_mobil', $id_mobil);
		$query = $this->db->get('mobil');
		return $query->result();
	}

	public function createMobil()
	{
		$object = array('id_mobil' => $this->input->post('id_mobil'),
		'nama_mobil' => $this->input->post('nama_mobil'),
		'fk_jenis' => $this->input->post('fk_jenis'));
		$this->db->insert('mobil', $object);
	}

	public function editMobil($id_mobil)
	{
		$object = array('id_mobil' => $this->input->post('id_mobil'),
		'nama_mobil' => $this->input->post('nama_mobil'),
		'fk_jenis' => $this->input->post('fk_jenis'));
		$this->db->where('id_mobil', $id_mobil);
		$this->db->update('mobil', $object);
	}

	public function deleteMobil($id_mobil)
	{
		$this->db->where('id_mobil', $id_mobil);
		$this->db->delete('mobil');
	}

	public function getJenis()
	{
		$query = $this->db->get('jenis');
		return $query->result();
	}

	public function getJenisById($id_jenis)
	{
		$this->db->where('id_jenis', $id_jenis);
		$query = $this->db->get('jenis');
		return $query->result();
	}

	public function getMobilByJenis($id_jenis)
	{
		$this->db->select('mobil.id_mobil as id_mobil, mobil.nama_mobil as nama_mobil, mobil.fk_jenis as fk_jenis, jenis.id_jenis as id_jenis, jenis.jenis_mobil as jenis_mobil, jenis.harga as harga');
		$this->db->where('id_jenis', $id_jenis);
		$this->db->join('jenis', 'jenis.id_jenis = mobil.fk_jenis', 'join');
		$query = $this->db->get('mobil');
		return $query->result();
	}

	public function createJenis()
	{
		$object = array('id_jenis' => $this->input->post('id_jenis'),
		'jenis_mobil' => $this->input->post('jenis_mobil'),
		'harga' => $this->input->post('harga'));
		$this->db->insert('jenis', $object);
	}

	public function editJenis($id_jenis)
	{
		$object = array('id_jenis' => $this->input->post('id_jenis'),
		'jenis_mobil' => $this->input->post('jenis_mobil'),
		'harga' => $this->input->post('harga'));
		$this->db->where('id_jenis', $id_jenis);
		$this->db->update('jenis', $object);
	}

	public function deleteJenis($id_jenis)
	{
		$this->db->where('id_jenis', $id_jenis);
		$this->db->delete('jenis');
	}

}

/* End of file Carwash_Model.php */
/* Location: ./application/models/Carwash_Model.php */
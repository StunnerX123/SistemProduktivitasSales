<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSalesModel extends Model
{
	protected $table = 'tb_datasales';

	public function cek_data($kode)
    {
        return $this->db->table('tb_datasales')->where('kode', $kode)->get()->getRowArray();
    }

    public function search($keyword)
    {
    	//$builder = $this->table('tb_datasales');
    	//$builder->like('nama_sales', $keyword);
    	//return $builder;
    	
    	return $this->table('tb_datasales')->like('nama_sales', $keyword)->orLike('kode', $keyword)->orLike('agency', $keyword);
    }

    public function add($data)
    {
        $this->db->table('tb_datasales')->insert($data);
    }
}
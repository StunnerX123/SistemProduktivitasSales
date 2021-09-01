<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSalesModel extends Model
{
	protected $table = 'tb_datasales';
    protected $allowedFields = ['kode', 'nama_sales', 'agency', 'status'];

	public function cek_data($kode)
    {
        return $this->db->table('tb_datasales')->where('kode', $kode)->get()->getRowArray();
    }

    public function search($keyword)
    {
    	//$builder = $this->table('tb_datasales');
    	//$builder->like('nama_sales', $keyword);
    	//return $builder;
    	
    	return $this->table('tb_datasales')->like('nama_sales', $keyword)->orLike('kode', $keyword)->orLike('agency', $keyword)->orLike('id_user', $keyword);
    }

    public function add($data)
    {
        $this->db->table('tb_datasales')->insert($data);
    }

    public function replaceSales($data)
    {
        $this->db->table('tb_datasales')->replace($data);
    }

    public function ignoreSales($data)
    {
        $this->db->table('tb_datasales')->ignore(true)->insert($data);
    }

    public function updateSales($data)
    {
        $builder = $this->db->table('tb_datasales');
        $builder->where('id_user', $data['id_user']);
        $builder->Where('kode', $data['kode']);
        $builder->update($data);
    }

    public function updateDataSales($data)
    {
        $builder = $this->db->table('tb_datasales');
        $builder->where('kode', $data['kode']);
        $builder->update($data);
    }
}
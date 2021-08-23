<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model
{
    protected $table = 'tb_hariansales';

    public function cek_data($kcontact)
    {
        return $this->db->table('tb_hariansales')->where('kcontact', $kcontact)->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_hariansales')->insert($data);
    }

    public function get_product_keyword($data)
    {
        $this->db->select('*');
        $this->db->from('tb_hariansales');
        $this->db->like('nama_sales', $keyword);
        $this->db->or_like('agency', $keyword);
        $this->db->or_like('kode', $keyword);
        return $this->db->get()->result();

    }
}
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

    public function search($keyword)
    {
        return $this->table('tb_hariansales')->like('kcontact', $keyword)->orLike('tanggal_order', $keyword)->orLike('type_layanan', $keyword)->orLike('group_channel', $keyword)->orLike('sto', $keyword);
    }

    public function tanggal($data)
    {
        helper("formatdate");
        return $this->table('tb_hariansales')->where('date_order >=', $data['tanggal_min'])->where('date_order <=', $data['tanggal_max']);
    }
}
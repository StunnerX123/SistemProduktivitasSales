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

    public function joinSalesLeft()
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when group_channel="Non Digital" then group_channel end) as non_digital, count(case when group_channel="Digital" then group_channel end) as digital, count(group_channel) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinSalesLeft');
    }

    public function searchSalesLeft($keyword)
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when group_channel="Non Digital" then group_channel end) as non_digital, count(case when group_channel="Digital" then group_channel end) as digital, count(group_channel) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->like('tb_datasales.nama_sales', $keyword)
            ->orLike('tb_datasales.kode', $keyword)
            ->orLike('tb_datasales.agency', $keyword)
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinSalesLeft');
    }

    public function tanggalJoinSales($search_tanggal)
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when group_channel="Non Digital" then group_channel end) as non_digital, count(case when group_channel="Digital" then group_channel end) as digital, count(group_channel) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->where('tb_hariansales.date_order >=', $search_tanggal['tanggal_min'])
            ->where('tb_hariansales.date_order <=', $search_tanggal['tanggal_max'])
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinSalesLeft');
    }

    public function tanggalagenJoinSales($search_tanggal)
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when group_channel="Non Digital" then group_channel end) as non_digital, count(case when group_channel="Digital" then group_channel end) as digital, count(group_channel) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->where('tb_hariansales.date_order >=', $search_tanggal['tanggal_min'])
            ->where('tb_hariansales.date_order <=', $search_tanggal['tanggal_max'])
            ->where('tb_datasales.agency', $search_tanggal['agency'])
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinSalesLeft');
    }
    
    public function joinstoSalesLeft()
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when sto="CKI" then sto end) as cki, count(case when sto="RGA" then sto end) as rga, count(case when sto="JTW" then sto end) as jtw, count(case when sto="MJL" then sto end) as mjl, count(case when sto="KAD" then sto end) as kad, count(sto) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinstoSalesLeft');
    }

    public function searchstoSalesLeft($keyword)
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when sto="CKI" then sto end) as cki, count(case when sto="RGA" then sto end) as rga, count(case when sto="JTW" then sto end) as jtw, count(case when sto="MJL" then sto end) as mjl, count(case when sto="KAD" then sto end) as kad, count(sto) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->like('tb_datasales.nama_sales', $keyword)
            ->orLike('tb_datasales.kode', $keyword)
            ->orLike('tb_datasales.agency', $keyword)
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinstoSalesLeft');
    }

    public function tanggalstoJoinSales($search_tanggal)
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when sto="CKI" then sto end) as cki, count(case when sto="RGA" then sto end) as rga, count(case when sto="JTW" then sto end) as jtw, count(case when sto="MJL" then sto end) as mjl, count(case when sto="KAD" then sto end) as kad, count(sto) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->where('tb_hariansales.date_order >=', $search_tanggal['tanggal_min'])
            ->where('tb_hariansales.date_order <=', $search_tanggal['tanggal_max'])
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinSalesLeft');
    }

    public function tanggalagenstoJoinSales($search_tanggal)
    {
        return $this->select('tb_datasales.kode,tb_datasales.nama_sales,tb_datasales.agency,tb_datasales.status, count(case when sto="CKI" then sto end) as cki, count(case when sto="RGA" then sto end) as rga, count(case when sto="JTW" then sto end) as jtw, count(case when sto="MJL" then sto end) as mjl, count(case when sto="KAD" then sto end) as kad, count(sto) as total, dense_rank() over (order by total DESC) as rank')
            ->join('tb_hariansales', 'tb_datasales.id_user = tb_hariansales.id_user', 'LEFT')
            ->where('tb_hariansales.date_order >=', $search_tanggal['tanggal_min'])
            ->where('tb_hariansales.date_order <=', $search_tanggal['tanggal_max'])
            ->where('tb_datasales.agency', $search_tanggal['agency'])
            ->groupBy('kode')
            ->orderBy('total','DESC')
            ->paginate(10, 'joinstoSalesLeft');
    }
}
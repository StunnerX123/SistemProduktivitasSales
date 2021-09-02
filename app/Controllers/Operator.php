<?php

namespace App\Controllers;
use App\Models\SalesModel;
use PHPExcel;
use PHPExcel_IOFactory;

class Operator extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->agency = new \App\Models\AgencyModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Home'
		];
		return view('operator/home', $data);
	}

	public function login()
	{
		$data = [
			'title' => 'Login'
		];
		return view('operator/login', $data);
	}

	public function import_excel_datasales()
	{
		helper('form');
		helper("custom");
		helper("tanggalindo");
		helper("originaldate");
		helper("text");

		$currentPage = $this->request->getVar('page_tb_datasales') ? $this->request->getVar('page_tb_datasales') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$cari = $this->data_sales->search($keyword)->orderBy('agency', 'DESC');
		}else{
			$cari = $this->data_sales->orderBy('agency', 'DESC');
		}

		$data = [
			'title' => 'Import Data Sales',
			'data_sales' => $cari->paginate(10, 'tb_datasales'),
			'pager' => $this->data_sales->pager,
			'currentPage' => $currentPage
		];
		return view('operator/import_excel_datasales', $data);
	}
	public function import_data_sales()
	{
		$file = $this->request->getFile('file_excel');

		new PHPExcel;
		
		//Mengambil lokasi temp file
		$fileLocation = $file->getTempName();
		
		//Baca file excel
		$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
		
		//Ambil sheet aktif
		$sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		
		//Melakukan perulangan untuk mengambil data excel
		foreach ($sheet as $key => $data) {
			//Skip baris jika kosong
			if (empty($data['C'])) {
				continue;
			}
			if ($data['C']=='Kode' || $data['C']=='kode') {
				continue;
			}
			
			$kode = $this->data_sales->cek_data($data['C']);
			if ($data['C']==isset($kode['kode'])){
				
				//Insert Data
				$data = array(
					'kode' => $data['C'],
					'nama_sales' => $data['B'],
					'agency' => $data['D'],
					'status' => $data['I']
				);
				$this->data_sales->updateDataSales($data);
			} else if ($data['C']==empty($kode['kode'])){

				//Insert Data
				$data = array(
					'kode' => $data['C'],
					'nama_sales' => $data['B'],
					'agency' => $data['D'],
					'status' => $data['I']
				);
				$this->data_sales->add($data);
			}
		}
		session()->setFlashdata('pesan','Data berhasil di Import');
		return redirect()->to(base_url('operator/import_excel_datasales'));
	}
	public function update(){

		$id_user = $this->data_sales->search($this->request->getVar('id_user'))->get()->getRowArray();

		if($id_user['id_user']==$this->request->getVar('id_user'))
		{
			$data = [
				'id_user' => $id_user['id_user'],
		 		'kode' => $this->request->getVar('kode'),
				'nama_sales' => $this->request->getVar('nama_sales'),
				'agency' => $this->request->getVar('agency'),
				'status' => $this->request->getVar('status')
			];
			session()->setFlashdata('update', 'Data berhasil diupdate.');
			$this->data_sales->updateSales($data);
		}
		
		return redirect()->to(base_url('operator/import_excel_datasales'));
	}

	public function import_excel_hariansales()
	{
		helper('form');
		helper("custom");
		helper("formatdate");
		helper("text");

		$currentPage = $this->request->getVar('page_tb_hariansales') ? $this->request->getVar('page_tb_hariansales') : 1;

		$search_tanggal = [
			'tanggal_min' => $this->request->getGet('tanggalmin'),
			'tanggal_max' => $this->request->getGet('tanggalmax')
		];

		if ($search_tanggal['tanggal_min']!="" && $search_tanggal['tanggal_max']!="") {
			$cari = $this->sales->tanggal($search_tanggal)->orderBy('date_order', 'ASC');
		}else if ($search_tanggal['tanggal_min']=="" && $search_tanggal['tanggal_max']==""){
			$cari = $this->sales->orderBy('date_order', 'ASC');
		}

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$cari = $this->sales->search($keyword)->orderBy('tanggal_order', 'ASC');
		}else{
			$cari = $this->sales->orderBy('tanggal_order', 'ASC');
		}

		$data = [
			'title' => 'Import Harian Sales Post',
			'harian_sales' => $cari->paginate(10, 'tb_hariansales'),
			'tanggal' => $search_tanggal,
			'pager' => $this->sales->pager,
			'currentPage' => $currentPage
		];
		return view('operator/import_excel_hariansales', $data);
	}
	public function import_harian_sales()
	{
		helper("originaldate");
		$file = $this->request->getFile('file_excel');
		//dd($nama_file);

		new PHPExcel;
		
		//Mengambil lokasi temp file
		$fileLocation = $file->getTempName();
		
		//Baca file excel
		$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
		
		//Ambil sheet aktif
		$sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		
		//Melakukan perulangan untuk mengambil data excel untuk tabel datasales
		foreach ($sheet as $key => $data) {
			//Skip baris 1 Karena judul ditabel excel
			if ($key==1) {
				continue;
			}

			$kode = $data['L'];
			$pattern = "/[-\/s;]/";
			$components = preg_split($pattern, $kode);
			$components = preg_replace("/\s+/", "", $components);

			//Skip jika ada data yang sama
			$kode = $this->data_sales->cek_data($components['3']);
			if ($components['3'] == isset($kode['kode'])){
				continue;
			}

			$datasales = array(
			 	'kode' => trim($components['3']),
			 	'nama_sales' => 'XXX',
			 	'agency' => 'xxxAnonymusxxx',
			 	'status' => 'Unknown'
			);
			$this->data_sales->add($datasales);
		}
		//Melakukan perulangan untuk mengambil data excel untuk tabel hariansales
		foreach ($sheet as $key => $data) {
			//Skip baris 1 Karena judul ditabel excel
			if ($key==1) {
				continue;
			}
			
			//Skip jika ada data yang sama
			$kcontact = $this->sales->cek_data($data['L']);
			if ($data['L'] == isset($kcontact['kcontact'])) {
				continue;
			}

			$kode = $data['L'];
			$pattern = "/[-\/s;]/";
			$components = preg_split($pattern, $kode);
			$components = preg_replace("/\s+/", "", $components);

			$id_user = $this->data_sales->cek_data(trim($components['3']));

			$date = $data['AQ'];
			$pattern = "/[-\s;]/";
			$tanggal_proses = preg_split($pattern, $date);
			//$tanggal_proses = preg_replace('~[^-\w]+~', '-', $tanggal_proses);

			//Insert Data
			$data = array(
				'kcontact' => $data['L'],
					'sto' => $data['F'],
				'status_resume' => $data['J'],
				'type_layanan' => $data['AL'],
				'group_channel' => $data['BA'],
				'tanggal_order' => $data['M'],
				'date_order' => original_date($data['M']),
				'id_user' => $id_user['id_user'],
				'tanggal_proses' => $tanggal_proses['0']
			);
			$this->sales->add($data);
		}
		session()->setFlashdata('pesan','Data berhasil di Import');
		return redirect()->to(base_url('operator/import_excel_hariansales'));
	}

	public function data_resume_agency()
	{
		$currentPage = $this->request->getVar('page_joinSalesLeft') ? $this->request->getVar('page_joinSalesLeft') : 1;

		$search_tanggal = [
			'tanggal_min' => $this->request->getGet('tanggalmin'),
			'tanggal_max' => $this->request->getGet('tanggalmax'),
			'agency' => $this->request->getGet('agency')
		];
		$keyword = $this->request->getVar('keyword');

		if ($search_tanggal['tanggal_min']=="" && $search_tanggal['tanggal_max']=="" && $search_tanggal['agency']=="" && $keyword==""){
		 	$cari = $this->data_sales->joinSalesLeft();
		}else if($search_tanggal['tanggal_min']!="" && $search_tanggal['tanggal_max']!="" && $search_tanggal['agency']=="--Pilihan Anda--"){
			$cari = $this->data_sales->tanggalJoinSales($search_tanggal);
		}else if($search_tanggal['tanggal_min']!="" && $search_tanggal['tanggal_max']!="" && $search_tanggal['agency']!="--Pilihan Anda--"){
			$cari = $this->data_sales->tanggalagenJoinSales($search_tanggal);
		}else if ($search_tanggal['tanggal_min']=="" && $search_tanggal['tanggal_max']=="" && $search_tanggal['agency']=="" && $keyword!="") {
			$cari = $this->data_sales->searchSalesLeft($keyword);	
		}

		$data = [
			'title' => 'Data Bulanan Sales',
			'join_sales' => $cari,
			'tanggal' => $search_tanggal,
			'allAgency' => $this->agency->selectAgency(),
			'pager'=> $this->data_sales->pager,
			'currentPage' => $currentPage
		];

		return view('operator/data_resume_agency', $data);
	}

		public function data_sto()
	{
		$currentPage = $this->request->getVar('page_tb_datasales') ? $this->request->getVar('page_tb_datasales') : 1;

		$search_tanggal = [
			'tanggal_min' => $this->request->getGet('tanggalmin'),
			'tanggal_max' => $this->request->getGet('tanggalmax'),
			'agency' => $this->request->getGet('agency')
		];
		$keyword = $this->request->getVar('keyword');

		if ($search_tanggal['tanggal_min']=="" && $search_tanggal['tanggal_max']=="" && $search_tanggal['agency']=="" && $keyword==""){
		 	$cari = $this->data_sales->joinstoSalesLeft();
		}else if($search_tanggal['tanggal_min']!="" && $search_tanggal['tanggal_max']!="" && $search_tanggal['agency']=="--Pilihan Anda--"){
			$cari = $this->data_sales->tanggalstoJoinSales($search_tanggal);
		}else if($search_tanggal['tanggal_min']!="" && $search_tanggal['tanggal_max']!="" && $search_tanggal['agency']!="--Pilihan Anda--"){
			$cari = $this->data_sales->tanggalagenstoJoinSales($search_tanggal);
		}else if ($search_tanggal['tanggal_min']=="" && $search_tanggal['tanggal_max']=="" && $search_tanggal['agency']=="" && $keyword!="") {
			$cari = $this->data_sales->searchstoSalesLeft($keyword);	
		}

		$data = [
			'title' => 'Data STO',
			'tanggal' => $search_tanggal,
			'allAgency' => $this->agency->selectAgency(),
			'allSales' => $cari,
			'pager' => $this->data_sales->pager,
			'pagerAgency' => $this->data_sales->pager,
			'currentPage' => $currentPage
		];

		return view('operator/data_sto', $data);
	}
}
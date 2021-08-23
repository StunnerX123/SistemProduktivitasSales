<?php

namespace App\Controllers;
use App\Models\SalesModel;
use PHPExcel;
use PHPExcel_IOFactory;

class Operator extends BaseController
{
	public function __construct()
	{
		$this->SalesModel = new SalesModel();
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
	public function import_excel()
	{
		helper('form');
		$data = [
			'title' => 'Import Excel',
			'harian_sales' => $this->sales->paginate(10),
			'pager' => $this->sales->pager
		];
		return view('operator/import_excel', $data);
	}
	public function import_harian_sales()
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
			//Skip baris 1 Karena judul ditabel excel
			if ($key==1) {
				continue;
			}
			//Skip jika ada data yang sama
			//$kcontact = $this->SalesModel->cek_data($data['L']);
			//if ($data['L']==$kcontact) {
			//	continue;
			//}
			
			//Insert Data
			$data = array(
				'sto' => $data['F'],
				'status_resume' => $data['J'],
				'kcontact' => $data['L'],
				'type_layanan' => $data['AL'],
				'tanggal_order' => $data['M'],
				'group_channel' => $data['BA']
			);
			$this->SalesModel->add($data);
		}
		session()->setFlashdata('pesan','Data berhasil di Import');
		return redirect()->to(base_url('operator/import_excel'));
	}
	public function data_bulanan()
	{
		$currentPage = $this->request->getVar('page_tb_datasales') ? $this->request->getVar('page_tb_datasales') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$cari = $this->data_sales->search($keyword);
		}else{
			$cari = $this->data_sales;
		}

		$data = [
			'title' => 'Data Bulanan Sales',
			'data_sales' => $cari->paginate(10, 'tb_datasales'),
			'pager' => $this->data_sales->pager,
			'currentPage' => $currentPage
		];

		return view('operator/data_bulanan', $data);
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
			//Skip baris 1 Karena Judul
			if ($key==1) {
				continue;
			}
			//Skip jika ada data yang sama
			//$kode = $this->data_sales->cek_data($data['B']);
			//if ($data['B']==$kode) {
			//	continue;
			//}
			
			//Insert Data
			$data = array(
				'kode' => $data['B'],
				'nama_sales' => $data['A'],
				'agency' => $data['C'],
			);
			$this->data_sales->add($data);
		}
		session()->setFlashdata('pesan','Data berhasil di Import');
		return redirect()->to(base_url('operator/data_bulanan'));
	
	}
		public function data_sto()
	{
		$data = [
			'title' => 'Data STO'
		];

		return view('operator/data_sto', $data);
	}
		public function data_produktivitasSP()
	{

		$data = [
			'title' => 'Data Produktivitas Sales'
		];

		return view('operator/data_produktivitasSP', $data);
	}
		public function data_RESUMEAGENCY()
	{

		$data = [
			'title' => 'Data RESUMEAGENCY'
		];

		return view('operator/data_RESUMEAGENCY', $data);
	}
}
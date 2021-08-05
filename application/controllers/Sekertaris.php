<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekertaris extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_sekertaris');
		$this->load->model('m_ss');
		$this->load->library(['form_validation', 'upload']);
		
	}

	public function index()
	{
		
		$data ['row'] = $this->m_sekertaris->all();
		
		$this->load->view('sekertaris/beranda', $data);
	}

	public function tambah ()
	{

		$this->form_validation->set_rules('nomor_berkas', 'nomor berkas', 'required');
		$this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required');
		$this->form_validation->set_rules('tanggal_expire', 'Batas waktu', 'required');
		$this->form_validation->set_rules('nomor_sm', 'nomor_sm', 'required');
		$this->form_validation->set_rules('perihal', 'perihal', 'required');
		$this->form_validation->set_rules('asal_sm', 'asal_sm', 'required');
		$this->form_validation->set_rules('lampiran', 'lampiran', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_rules('id_ss', 'id ss', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_rules('imagee', 'Gambar', 'required');
		$this->form_validation->set_rules('judul_surat', 'judul_surat', 'required');


		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		$config ['upload_path']		=	 './assets/gambar/';
		$config ['allowed_types']	=	 'gif|jpg|png|jpeg|pdf|word';
		$config ['max_size']		=	 '5120';
		$config ['file_name']		=	  'sm-'.date('ymd');

		$this->upload->initialize($config);


		if (!$this->form_validation->run() && !$this->upload->do_upload('imagee')) {

				$sifat_surat = $this->m_ss->all();
				$error = $this->upload->display_errors();

				$this->load->view('sekertaris/surat_masuk', compact('sifat_surat', 'error'));
		}else{

			$post = array_merge($_POST, ['imagee' => $this->upload->data()]);

			
			$this->m_sekertaris->tambah($post);
			$this->session->set_flashdata('sukses', 'data berhasil disimpan');
			echo "<script>alert('Data Berhasil disimpan');</script>";
			return redirect('sekertaris', 'refresh');
		}
	}

	public function update($id)
    {

		$this->form_validation->set_rules('nomor_berkas', 'nomor_berkas', 'required');
		$this->form_validation->set_rules('tangg', 'Username', 'required|min_length[5]');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if (!$this->form_validation->run()) {
			$query = $this->m_login->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();

				$this->load->view('admin/edit_user', $data);
			} else{
				echo "<script>alert('Data tidak ditemukan');";	
				echo "window.location='".site_url('user')."';</script>";
			}
			
		}else{
			$post = $_POST;
			$this->m_login->update($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dirubah');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
		}

		

	public function delete($id){
        $this->m_login->delete($id); //Memanggil fungsi deleteData pada M_Index sembari membawa parameter $noinduk.

        if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dihapus');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
    }

    public function download()
    {

    	$data ['row'] = $this->m_sekertaris->all();

    	require(APPPATH. 'PHPExcel-1.8/classes/PHPExcel.php');
    	require(APPPATH. 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php');

    	$objPHPExcel = new PHPExcel();

    	$objPHPExcel->getProperties()->setCreator("idr corner");
    	$objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
    	$objPHPExcel->getProperties()->setTitle("Data Surat Masuk");
    	$objPHPExcel->getProperties()->setSubject("");
    	$objPHPExcel->getProperties()->setDescription("idr corner");

    	$objPHPExcel->setActiveSheetIndex(0);

    	$objPHPExcel->getActiveSheet()->setCellValue('A1', '#');
    	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nomor Berkas');
    	$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Tanggal Masuk');
    	$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Nomor Surat Masuk');
    	$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Perihal');
    	$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Status');
    	$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Asal Surat Masuk');
    	$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Judul Surat');

    	$baris=2;
    	$x=1;

    	foreach ($data ['row'] as $datasm) {
    		$objPHPExcel->getActiveSheet()->setCellValue('A'. $baris, $x);
    		$objPHPExcel->getActiveSheet()->setCellValue('B'. $baris, $datasm->nomor_berkas);
    		$objPHPExcel->getActiveSheet()->setCellValue('C'. $baris, $datasm->tanggal_masuk);
    		$objPHPExcel->getActiveSheet()->setCellValue('D'. $baris, $datasm->nomor_sm);
    		$objPHPExcel->getActiveSheet()->setCellValue('E'. $baris, $datasm->perihal);
    		$objPHPExcel->getActiveSheet()->setCellValue('F'. $baris, $datasm->status);
    		$objPHPExcel->getActiveSheet()->setCellValue('G'. $baris, $datasm->asal_sm);
    		$objPHPExcel->getActiveSheet()->setCellValue('H'. $baris, $datasm->judul_surat);

    		$x++;
    		$baris++;
    	}

    	$filename="Data-Surat-Masuk".date("d-m-Y-H-i-s").'.xlsx';

    	$objPHPExcel->getActiveSheet()->setTitle("Data Surat Masuk");

    	header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    	header('Content-Disposition: attachment;filename="'.$filename.'"');
    	header('Cache-Control: max-age=0');

    	$writer=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    	$writer->save('php://output');

    	exit;
    }
}

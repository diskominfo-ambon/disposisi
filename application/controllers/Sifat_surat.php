<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sifat_surat extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('m_ss');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data ['row'] = $this->m_ss->get();
        $this->load->view('sekertaris/sifat_surat', $data);
    }

    public function tambah ()
    {

        $this->form_validation->set_rules('sifat_surat', 'sifat surat', 'required');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
                $this->load->view('sekertaris/tambah_ss');
        }else{
            $post = $this->input->post(null, TRUE);
            $this->m_ss->tambah($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Disimpan');</script>";
            }
            echo "<script>window.location='".site_url('sifat_surat')."';</script>";
        }
        }

    public function update($id)
    {

        $this->form_validation->set_rules('sifat_surat', 'sifat surat', 'required');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if (!$this->form_validation->run()) {
            $query = $this->m_ss->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();

                $this->load->view('sekertaris/edit_ss', $data);
            } else{
                echo "<script>alert('Data tidak ditemukan');";  
                echo "window.location='".site_url('sifat_surat')."';</script>";
            }
            
        }else{
            $post = $_POST;
            $this->m_ss->update($post, $id);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Dirubah');</script>";
            }
            echo "<script>window.location='".site_url('sifat_surat')."';</script>";
        }
        }

        

    public function delete($id){
        $this->m_ss->delete($id); //Memanggil fungsi deleteData pada M_Index sembari membawa parameter $noinduk.

        if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Dihapus');</script>";
            }
            echo "<script>window.location='".site_url('sifat_surat')."';</script>";
    }
}

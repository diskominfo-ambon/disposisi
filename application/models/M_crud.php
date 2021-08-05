<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "surat_masuk";

    public $id_sm;
    public $nomor_berkas;
    public $tanggal_masuk;
    public $nomor_sm;
    public $perihal;
    public $asal_sm;
    public $lampiran;
    public $sifat_surat;
    public $tanggal_masuk;
    public $image = "default.jpg";
    public $status;
    public $id_ss;
    public $id_disposisi;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_sm" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_sm = uniqid();
        $this->nomor_berkas = $post["nomor_berkas"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->nomor_sm = $post["nomor_sm"];
        $this->perihal = $post["perihal"];
        $this->asal_sm = $post["asal_sm"];
        $this->nomor_sm = $post["lampiran"];
        $this->sifat_surat = $post["sifat_surat'"];
        $this->status = $post["status"];
        $this->id_disposisi = $post["id_ss"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_sm = $post["id_sm"];
        $this->nomor_berkas = $post["nomor_berkas"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->nomor_sm = $post["nomor_sm"];
        $this->perihal = $post["perihal"];
        $this->asal_sm = $post["asal_sm"];
        $this->nomor_sm = $post["lampiran"];
        $this->sifat_surat = $post["sifat_surat'"];
        $this->status = $post["status"];
        $this->id_disposisi = $post["id_ss"];
        return $this->db->update($this->_table, $this, array('id_sm' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_sm" => $id));
    }
}
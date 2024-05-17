<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }
    private function rulesCategory(){
        return [
            ['field' => 'label','label' => 'label','rules' => 'required'],
            ['field' => 'unit','label' => 'unit','rules' => 'required']
        ];
    }
    private function rulesCategory2(){
        return [
            ['field' => 'id','label' => 'id','rules' => 'required'],
            ['field' => 'labels','label' => 'labels','rules' => 'required'],
            ['field' => 'units','label' => 'units','rules' => 'required']
        ];
    }

    private function rulesProduct(){
        return [
            ['field' => 'label','label' => 'label','rules' => 'required'],
            ['field' => 'id_category','label' => 'id_category','rules' => 'required'],
            ['field' => 'price','label' => 'price','rules' => 'required'],
            ['field' => 'stock','label' => 'stock','rules' => 'required'],
            ['field' => 'description','label' => 'description','rules' => 'required'],
        ];
    }
    public function index()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $where = array(
            'id_shop' => $data['user'][0]->id_shop
        );
        $data['category'] = $this->Models->getWhere2("category",$where);
        $data['product'] = $this->Models->Product($data['user'][0]->id_shop);
        $data['title'] = 'History';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Masterdata/Product/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function Add()
    {
        $this->form_validation->set_rules($this->rulesProduct());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $where = array(
                'id_shop' => $data['user'][0]->id_shop
            );
            $data['category'] = $this->Models->getWhere2("category",$where);
            $data['product'] = $this->Models->Product($data['user'][0]->id_shop);
            $data['title'] = 'Product';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Masterdata/Product/input',$data);
            $this->load->view('dashboard/footer');
        }else{
            $config['upload_path']          = './img/product/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = uniqid();
            // $config['overwrite']			= true;
            $config['max_size']             = 4096; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));
            if ($this->upload->do_upload('photo')) {
                $insert['img'] = $this->upload->data("file_name");
                $insert['label'] = $this->input->post('label');
                $insert['price'] = str_replace('.', '', $this->input->post('price'));
                $insert['stock'] = str_replace('.', '', $this->input->post('stock'));
                $insert['description'] = $this->input->post('description');
                $insert['id_category'] = $this->input->post('id_category');
                $insert['id_shop'] = $ID[0]->id_shop;
                $insert['created_by'] = $ID[0]->id;
                $insert['updated_by'] = $ID[0]->id;
            }else{
                $insert['img'] = "default.jpg";
                $insert['label'] = $this->input->post('label');
                $insert['price'] = str_replace('.', '', $this->input->post('price'));
                $insert['stock'] = str_replace('.', '', $this->input->post('stock'));
                $insert['description'] = $this->input->post('description');
                $insert['id_category'] = $this->input->post('id_category');
                $insert['id_shop'] = $ID[0]->id_shop;
                $insert['created_by'] = $ID[0]->id;
                $insert['updated_by'] = $ID[0]->id;
            }
            $this->Models->insert('product',$insert);
            // $id_item = $this->db->insert_id();

            // $data['id_item']

            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Product'));
        }
        
    }

    //Category
    public function Category()
    {
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $where = array(
            'id_shop' => $data['user'][0]->id_shop
        );
        $data['category'] = $this->Models->getWhere2("category",$where);
        $data['title'] = 'Category';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('Masterdata/Category/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function Addcategory(){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $where = array(
                'id_shop' => $data['user'][0]->id_shop
            );
            $data['category'] = $this->Models->getWhere2("category",$where);
            $data['title'] = 'Category';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Masterdata/Category/main',$data);
            $this->load->view('dashboard/footer');
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));   
            $data['label'] = $this->input->post('label');  
            $data['unit'] = $this->input->post('unit');          
            $data['id_shop'] = $ID[0]->id_shop;
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->insert('category',$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Product/Category'));
        }
    }
    public function Editcategory(){
        $this->form_validation->set_rules($this->rulesCategory2());
        $data['id'] =  $this->input->post('id');  
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
            $where = array(
                'id_shop' => $data['user'][0]->id_shop
            );
            $data['category'] = $this->Models->getWhere2("category",$where);
            $data['title'] = 'Category';
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/side',$data);
            $this->load->view('Masterdata/Category/main',$data);
            $this->load->view('dashboard/footer');
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('user', 'username', $this->session->userdata('nama'));  
            $id =  $this->input->post('id');  
            $data['label'] = $this->input->post('labels');  
            $data['unit'] = $this->input->post('units');          
            $data['id_shop'] = $ID[0]->id_shop;
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('category','id',$id,$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Product/Category'));
        }
    }
    public function Deletecategory($id){
        $this->Models->delete('category','id',$id);
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('Product/Category'));
    }
}
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Controller {


    public function construct(){
        parent::__Construct();

        // Load To Model
         $this->load->model("User_model");

    }


    // =============================== Test posting ================================
    // test Posting
    public function test_posting(){

        $q= $this->User_model->get_posting();

        echo json_encode($q);
    }

    // =================================== Posting ===============================
    // Add Posting
    public function add_posting(){

        $posting = $this->input->post("nama_textfield");
        $gambar = "filename.jpg";
        $data = array(
            'post_id'   => "" ,
            'posting'   => $posting ,
            'waktu'     => "",
            'id_user'   => $this->session->userdata('nama_session'),
            'urlgambar' => $gambar

        );

             // Load To User Model
             $this->User_model->insert_posting($data);
             $this->load->view('frame/header_view');
             $this->load->view('frame/sidebar_nav_view');
             $this->load->view('user/add_posting', $data);
             $this->load->view('frame/footer_view');
    }

    // ================================== Delete Posting ===============================
    // delete
    // public function delete_posting($id){

    //     $data = array(

    //             "user_id"=>$id

    //             );

    //     $this->User_model->delete_posting($data);

        // echo "Data Berhasil dihapus";

    // }

    // ================================= Cek Email ========================================

    public function cek_email($email){
        $this->db->where("email",trim($email));
        $query=$this->db->get("manulaend");
        return $query->num_rows();
    }


    // ================================== Show Posting List ==================================
    public function posting(){

        // $data['posting'] = $this->m->show_post();
        // print_r($data);

        // $data = array(
        //     'formTitle' => 'User Management',
        //     'title' => 'User Management',
        //     'posting' => $this->user_model->get_user_post(),

        // );

         $x['postings']=$this->User_model->show_post();
         // print_r($x);

         $this->load->view('frame/header_view');
         $this->load->view('frame/sidebar_nav_view');
         $this->load->view('user/posting', $x);
         $this->load->view('frame/footer_view');

    }

    // Delete Posting

    function delete($id){
        $result = $this->User_model->delete($id);
        if($result){
            $this->session->set_flashdata('success_msg', 'Record delete successfully');
        } else {
            $this->session->set_flashdata('error_msg', 'Faill to delete record');

        }

        redirect(site_url('user/posting'));

    }


    // Komentar
    public function komentar(){

        $data['komens']=$this->User_model->show_komen();
        // print_r($data);

         $this->load->view('frame/header_view');
         $this->load->view('frame/sidebar_nav_view');
         $this->load->view('user/komentar', $data);
         $this->load->view('frame/footer_view');

    }

    // Delete Komentar
        function delete_komentar($id){
        $result = $this->User_model->deletekomen($id);
        if($result){
            $this->session->set_flashdata('success_msg', 'Record delete successfully');
        } else {
            $this->session->set_flashdata('error_msg', 'Faill to delete record');

        }

        redirect(site_url('user/komentar'));

    }




// Penutup
}

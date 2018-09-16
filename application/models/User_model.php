<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_model extends CI_Model {


    // ========================== Posting ============================
    // Get Posting
    public function get_posting(){
     /*
     $this->db->select('*');
        $this->db->from('komen');
        $this->db->join('user', 'user.user_id = komen.user_id');
     */


    	   $this->db->select('*');
         $this->db->from('posting');
         $this->db->join('user', 'user.user_id = posting.user_id');
        //  $this->db->join('komen', 'komen.user_id = posting.user_id');
        //  $this->db->join('komen', 'komen.post_id = posting.post_id');
				 $this->db->order_by("posting.waktu", "desc");
						// $this->db->where('posting.id_user',1);
						// $this->db->limit(5);
            $q = $this->db->get();
            return $q->result();
    }


    public function get_komentar($idPosting){
     /*
     $this->db->select('*');
        $this->db->from('komen');
        $this->db->join('user', 'user.user_id = komen.user_id');
     */


         $this->db->select('*');
         $this->db->from('posting');
         $this->db->where("posting.post_id",$idPosting);
         $this->db->join('user', 'user.user_id = posting.user_id');
         $this->db->join('komen', 'komen.user_id = posting.user_id');
         $this->db->order_by("posting.waktu", "desc");
            // $this->db->where('posting.id_user',1);
            // $this->db->limit(5);
            $q = $this->db->get();
            return $q->result();
    }



    public function get_sample_posting(){

          $q = $this->db->get('posting');
          return $q->result();

    }


    // ============================ Insert Posting ========================
    // Insert Posting
    public function insert_posting($data=array()){
    	$this->db->insert('posting',$data);
    }

    // Komentar User
    public function masukkin_komentar($data=array()){

          $this->db->insert('komen',$data);

    }

   //  // =========================== Delete User ============================
   //  // Delete user
  	// public function delete_posting($data=array()){
  	// 	$this->db->delete('delete',$data);
  	// }


  	// ============================ Komentar ==============================
    // Komentar
    public function comment(){
        $this->db->select('*');
        $this->db->form('komen');
        $this->db->join('user', 'user.user_id = komen.user_id');
                    $this->db->order_by("komen.waktu", "desc");
                    $this->db->where('komen.user_id',2);
                    $this->db->limits(7);
            $q = $this->db->get();
            return $q->result();

    }

    // ====================== Detail Insert Komentar ====================
    public function insert_detail_komentar($data=array()){

        $this->db->insert('komen',$data);
     

    }

    // ======================== Insert Update data User ==========================
    public function get_user($iduser){

      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('user_id',$iduser);
       $q = $this->db->get();
       return $q->row();


    }

    // =================== UPDATE PROFILE =====================================
    public function update_user($iduser){

      $kota = $this->input->post("user_kota");
      $umur = $this->input->post("user_umur");

      $gambar = ""; 
      $data = array(
        
            'urlgambar' => '',
            'kota' => $kota,
            'umur' => $umur

            );

      $this->db->where('user_id', $iduser);
      $this->db->update('user', $data);

      if($data != NULL){

        $param['status']='oke';

      }

      else {

        $param['status']='failed';

      }

        echo json_encode($param);
    }

// ========================================= Tab Posting ==================================

// Get Postingan User di Database

    public function show_post(){

      $this->db->order_by('waktu', 'desc');
      $query = $this->db->get('posting');
      if($query->num_rows() > 0){

        return $query->result();

      } else {

        return false;
      }
  }


// Delete Posting
     public function delete($id){
      $this->db->where('post_id', $id);
      $this->db->delete('posting');
      if($this->db->affected_rows()> 0){
        return true;
      } else {

        return false;
      }

    }

  // Get komentar dari database
    public function show_komen(){

      $this->db->order_by('waktu', 'asc');
      $query = $this->db->get('komen');
      if($query->num_rows() > 0){

        return $query->result();

      } else {

        return false;
      }

    }



  // Delete Komentar
    public function deletekomen($id){
      $this->db->where('komen_id', $id);
      $this->db->delete('komen');
      if($this->db->affected_rows() > 0){
        return true;
      } else{
        return false;
      }
    }


// Join 2 table 
    // $this->db->select("chat.id,chat.name,chat.email,chat.phone,chat.date,post.post");
    // public function show_komen(){

    // $this->db->select("komen.komen_id,komen.komentar,komen.waktu,komen.user_id,user.email");
    //   $this->db->from('komen');
    //   $this->db->join('user', 'user.user_id = komen.komen_id');
    //   $query = $this->db->get();

    // if($query->num_rows() > 0)

    // {
    //     return $query->result();
    // }
    //   else
    // {
    //     return false;
    // }
// }

// join Komen dan User
  //   public function show_komen(){
      
  //   $this->db->select('*');
  //   $this->db->from('komen');
  //   $this->db->join('user','user.user_id = komen.user_id');
  //   $query = $this->db->get();
  //   return $query->result();
  // }

// Penutup
}

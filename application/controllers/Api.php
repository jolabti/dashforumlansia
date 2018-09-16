<?php


      // header("Access-Control-Allow-Origin: *");
      // header("Content-Type: application/json; charset=UTF-8");
      // header("Access-Control-Allow-Methods: POST");
      // header("Access-Control-Max-Age: 3600");
      // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");




if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Api extends CI_Controller {



 // ===============================  Aunth Api =======================================
    public function __construct() {
       parent::__construct();

       //$this->load->model("User_model");
       header("Access-Control-Allow-Origin: *");
       header("Content-Type: application/json; charset=UTF-8");
       header("Access-Control-Allow-Methods: POST");
       header("Access-Control-Max-Age: 3600");
       header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

       $varEncode="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";

       //$filename = $image_name .'_'.date('d-m-y'). '.' . 'png';


    }

    // ================================ Api login ====================================
    public function api_login($username,$password){
        // header("Access-Control-Allow-Origin: *");
        // header("Content-Type: application/json; charset=UTF-8");
        // header("Access-Control-Allow-Methods: POST");
        // header("Access-Control-Max-Age: 3600");
        // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


        $countUser = $this->Authentication_model->cek_user($username, $password);
        $takeUser = $this->Authentication_model->get_user($username, $password);

        if($countUser>0){
                                                                // nama Field
            $this->session->set_userdata("sess_email", $takeUser->email);
            $this->session->set_userdata("sess_id", $takeUser->user_id);
            $this->session->set_userdata("sess_role_id", $takeUser->role);
            $this->session->set_userdata("sess_logged", "logged");

            $data["message"]="Ok";
            $data["response"]="200";
            $data["email_resp"]= $this->session->userdata("sess_email");
            $data["id_user"]= $this->session->userdata("sess_id");

        }
        else{

        	if($username==""||$password==""){

        				$data["message"]="Email atau Password Belum ditulis";
				        $data["response"]="404";
				        $data["email_resp"]= "";
				        $data["id_user"]= "";


        	}

        	else if($countUser<1){

        				$data["message"]="Anda belum terdaftar";
				        $data["response"]="200";
				        $data["email_resp"]= "";
				        $data["id_reps"]= "";


        	}

            // $data['message']= "failed";
            // $data['respon']= "404";
            // $data['email_resp']= $this->session->userdata("sess_email");
            // $data["id_reps"]= $this->session->userdata("sess_id");

        }

        echo json_encode($data,JSON_FORCE_OBJECT);

    }


    // ================================ Api get posting ============================
     public function api_get_posting(){

       	$data="";
        $q= $this->User_model->get_posting();

        if($q==null){

        $data['message']="Database null";
        $data['response']="failed";

        }

        else {

        	$data['response']  ="Ok";
        	$data['posts'] = $q;

          // foreach ($q as $val) {
          //   $data['posts'] = array(
          //       "post_id" =>$val->post_id,
          //       "waktu" =>$val->komentar,
          //       "posting" =>$val->post_id,
          //
          //   );

          }


        echo json_encode($data);
    }


     public function api_get_komentar($idPosting){

       	$data="";
        $q= $this->User_model->get_komentar($idPosting);

        if($q==null){

        $data['message']="Database null";
        $data['response']="failed";

        }

        else {

        	$data['response']  ="Ok";
        	$data['posts'] = $q;
          }
         echo json_encode($data);
    }


    public function api_sample_posting(){

         $printModel['data']= $this->User_model->get_sample_posting();

         echo json_encode($printModel);

    }


    	// =================================== Api Get Total User ==========================
    	public function api_get_total_user(){

    		    $data="";
            $q= $this->Authentication_model->model_total_user();

            if($q==null){

                $data['message']="Data user tidak ada";
                $data['response']="Failed";
            }

            else {

                $data['response'] ="Ok";
                $data['post'] = $q;
            }

    		echo json_encode($data);
       	}

        // =================================== Api Total Posting ==================================

        public function api_get_total_posting(){

            $data="";
            $q= $this->Authentication_model->model_total_posting();

            if($q==null){

                $data['message']="Postingan tidak ada";
                $data['response']="Failed";
            }

            else {

                $data['response'] ="Ok";
                $data['post'] = $q;
            }

            echo json_encode($data);
        }

        // ================================= API GET USER ============================
        public function api_get_user($iduser){

        $data="";
        $q= $this->User_model->get_user($iduser);


        if($q==null){


        $data['message']="Database null";
        $data['response']="failed";

        }

        else {

          $data['response']  ="Ok";
          $data['posts'] = $q;

          // foreach ($q as $val) {
          //   $data['posts'] = array(
          //       "post_id" =>$val->post_id,
          //       "waktu" =>$val->komentar,
          //       "posting" =>$val->post_id,
          //
          //   );
          }


        echo json_encode($data);

    }



        // ================================ Api Get Register ======================================

//        public function api_new_user($email, $password, $nama, $umur, $kota){
        public function api_new_user($email, $password,$kota){

                $paramDb = array(
                  'email'=>trim($email),
                  'password'=>md5($password),
                  'kota'=>$kota,
                  'role'=>'2',
                  'status'=>1

                );

                $cekUser = $this->Authentication_model->cek_api_user_register($email);
                if($cekUser>0){

                      $data['response']="Failed";
                      $data['message']="Email sudah terdaftar";
                      $data['code']=200;

                }
                else{
                      $this->Authentication_model->new_user($paramDb);
                      $data['response']="Ok";
                      $data['message']="Berhasil masuk database";
                      $data['code']=200;

                }

                echo json_encode($data);


        }

            // =================================== Comment ====================================

            public function api_get_comment(){

                $data="";
                $q = $this->User_model->comment();

            if($q==null){

                $data['message']="Masukkan komentar anda";
                $data['response']="Failed";
            }

            else {

                $data['response'] ="Ok";
                $data['post'] = $q;
            }

            echo json_encode($data);

            }


      function uploadPostingImage(){

            $varEncode="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";

             //$image = base64_decode($this->input->post("image_base64_string"));
               $image = base64_decode($varEncode);
              // decoding base64 string value
               $image_name = md5(uniqid(rand(), true));// image name generating with random number with 32 characters
               $filename = $image_name .'_'.date('d-m-y'). '.' . 'png';
              //rename file name with random number
               $path = './assets/images/uploads/';
              //image uploading folder path
               file_put_contents($path . $filename, $image);

               //echo base_url()."assets/images/uploads/".$filename;
               echo base_url()."assets/images/uploads/".$filename;


      }

      // ========================= API Posting ==================================

      function api_posting($iduser, $writePosting){


              $image = base64_decode($this->input->post("img_encode"));
              //$image = base64_decode($varEncode);
              // decoding base64 string value
              $image_name = md5(uniqid(rand(), true));// image name generating with random number with 32 characters
              $filename = $image_name.'_'.date('d-m-y'). '.' . 'png';
             //rename file name with random number
              $path = './assets/images/uploads/';
             //image uploading folder path
              file_put_contents($path . $filename, $image);

              $data = array(
                     "post_id" =>"",
                     "posting" => $writePosting,
                     "waktu"=>"",
                     "user_id"=>$iduser,
                     "urlgambar"=>base_url()."assets/images/uploads/".$filename
               );

             $this->User_model->insert_posting($data);

                    $apiresp['message']="Berhasil Buat Postingan";
                    $apiresp['status']="ok";

              echo json_encode($apiresp);
 

      }

    // ============================ API Profile ====================================
      
      // function api_update_profile($userid, $kota, $umur){

      //     $image = base64_decode($this->input->post('img_encode'));

      //     $image_name = md5(uniqid(rand(), true));
      //     $filename = $image_name.'_'.date('d-m-y').'.'. 'png';
      //     $path = './assets/images/uploads/';

      //     file_get_contents($path . $filename, $image);


      //     $data = array(

      //           "user_id" => $userid,
      //           "foto" => base_url()."assets/images/uploads". $filename,
      //           "kota" => $kota,
      //           "umur" => $umur

      //           );

 
      //     $this->User_model->update_data_user($data);

      //       $apiupdate['message']="Berhasil";
      //       $apiupdate['status']="ok";


      //       echo json_encode($apiupdate);


      // }



      // ===============================  API GET USER ===========================
 

      // ============================== API Komentar ==========================
      function api_komentar($iduser,$postid){
            $komentar = $this->input->post("komentar");
            $data = array(

                "user_id" =>$iduser,
                "komentar" => $komentar,
                "waktu" => "",
                "post_id" => $postid

                );

                $this->User_model->masukkin_komentar($data);


            //  $this->User_model->masukkin_komentar($data);
             //
            //     $apikom['message']= "Komentar Berhasil";
            //     $apikom['status'] ="ok";
                echo json_encode($data);


      }



      function api_post_content($iduser,$contentPosting,$varEncode){

                    $image = base64_decode($varEncode);
                   // decoding base64 string value
                    $image_name = md5(uniqid(rand(), true));// image name generating with random number with 32 characters
                    $filename = $image_name .'_'.date('d-m-y'). '.' . 'png';
                   //rename file name with random number
                    $path = './assets/images/uploads/';
                   //image uploading folder path
                    file_put_contents($path . $filename, $image);



            $data = array(
              "post_id"=>"",
              "posting"=>$contentPosting,
              "id_user"=>trim($iduser),
              "urlgambar"=>base_url()."assets/images/uploads/".$filename
            );

            $this->Authentication_model->post_model($data);


      }

      // ============================= API detail Komentar =================================
      function api_detail_komentar($iduser,$postid){

        $komentar = $this->input->post("komentar");
        $data = array(

          "user_id" => $iduser,
          "komentar" => $komentar,
          "waktu" => "" ,
          "post_id" => $postid

          );

        $this->User_model->insert_detail_komentar($data);


        $data['message']= "Berhasil";
        $data['status']= "ok"; 



        echo json_encode($data);


    }


    // ==================== API GET UPDATE =========================================
    function api_get_update($iduser){

      $this->User_model->update_user($iduser);

    }

      public function testglob(){

          echo $filename;
      }


// Penutup
}

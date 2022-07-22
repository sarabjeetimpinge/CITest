<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class exchange extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('uid'))
        redirect('login');
    }

    public function index(){
        $amount=$this->input->post('amount');
        $from=$this->input->post('from');
        $to=$this->input->post('to');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=".$to."&from=".$from."&amount=$amount",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: rkV9ON3Cb4zbLfWa2haGFTjbe5qXwcc4"
            ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $this->load->view('api_response',['response'=>$response]);
    }
}
?>
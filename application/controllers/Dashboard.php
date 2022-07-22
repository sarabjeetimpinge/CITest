<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dashboard extends CI_Controller {
    //Validating login
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('uid'))
        redirect('login');
    }
    public function index(){
        $userfname=$this->session->userdata('fname');	

        /**3.1) getting Active & Verified User Count */
        $query=$this->db->where('is_verified', 1);
        $query=$this->db->where('status', 1);
        $query=$this->db->get('tblusers');
        $result=$query->result();
        $activeVerifiedUserCount=$query->num_rows();

        /**3.2) Getting count of active and verified users that have active products */
        $query= $this->db->select('t1.id');
        $query= $this->db->from('tblusers t1');
        $query= $this->db->join('tbluser_products t2', 't2.user_id = t1.id', 'left');
        $query= $this->db->join('tblproducts t3', 't2.product_id = t3.id', 'left');
        $query= $this->db->where('t1.status', 1);
        $query= $this->db->where('t1.is_verified', 1);
        $query= $this->db->where('t3.status', 1);
        $query= $this->db->where('t2.user_id !=', null);
        $query= $this->db->group_by('t2.user_id');
        $result=$query->get();
        $activeVerifiedUserHaveActiveProducts=$result->num_rows();

        /**3.3) getting Active Product Count */
        $query=$this->db->where('status', 1);
        $query=$this->db->get('tblproducts');
        $result=$query->result();
        $activeProductCount=$query->num_rows();

        /**3.4) Getting active products not belongs to any user */
        $query= $this->db->select('t1.id');
        $query= $this->db->from('tblproducts t1');
        $query= $this->db->join('tbluser_products t2', 't2.product_id = t1.id', 'left');
        $query= $this->db->where('t1.status', 1);
        $query= $this->db->where('t2.product_id =', null);
        $result=$query->get();
        $activeUnattachedProducts=$result->num_rows();

        /**3.5) Amount(count) of all active attached products (from User Product list) */
        $query= $this->db->select('SUM(t2.quantity)  amount' );
        $query= $this->db->from('tblproducts t1');
        $query= $this->db->join('tbluser_products t2', 't2.product_id = t1.id', 'inner');
        $query= $this->db->where('t1.status', 1);
        $result=$query->get();
        $result=$result->row();
        $activeAttachedProductsAmount=$result->amount;

        /**3.6) Price of all active attached products (from User Product list) */
        $query= $this->db->select('SUM(t2.price*t2.quantity)  price' );
        $query= $this->db->from('tblproducts t1');
        $query= $this->db->join('tbluser_products t2', 't2.product_id = t1.id', 'inner');
        $query= $this->db->where('t1.status', 1);
        $result=$query->get();
        $result=$result->row();
        $activeAttachedProductsPrice=$result->price;
        
        $this->load->view('dashboard',['firstname'=>$userfname,'activeVerifiedUserCount'=> $activeVerifiedUserCount,'activeProductCount' =>$activeProductCount,
        'activeUnattachedProducts'=>$activeUnattachedProducts,'activeVerifiedUserHaveActiveProducts'=>$activeVerifiedUserHaveActiveProducts,
        'activeAttachedProductsAmount'=>$activeAttachedProductsAmount,'activeAttachedProductsPrice'=>$activeAttachedProductsPrice]);
    }

}
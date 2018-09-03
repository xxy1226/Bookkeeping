<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Records
 *
 * @author AndrewXia
 */
class Purchases extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Purchase_m');
  }

  public function test() {
    $this->load->view('test');
  }

  //***未开始
  public function index() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/purchases');
    }

    echo "尚未完成 ";
    print_r($this->Purchase_m->get_purchases());
  }

  public function new_purchase($new_purchase = FALSE, $edit = FALSE) {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/purchases-new_purchase');
    }

    $this->load->model('User_m');
    $this->load->model('Store_m');
    $this->load->model('Card_m');

    $data['users']  = $this->User_m->get_users();
    $data['stores'] = $this->Store_m->get_stores();
    $data['cards']  = $this->Card_m->get_cards();

    $data['title_icon'] = 'bill.png';
    $data['title']      = '新增消费';

    $data['filled']  = $new_purchase ? TRUE : FALSE;
    $data['edit']    = $edit;
    $data['content'] = $new_purchase ? $new_purchase : NULL;

    $this->load->view('comps/header', $data);
    $this->load->view('purchases/create');
    $this->load->view('comps/footer');
  }

  public function create_purchase() {
    $data = $this->input->post();
    

    $this->new_purchase($data);
  }

}

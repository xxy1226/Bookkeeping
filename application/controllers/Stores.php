<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stores
 *
 * @author AndrewXia
 */
class Stores extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Store_m');
  }

  public function index() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/stores');
    }

    $data['title_icon'] = 'bank.png';
    $data['title'] = '管理—商店/公司';

    $data['stores'] = $this->Store_m->get_stores();

    $this->load->view('comps/header', $data);
    $this->load->view('stores/index');
    $this->load->view('comps/footer');
  }

  public function view($store_id = FALSE) {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/stores-view-' . $store_id);
    }

    if ($store_id === FALSE) {
      $this->session->set_flashdata('warning_message', '未指定商店/公司');
      redirect('stores/');
    }

    $data['store'] = $this->Store_m->get_stores($store_id);
    $data['title'] = $data['store']['StoreName'];

    $this->load->view('comps/header', $data);
    $this->load->view('stores/view');
    $this->load->view('comps/footer');
  }

  public function edit($store_id = FALSE) {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/stores-edit-' . $store_id);
    }

    if ($store_id === FALSE) {
      $this->session->set_flashdata('warning_message', '未指定商店/公司');
      redirect('stores/');
    }

    $data['store'] = $this->Store_m->get_stores($store_id);
    $data['title'] = "修改商店/公司 - " . $data['store']['StoreName'];

    $this->load->view('comps/header', $data);
    $this->load->view('stores/edit');
    $this->load->view('comps/footer');
  }

  public function update() {
    $this->Store_m->update_store();
    
    $this->session->set_flashdata('success_message', "修改成功");
    redirect('stores/view/' . $this->input->post('store_id'));
  }
  
  public function ajax_insert() {
    $data['StoreName'] = $this->input->post('store_name');
    $data['StoreType'] = $this->input->post('store_type');
    $data['StoreDes']  = $this->input->post('store_des');
    echo $this->Store_m->insert_store($data);
  }

}

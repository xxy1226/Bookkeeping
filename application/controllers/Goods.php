<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Goods
 *
 * @author AndrewXia
 */
class Goods extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Good_m');
  }

  // 用于查看所有商品和服务
  public function index() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/goods');
    }

    $data['title_icon'] = 'good.png';
    $data['title'] = '管理—商品和服务';

    $data['goods'] = $this->Good_m->get_goods();

    $this->load->view('comps/header', $data);
    $this->load->view('goods/index');
    $this->load->view('comps/footer');
  }
  
  public function view($good_id = FALSE) {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
        redirect('users/login/goods-view-' . $good_id);
    }

    // 没有指定商品/服务
    if ($good_id === FALSE) {
      $this->session->set_flashdata('alert_message', '未指定商品/服务');
      redirect('cards/');
    }
    
    

    // 读取卡
    $data['good'] = $this->Good_m->get_good($good_id);

    $data['title_icon'] = 'good.png';
    $data['title'] = $data['good']['GoodName'];

    $this->load->view('comps/header', $data);
    $this->load->view('goods/view');
    $this->load->view('comps/footer');    
  }
}

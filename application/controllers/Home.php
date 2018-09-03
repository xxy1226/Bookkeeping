<?php

/**
 * Home page controller
 *
 * @author AndrewXia
 */
class Home extends CI_Controller {

  public function index() {
    $data['title'] = '记账本APP';

    $this->load->view('comps/header', $data);
    $this->load->view('home/index');
    $this->load->view('comps/footer');
  }

  public function testall() {
    $this->load->view('home/testall');
  }
}

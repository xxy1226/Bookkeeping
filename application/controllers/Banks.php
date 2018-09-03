<?php

/**
 * Description of Banks
 *
 * @author AndrewXia
 */
class Banks extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Bank_m');
  }

  /*
   * 简单查看所有银行
   */

  public function index() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/banks');
    }

    $data['title_icon'] = 'bank.png';
    $data['title'] = '管理—银行';

    $data['banks'] = $this->Bank_m->get_banks();

    $this->load->view('comps/header', $data);
    $this->load->view('banks/index');
    $this->load->view('comps/footer');
  }

  /*
   * 修改银行信息（未完成***）
   */

  public function edit($bank_id = FALSE) {
    $amount_banks = $this->Bank_m->amount_banks();
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/banks-edit-' . $bank_id);
    }

    // 没有指定银行
    if ($bank_id === FALSE) {
      $this->session->set_flashdata('alert_message', '未指定银行');
      redirect('banks');
    }

    // 未指定到银行
    if ($bank_id === '1' || $bank_id > $amount_banks) {
      $this->session->set_flashdata('alert_message', '银行未找到');
      redirect('banks');
    }

    // 读取银行
    $data['bank'] = $this->Bank_m->get_banks($bank_id);

    $data['title_icon'] = 'bank.png';
    $data['title'] = '修改银行：' . $data['bank']['BankName'];

    $this->load->view('comps/header', $data);
    $this->load->view('banks/edit');
    $this->load->view('comps/footer');
  }

  /*
   * 查看银行详细信息
   */

  public function view($bank_id = FALSE) {

    $amount_banks = $this->Bank_m->amount_banks();

    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/banks-view-' . $bank_id);
    }

    // 未指定银行
    if ($bank_id === FALSE) {
      $this->session->set_flashdata('warning_message', '未指定银行');
      redirect('banks');
    }

    // 未指定到银行
    if ($bank_id === '1' || $bank_id > $amount_banks) {
      $this->session->set_flashdata('alert_message', '银行没找到');
      redirect('banks');
    }

    // 读取指定银行
    $data['bank'] = $this->Bank_m->get_banks($bank_id);

    $data['title_icon'] = 'bank.png';
    $data['title'] = $data['bank']['BankName'];

    $this->load->view('comps/header', $data);
    $this->load->view('banks/view');
    $this->load->view('comps/footer');
  }

  /*
   * 更新银行信息
   */

  public function update() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login');
    }

    $this->Bank_m->update_bank();

    $this->session->set_flashdata('success_message', '银行更新成功。');

    redirect(banks);
  }

}

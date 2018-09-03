<?php

/**
 * Description of Cards
 *
 * @author AndrewXia
 */
class Cards extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Card_m');
  }

  // 用于查看自己的卡或所有人的卡
  public function index() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/cards');
    }

    $data['title_icon'] = 'card.png';
    $data['title'] = '管理—我的银行卡';
    $data['page'] = 'cards';

    $data['cards'] = $this->Card_m->get_cards(FALSE, $this->session->userdata('user_id'));

    $this->load->view('comps/header', $data);
    $this->load->view('cards/index');
    $this->load->view('comps/footer');
  }

  // 用于查看所属银行的所有银行卡
  public function all_cards() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/cards-all_cards');
    }

    $data['title_icon'] = 'card.png';
    $data['title'] = '管理—所有银行卡';
    $data['page'] = 'all_cards';

    $data['cards'] = $this->Card_m->get_cards();

    $this->load->view('comps/header', $data);
    $this->load->view('cards/index');
    $this->load->view('comps/footer');
  }

  // 用于查看所属银行的所有银行卡
  public function bank_cards($bank_id = FALSE) {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login');
    }

    // 去掉‘现金银行’
    if ($bank_id === '1' || $bank_id === FALSE) {
      redirect('banks');
    }

    $this->load->model('Bank_m');
    $bank = $this->Bank_m->get_banks($bank_id);

    $data['title_icon'] = 'card.png';
    $data['title'] = '管理—银行卡(' . $bank['BankName'] . ')';
    $data['page'] = 'all_cards';

    $data['cards'] = $this->Card_m->get_cards($bank_id);

    $this->load->view('comps/header', $data);
    $this->load->view('cards/index');
    $this->load->view('comps/footer');
  }
  
  public function user_cards($user_id = FALSE) {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/cards-user_cards-' . $user_id);
    }

    // 未指定用户
    if ($user_id === FALSE) {
      $this->session->set_flashdata('warning_message', '未指定用户');
      redirect('users');
    }

    // 未指定用户
    if ($user_id < 3 || $user_id === FALSE) {
      $this->session->set_flashdata('warning_message', '用户不存在');
      redirect('users');
    }

    $this->load->model('User_m');
    $user = $this->User_m->get_users($user_id);

    $data['title_icon'] = 'card.png';
    $data['title'] = '管理—银行卡(' . $user['ShowName'] . ')';
    $data['page'] = 'all_cards';
    $data['user_id'] = $user_id;

    $data['cards'] = $this->Card_m->get_cards(NULL, $user_id);

    $this->load->view('comps/header', $data);
    $this->load->view('cards/index');
    $this->load->view('comps/footer');
  }

  public function view($card_id = FALSE) {
    $amount_cards = $this->Card_m->amount_cards();
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      if (!$card_id) {
        redirect('users/login/cards');
      } else {
        redirect('users/login/cards-view-' . $card_id);
      }
    }

    // 没有指定卡
    if ($card_id === FALSE) {
      $this->session->set_flashdata('alert_message', '未指定卡');
      redirect('cards/');
    }

    // 未指定到卡
    if ($card_id === '1' || $card_id > $amount_cards) {
      $this->session->set_flashdata('alert_message', '未指定卡');
      redirect('cards/');
    }

    // 读取卡
    $data['card'] = $this->Card_m->get_card($card_id);

    $data['title_icon'] = 'card.png';
    $data['title'] =  $data['card']['CardNum'];

    $this->load->view('comps/header', $data);
    $this->load->view('cards/view');
    $this->load->view('comps/footer');
  }
}

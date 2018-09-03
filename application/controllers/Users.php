<?php

/**
 * 用于用户的CONTROLLER
 *
 * @author AndrewXia
 * 
 * -----------------------------------------------------------------------------
 *               目录：
 *   用户登录  ------------------  login($uri = '')               ??
 * 用户退出  ==============  logout()                         ??
 *   用户列表  ------------------  index()                        
 * 用户详情  ==============  view($user_id = FALSE)           
 *   “更改用户”页面  ----------  edit($user_id = FALSE)
 * 更新用户  ==============  update()         
 *   “更改密码”页面  ----------  pass($user_id = FALSE)
 * 更改密码  ==============  update_pass()
 *  哈希  ----------------------  hash($string)
 */
class Users extends CI_Controller {

  // 用户登录
  public function login($uri = '') {
    // 查看是否登录
    if ($this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '已登录');
      redirect();
    }

    $data['title'] = '登录';
    $data['title_icon'] = 'user.png';
    $data['username'] = FALSE;

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('comps/header', $data);
      $this->load->view('users/login');
      $this->load->view('comps/footer');
    } else {
      // Get username
      $username = $this->input->post('username');
      // Get and encrypt the password
      $password = $this->hash($this->input->post('password'));

      //Login user
      $user_id = $this->User_m->login($username, $password);

      if ($user_id) {
        // Create session
        $show_name = $this->User_m->show_name($user_id);
        $user_data = array(
            'user_id' => $user_id,
            'showname' => $show_name,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($user_data);

        // Set message
        $this->session->set_flashdata('success_message', '登录成功');

        redirect(str_replace('-', '/', $uri));
      } else {
        // Set message
        $this->session->set_flashdata('login_failed', '用户名或密码错误，忘记用户名或密码<a href="mailto:andrew.xia.mb@gmail.com?Subject=忘记《记账本》用户名和密码">给管理员发邮件</a>');

        $data['title_icon'] = 'user.png';
        $data['username'] = $username;
        $this->load->view('comps/header', $data);
        $this->load->view('users/login');
        $this->load->view('comps/footer');
      }
    }
  }

  // 用户退出
  public function logout() {
    // Unset user data
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('showname');
    $this->session->unset_userdata('logged_in');

    $this->session->set_flashdata('alert_message', '退出成功');

    redirect();
  }

  // 用户列表
  public function index() {
    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/users');
    }

    $data['users'] = $this->User_m->get_users();
    $data['title'] = '管理-用户';
    $data['title_icon'] = 'user.png';

    $this->load->view('comps/header', $data);
    $this->load->view('users/index');
    $this->load->view('comps/footer');
  }

  // 用户详情
  public function view($user_id = FALSE) {

    $amount_users = $this->User_m->amount_users();

    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/users-view-' . $user_id);
    }

    if ($user_id === FALSE) {
      $this->session->set_flashdata('warning_message', '未指定用户');
      redirect('users');
    }

    if ($user_id < 3 || $user_id > $amount_users) {
      $this->session->set_flashdata('warning_message', '用户不存在');
      redirect('users');
    }

    $data['user'] = $this->User_m->get_users($user_id);

    $data['title_icon'] = 'user.png';
    $data['title'] = '管理-用户';

    $this->load->view('comps/header', $data);
    $this->load->view('users/view');
    $this->load->view('comps/footer');
  }

  // “更改用户”页面
  public function edit($user_id = FALSE) {

    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/users-edit-' . $user_id);
    }

    // 未指定用户
    if ($user_id === FALSE) {
      $this->session->set_flashdata('warning_message', '未指定用户');
      redirect('users');
    }

    // 指定了不存在的用户
    $max = $this->User_m->amount_users();
    if ($user_id < 3 || $user_id > $max) {
      $this->session->set_flashdata('warning_message', '用户不存在');
      redirect('users');
    }

    // 修改其他用户
    if ($user_id != $this->session->userdata('user_id')) {
      $this->session->set_flashdata('warning_message', '修改其他用户功能未开放');
      redirect('users');
    }

    $data['user'] = $this->User_m->get_users($user_id);

    $data['title_icon'] = 'user.png';
    $data['title'] = '管理-修改用户';

    $this->load->view('comps/header', $data);
    $this->load->view('users/edit');
    $this->load->view('comps/footer');
  }

  // 更新用户
  public function update() {
    $user_id = $this->input->post('user_id');
    $this->User_m->update_user();
    $this->session->set_flashdata('success_message', '修改成功');
    redirect('Users/view/' . $user_id);
  }

  // “更改密码”页面
  public function pass($user_id = FALSE) {

    // 查看是否登录
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('warning_message', '请先登录');
      redirect('users/login/users-pass-' . $user_id);
    }

    // 未指定用户
    if ($user_id === FALSE) {
      $this->session->set_flashdata('warning_message', '未指定用户');
      redirect('Users');
    }

    // 指定了不存在的用户
    $max = $this->User_m->amount_users();
    if ($user_id < 3 || $user_id > $max) {
      $this->session->set_flashdata('warning_message', '用户不存在');
      redirect('users');
    }

    // 修改其他用户
    if ($user_id != $this->session->userdata('user_id')) {
      $this->session->set_flashdata('warning_message', '修改其他用户功能未开放');
      redirect('users');
    }

    $data['user'] = $this->User_m->get_users($user_id);

    $data['title_icon'] = 'user.png';
    $data['title'] = '管理-修改用户名、密码';

    $this->load->view('comps/header', $data);
    $this->load->view('users/pass');
    $this->load->view('comps/footer');
  }

  //  更改密码
  public function update_pass() {
    $user_id = $this->input->post('user_id');

//    $this->form_validation->set_rules('password2', 'Comfirm Password', 'matches[password]');
    $this->form_validation->set_rules('password2', 'Comfirm Password', 'matches[password]|min_length[8]', array('matches' => '密码不匹配', 'min_length' => '长度至少8位'));

    if ($this->form_validation->run() === FALSE) {
      $data['user'] = $this->User_m->get_users($user_id);
      $data['title_icon'] = 'user.png';
      $data['title'] = '管理-修改用户名、密码';

      $this->load->view('comps/header', $data);
      $this->load->view('users/pass');
      $this->load->view('comps/footer');
    }
    // 提交修改
    else {
      $user_name = $this->input->post('user_name');
      $password = $this->hash($this->input->post('password'));

      $this->User_m->update_pass($user_id, $user_name, $password);
      $this->session->set_flashdata('success_message', '密码修改成功');
      redirect('Users/view/' . $user_id);
    }
  }

  // 哈希
  public function hash($string) {
    return hash('sha512', $string . config_item('encryption_key'));
  }

}

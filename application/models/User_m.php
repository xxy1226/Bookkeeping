<?php

/**
 * 用于用户的MODEL
 *
 * @author AndrewXia
 * 
 * -----------------------------------------------------------------------------
 *               目录：
 *   用户登录  ------------------  login($username, $password)    24
 * 取得用户姓名(昵称)  =====  show_name($user_id)              39
 *   搜索用户  ------------------  get_users($user_id = FALSE)    49
 * 查看用户数量  ===========  amount_users()                   59
 *   更新用户  ------------------  update_user()                  64
 */

/**
 * Description of User_m
 *
 * @author AndrewXia
 */
class User_m extends CI_Model {

// 用户登录
  public function login($username, $password) {
// Validate
    $this->db->where('UserName', $username);
    $this->db->where('Password', $password);

    $result = $this->db->get('users');

    if ($result->num_rows() == 1) {
      return $result->row(0)->UserID;
    } else {
      return FALSE;
    }
  }

// 取得用户姓名(昵称)
  public function show_name($user_id) {
// Validate
    $this->db->where('UserID', $user_id);

    $result = $this->db->get('users');

    return $result->row(0)->ShowName;
  }

  // 搜索用户
  public function get_users($user_id = FALSE) {
    if ($user_id === FALSE) {
      $this->db->order_by('UserID');
      return $this->db->get('users')->result_array();
    }

    return $this->db->get_where('users', array('UserID' => $user_id))->row_array();
  }

  // 查看用户数量
  public function amount_users() {
    return $this->db->get('users')->num_rows();
  }
  
  // 更新用户
  public function update_user() {
    // 处理空值
    $phone        = $this->input->post('phone')       == ''? NULL : $this->input->post('phone');
    $work_tel     = $this->input->post('work_tel')    == ''? NULL : $this->input->post('work_tel');
    $work_add     = $this->input->post('work_add')    == ''? NULL : $this->input->post('work_add');
    $qq           = $this->input->post('qq')          == ''? NULL : $this->input->post('qq');
    $we_chat      = $this->input->post('we_chat')     == ''? NULL : $this->input->post('we_chat');
    $sin          = $this->input->post('sin')         == ''? NULL : $this->input->post('sin');
    $email1       = $this->input->post('email1')      == ''? NULL : $this->input->post('email1');
    $health_card  = $this->input->post('health_card') == ''? NULL : $this->input->post('health_card');
    if ($this->input->post('email2') == '') {
      $email2 = NULL;
    } elseif ($email1 == NULL) {
      $email1 = $this->input->post('email2');
      $email2 = NULL;
    } else {
      $email2 = $this->input->post('email2');
    }
    if ($this->input->post('email3') == '') {
      $email3 = NULL;
    } elseif ($email1 == NULL) {
      $email1 = $this->input->post('email3');
      $email3 = NULL;
    } elseif ($email2 == NULL) {
      $email2 = $this->input->post('email3');
      $email3 = NULL;
    } else {
      $email3 = $this->input->post('email3');
    }
    
    $data = array(
        'qq'          => $qq,
        'Phone'       => $phone,
        'HomeAdd'     => $this->input->post('home_add'),
        'Email1'      => $email1,
        'Email2'      => $email2,
        'Email3'      => $email3,
        'ShowName'    => $this->input->post('show_name'),
        'WeChat'      => $we_chat,
        'WorkTel'     => $work_tel,
        'WorkAdd'     => $work_add,
        'SIN'         => $sin,
        'HealthCard'  => $health_card,
        'Description' => $this->input->post('description')
            );
    
    $this->db->where('UserID', $this->input->post('user_id'));
    $this->db->update('users', $data);
  }
  
  // 修改密码
  public function update_pass($user_id, $user_name, $password) {
    $data = array('UserName' => $user_name,
                  'Password' => $password);
    
    $this->db->where('UserID', $user_id);
    $this->db->update('users', $data);
  }
}

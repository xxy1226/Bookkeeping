<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bank_m
 *
 * @author AndrewXia
 */
class Bank_m extends CI_Model {

  public function get_banks($BankID = FALSE) {
    if ($BankID === FALSE) {
      $this->db->order_by('BankID');
      $query = $this->db->get('banks');
      return $query->result_array();
    }

    $query = $this->db->get_where('banks', array('BankID' => $BankID));
    return $query->row_array();
  }

  /*
   * 未完成***
   */
  public function update_bank() {
    $data = array(
        'BankName' => $this->input->post('bank_name')
    );
    $this->db->where('BankID', $this->input->post('bank_id'));
    return $this->db->update('banks', $data);
  }

  public function amount_banks() {
    return $this->db->get('banks')->num_rows();
  }
}

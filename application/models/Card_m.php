<?php

class Card_m extends CI_Model {
  /*
   * 用于查询银行卡
   */

  public function get_cards($BankID = FALSE, $UserID = FALSE) {
    // 显示所有卡
    if (!$BankID && !$UserID) {
      
    } else {
      // 选择所属银行
      if ($BankID) {
        $this->db->where('cards.BankID', $BankID);
      }
      // 选择持卡人
      if ($UserID) {
        $this->db->where('cards.UserID', $UserID);
      }
    }

    $this->db->order_by('cards.UserID, Order');
    $this->db->join('banks', 'banks.BankID = cards.BankID');
    $this->db->join('card_types', 'card_types.CardTypeID = cards.CardTypeID');
    $this->db->join('users', 'users.UserID = cards.UserID');
    $query = $this->db->get('cards');
    return $query->result_array();
  }

  public function get_card($CardID = FALSE) {
    $this->db->where('cards.CardID', $CardID);
    $this->db->join('banks', 'banks.BankID = cards.BankID');
    $this->db->join('card_types', 'card_types.CardTypeID = cards.CardTypeID');
    $this->db->join('users', 'users.UserID = cards.UserID');
    $query = $this->db->get('cards');
    return $query->row_array();
  }

  public function amount_cards() {
    return $this->db->get('cards')->num_rows();
  }

}

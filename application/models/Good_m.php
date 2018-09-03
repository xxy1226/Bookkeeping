<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Good_m
 *
 * @author AndrewXia
 */
class Good_m extends CI_Model {

  public function get_goods() {
    $this->db->order_by('GoodName');
    $query = $this->db->get('goods');
    return $query->result_array();
  }

  public function get_good($good_id = FALSE) {
    if ($good_id === FALSE) {
      return False;
    }

    $query = $this->db->get_where('goods', array('GoodID' => $good_id));
    return $query->row_array();
  }

}

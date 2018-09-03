<?php
class Purchase_m extends CI_model {
  
  //查询:主键
  public function get_purchases($id = FALSE) {
    if ($id === FALSE) {
      return $this->db->get('purchases')->result_array();
    }
    return $this->db->get_where('purchases', array('PurchaseID' => $id))->row_array();
  }
  
  //查询:商店（外键）
  public function get_purchases_by_store($id = FALSE) {
    if ($id === FALSE) {
      return null;
    }
    return $this->db->get_where('purchases', array('StoreID' => $id))->result_array();
  }
  
  //查询:消费者（外键）
  public function get_purchases_by_purchaser($id = FALSE) {
    if ($id === FALSE) {
      return null;
    }
    return $this->db->get_where('purchases', array('PurchaserID' => $id))->result_array();
  }
  
  //查询:记录者（外键）
  public function get_purchases_by_recorder($id = FALSE) {
    if ($id === FALSE) {
      return null;
    }
    return $this->db->get_where('purchases', array('RecorderID' => $id))->result_array();
  }
  
  //查询:日期
  public function get_purchases_by_date($date1 = FALSE, $date2 = FALSE) {
    if ($date1 === FALSE && $date2 === FALSE) {
      return null;
    } //没有参数
    elseif ($date1 === FALSE) {
      $this->db->where(array('Date < ' => $date2));
    } //日期之前查询
    elseif ($date2 === FALSE) {
      $this->db->where(array('Date > ' => $date1));
    } //日期之后查询
    else {
      $this->db->where(array('Date > ' => $date1, 'Date < ' => $date2));
      $this->db->or_where(array('Date > ' => $date2, 'Date < ' => $date1));
    } //日期范围查询
    return $this->db->get('purchases')->result_array();
  }
  
  //查询:总价
  public function get_purchases_by_total($total1 = FALSE, $total2 = FALSE) {
    if ($total1 === FALSE && $total2 === FALSE) {
      return null;
    } //没有参数
    elseif ($total1 === FALSE) {
      $this->db->where(array('Total < ' => $total2));
    } //日期之前查询
    elseif ($total2 === FALSE) {
      $this->db->where(array('Total > ' => $total1));
    } //日期之后查询
    else {
      $this->db->where(array('Total > ' => $total1, 'Total < ' => $total2));
      $this->db->or_where(array('Total > ' => $total2, 'Total < ' => $total1));
    } //日期范围查询
    return $this->db->get('purchases')->result_array();
  }
  
  //插入新消费
  public function insert_purchase($data = FALSE) {
    if ($data === FALSE) {
      return null;
    }
    else {
      $this->db->insert('purchases', $data);
      return $this->db->insert_id();
    }
  }
}


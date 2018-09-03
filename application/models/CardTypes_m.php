<?php

class CardTypes_m extends CI_Model {
  public function get_card_types($card_types_id = FALSE) {
    if (!$card_types_id) {
      return $this->db->get('card_types')->result_array();
    }
    return $this->db->get_where('card_types', array('CardTypeID' => $card_types_id))->row_array();
  }
}

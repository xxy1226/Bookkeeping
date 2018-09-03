<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Store_m
 *
 * @author AndrewXia
 */
class Store_m extends CI_Model {

  public function get_stores($StoreID = FALSE) {
    if ($StoreID === FALSE) {
      $query = $this->db->get('stores');
      return $query->result_array();
    }

    $query = $this->db->get_where('stores', array('StoreID' => $StoreID));
    return $query->row_array();
  }

  public function update_store() {


    if (!$this->input->post('web') == '') {
      $web = $this->input->post('web');
    } else {
      $web = NULL;
    }
    if (!$this->input->post('flyer') == '') {
      $flyer = $this->input->post('flyer');
    } else {
      $flyer = NULL;
    }
    if (!$this->input->post('store_add') == '') {
      $store_add = $this->input->post('store_add');
    } else {
      $flyer = NULL;
    }
    if (!$this->input->post('store_bus') == '') {
      $store_bus = $this->input->post('store_bus');
    } else {
      $store_bus = NULL;
    }
    if (!$this->input->post('store_phone') == '') {
      $store_phone = $this->input->post('store_phone');
    } else {
      $store_phone = NULL;
    }
    if (!$this->input->post('store_mon') == '') {
      $store_mon = $this->input->post('store_mon');
    } else {
      $store_mon = NULL;
    }
    if (!$this->input->post('store_tue') == '') {
      $store_tue = $this->input->post('store_tue');
    } else {
      $store_tue = NULL;
    }
    if (!$this->input->post('store_wed') == '') {
      $store_wed = $this->input->post('store_wed');
    } else {
      $store_wed = NULL;
    }
    if (!$this->input->post('store_thu') == '') {
      $store_thu = $this->input->post('store_thu');
    } else {
      $store_thu = NULL;
    }
    if (!$this->input->post('store_fri') == '') {
      $store_fri = $this->input->post('store_fri');
    } else {
      $store_fri = NULL;
    }
    if (!$this->input->post('store_sat') == '') {
      $store_sat = $this->input->post('store_sat');
    } else {
      $store_sat = NULL;
    }
    if (!$this->input->post('store_sun') == '') {
      $store_sun = $this->input->post('store_sun');
    } else {
      $store_sun = NULL;
    }
    if (!$this->input->post('pharmacy_mon') == '') {
      $pharmacy_mon = $this->input->post('pharmacy_mon');
    } else {
      $pharmacy_mon = NULL;
    }
    if (!$this->input->post('pharmacy_tue') == '') {
      $pharmacy_tue = $this->input->post('pharmacy_tue');
    } else {
      $pharmacy_tue = NULL;
    }
    if (!$this->input->post('pharmacy_wed') == '') {
      $pharmacy_wed = $this->input->post('pharmacy_wed');
    } else {
      $pharmacy_wed = NULL;
    }
    if (!$this->input->post('pharmacy_thu') == '') {
      $pharmacy_thu = $this->input->post('pharmacy_thu');
    } else {
      $pharmacy_thu = NULL;
    }
    if (!$this->input->post('pharmacy_fri') == '') {
      $pharmacy_fri = $this->input->post('pharmacy_fri');
    } else {
      $pharmacy_fri = NULL;
    }
    if (!$this->input->post('pharmacy_sat') == '') {
      $pharmacy_sat = $this->input->post('pharmacy_sat');
    } else {
      $pharmacy_sat = NULL;
    }
    if (!$this->input->post('pharmacy_sun') == '') {
      $pharmacy_sun = $this->input->post('pharmacy_sun');
    } else {
      $pharmacy_sun = NULL;
    }
    if (!$this->input->post('optical_mon') == '') {
      $optical_mon = $this->input->post('optical_mon');
    } else {
      $optical_mon = NULL;
    }
    if (!$this->input->post('optical_tue') == '') {
      $optical_tue = $this->input->post('optical_tue');
    } else {
      $optical_tue = NULL;
    }
    if (!$this->input->post('optical_wed') == '') {
      $optical_wed = $this->input->post('optical_wed');
    } else {
      $optical_wed = NULL;
    }
    if (!$this->input->post('optical_thu') == '') {
      $optical_thu = $this->input->post('optical_thu');
    } else {
      $optical_thu = NULL;
    }
    if (!$this->input->post('optical_fri') == '') {
      $optical_fri = $this->input->post('optical_fri');
    } else {
      $optical_fri = NULL;
    }
    if (!$this->input->post('optical_sat') == '') {
      $optical_sat = $this->input->post('optical_sat');
    } else {
      $optical_sat = NULL;
    }
    if (!$this->input->post('optical_sun') == '') {
      $optical_sun = $this->input->post('optical_sun');
    } else {
      $optical_sun = NULL;
    }
    if (!$this->input->post('clinic_mon') == '') {
      $clinic_mon = $this->input->post('clinic_mon');
    } else {
      $clinic_mon = NULL;
    }
    if (!$this->input->post('clinic_tue') == '') {
      $clinic_tue = $this->input->post('clinic_tue');
    } else {
      $clinic_tue = NULL;
    }
    if (!$this->input->post('clinic_wed') == '') {
      $clinic_wed = $this->input->post('clinic_wed');
    } else {
      $clinic_wed = NULL;
    }
    if (!$this->input->post('clinic_thu') == '') {
      $clinic_thu = $this->input->post('clinic_thu');
    } else {
      $clinic_thu = NULL;
    }
    if (!$this->input->post('clinic_fri') == '') {
      $clinic_fri = $this->input->post('clinic_fri');
    } else {
      $clinic_fri = NULL;
    }
    if (!$this->input->post('clinic_sat') == '') {
      $clinic_sat = $this->input->post('clinic_sat');
    } else {
      $clinic_sat = NULL;
    }
    if (!$this->input->post('clinic_sun') == '') {
      $clinic_sun = $this->input->post('clinic_sun');
    } else {
      $clinic_sun = NULL;
    }
    if (!$this->input->post('store_holiday') == '') {
      $store_holiday = $this->input->post('store_holiday');
    } else {
      $store_holiday = NULL;
    }
    if (!$this->input->post('store_collect') == '') {
      $store_collect = $this->input->post('store_collect');
    } else {
      $store_collect = NULL;
    }
    if (!$this->input->post('store_type') == '') {
      $store_type = $this->input->post('store_type');
    } else {
      $store_type = NULL;
    }
    if (!$this->input->post('icon') == '') {
      $icon = $this->input->post('icon');
    } else {
      $icon = NULL;
    }
    if (!$this->input->post('store_des') == '') {
      $store_des = $this->input->post('store_des');
    } else {
      $store_des = NULL;
    }

    $data = array(
        "StoreName" => $this->input->post('store_name'),
        "Web" => $web,
        "Flyer" => $flyer,
        "StoreAdd" => $store_add,
        "StoreBus" => $store_bus,
        "StorePhone" => $store_phone,
        "StoreMon" => $store_mon,
        "StoreTue" => $store_tue,
        "StoreWed" => $store_wed,
        "StoreThu" => $store_thu,
        "StoreFri" => $store_fri,
        "StoreSat" => $store_sat,
        "StoreSun" => $store_sun,
        "PharmacyMon" => $pharmacy_mon,
        "PharmacyTue" => $pharmacy_tue,
        "PharmacyWed" => $pharmacy_wed,
        "PharmacyThu" => $pharmacy_thu,
        "PharmacyFri" => $pharmacy_fri,
        "PharmacySat" => $pharmacy_sat,
        "PharmacySun" => $pharmacy_sun,
        "OpticalMon" => $optical_mon,
        "OpticalTue" => $optical_tue,
        "OpticalWed" => $optical_wed,
        "OpticalThu" => $optical_thu,
        "OpticalFri" => $optical_fri,
        "OpticalSat" => $optical_sat,
        "OpticalSun" => $optical_sun,
        "ClinicMon" => $clinic_mon,
        "ClinicTue" => $clinic_tue,
        "ClinicWed" => $clinic_wed,
        "ClinicThu" => $clinic_thu,
        "ClinicFri" => $clinic_fri,
        "ClinicSat" => $clinic_sat,
        "ClinicSun" => $clinic_sun,
        "StoreHoliday" => $store_holiday,
        "StoreCollect" => $store_collect,
        "StoreType" => $store_type,
        "Icon" => $icon,
        "StoreDes" => $store_des
    );
    $this->db->where('StoreID', $this->input->post('store_id'));
    $this->db->update('stores', $data);
  }

  public function insert_store($data = FALSE) {
    if ($data) {
      
    }
//    else {
//      
//    }

    $this->db->insert('stores', $data);
    return $this->db->insert_id();
  }

}

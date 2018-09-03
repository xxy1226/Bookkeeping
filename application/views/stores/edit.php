<?php echo form_open('stores/update', array('class' => 'form-horizontal')); ?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <input class="hidden" type="hidden" name="store_id" value="<?php echo $store['StoreID']; ?>">
    <div class="form-group text-center">
      <label for="store_name">名称: </label>
      <input type="text" class="form-control" name="store_name" value="<?php echo $store['StoreName']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="store_type">类型: </label>
      <select class="form-control" name="store_type">
        <?php if ($store['StoreType'] == '0'): ?>
          <option value="0" selected>不用</option>
        <?php else: ?>
          <option value="0">*不用</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '1'): ?>
          <option value="1" selected>超市</option>
        <?php else: ?>
          <option value="1">超市</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '2'): ?>
          <option value="2" selected>商店</option>
        <?php else: ?>
          <option value="2">商店</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '3'): ?>
          <option value="3" selected>餐饮</option>
        <?php else: ?>
          <option value="3">餐饮</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '4'): ?>
          <option value="4" selected>住宿</option>
        <?php else: ?>
          <option value="4">住宿</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '5'): ?>
          <option value="5" selected>旅游</option>
        <?php else: ?>
          <option value="5">旅游</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '6'): ?>
          <option value="6" selected>房屋</option>
        <?php else: ?>
          <option value="6">房屋</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '7'): ?>
          <option value="7" selected>车辆</option>
        <?php else: ?>
          <option value="7">车辆</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '8'): ?>
          <option value="8" selected>政府</option>
        <?php else: ?>
          <option value="8">政府</option>
        <?php endif; ?>
        <?php if ($store['StoreType'] == '9'): ?>
          <option value="9" selected>保险</option>
        <?php else: ?>
          <option value="9">保险</option>
        <?php endif; ?>
      </select>
    </div>
    <div class="form-group text-center">
      <label for="web">网址: </label>
      <input type="text" class="form-control" name="web" value="<?php echo $store['Web']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="flyer">传单: </label>
      <input type="text" class="form-control" name="flyer" value="<?php echo $store['Flyer']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="store_add">地址: </label>
      <input type="text" class="form-control" name="store_add" value="<?php echo $store['StoreAdd']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="store_bus">公交: </label>
      <input type="text" class="form-control" name="store_bus" value="<?php echo $store['StoreBus']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="store_phone">电话: </label>
      <input type="text" class="form-control" name="store_phone" value="<?php echo $store['StorePhone']; ?>">
    </div>
    <div class="text-center">
      <strong>工作时间：</strong>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="store_mon">周一: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="store_mon" value="<?php echo $store['StoreMon']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="store_tue">周二: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="store_tue" value="<?php echo $store['StoreTue']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="store_wed">周三: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="store_wed" value="<?php echo $store['StoreWed']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="store_thu">周四: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="store_thu" value="<?php echo $store['StoreThu']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="store_fri">周五: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="store_fri" value="<?php echo $store['StoreFri']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="store_sat">周六: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="store_sat" value="<?php echo $store['StoreSat']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="store_sun">周日: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="store_sun" value="<?php echo $store['StoreSun']; ?>">
      </div>
    </div>
    <div class="text-center">
      <strong>药店时间：</strong>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pharmacy_mon">周一: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="pharmacy_mon" value="<?php echo $store['PharmacyMon']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pharmacy_tue">周二: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="pharmacy_tue" value="<?php echo $store['PharmacyTue']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pharmacy_wed">周三: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="pharmacy_wed" value="<?php echo $store['PharmacyWed']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pharmacy_thu">周四: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="pharmacy_thu" value="<?php echo $store['PharmacyThu']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pharmacy_fri">周五: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="pharmacy_fri" value="<?php echo $store['PharmacyFri']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pharmacy_sat">周六: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="pharmacy_sat" value="<?php echo $store['PharmacySat']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pharmacy_sun">周日: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="pharmacy_sun" value="<?php echo $store['PharmacySun']; ?>">
      </div>
    </div>
    <div class="text-center">
      <strong>眼镜店时间：</strong>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="optical_mon">周一: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="optical_mon" value="<?php echo $store['OpticalMon']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="optical_tue">周二: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="optical_tue" value="<?php echo $store['OpticalTue']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="optical_wed">周三: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="optical_wed" value="<?php echo $store['OpticalWed']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="optical_thu">周四: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="optical_thu" value="<?php echo $store['OpticalThu']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="optical_fri">周五: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="optical_fri" value="<?php echo $store['OpticalFri']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="optical_sat">周六: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="optical_sat" value="<?php echo $store['OpticalSat']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="optical_sun">周日: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="optical_sun" value="<?php echo $store['OpticalSun']; ?>">
      </div>
    </div>
    <div class="text-center">
      <strong>诊所时间：</strong>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="clinic_mon">周一: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="clinic_mon" value="<?php echo $store['ClinicMon']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="clinic_tue">周二: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="clinic_tue" value="<?php echo $store['ClinicTue']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="clinic_wed">周三: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="clinic_wed" value="<?php echo $store['ClinicWed']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="clinic_thu">周四: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="clinic_thu" value="<?php echo $store['ClinicThu']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="clinic_fri">周五: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="clinic_fri" value="<?php echo $store['ClinicFri']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="clinic_sat">周六: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="clinic_sat" value="<?php echo $store['ClinicSat']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="clinic_sun">周日: </label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="clinic_sun" value="<?php echo $store['ClinicSun']; ?>">
      </div>
    </div>
    <div class="form-group text-center">
      <label for="store_holiday">节假日: </label>
      <input type="text" class="form-control" name="store_holiday" value="<?php echo $store['StoreHoliday']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="store_collect">自取时间: </label>
      <input type="text" class="form-control" name="store_collect" value="<?php echo $store['StoreCollect']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="icon">图片: </label>
      <input type="text" class="form-control" name="icon" value="<?php echo $store['Icon']; ?>">
    </div>
    <div class="form-group text-center">
      <label for="store_des">备注: </label>
      <textarea class="form-control" name="store_des"><?php echo $store['StoreDes']; ?></textarea>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
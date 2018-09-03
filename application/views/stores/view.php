<!-- ***未完成*** 检查是否所有column都显示 隐藏不需要的内容 -->
<?php
// 设置时区——美国中部时间
date_default_timezone_set('America/North_Dakota/Center');
?>
<table class="table table-striped table-hover ">
  <caption class="text-center">
    <div class="row">
      <h3><?= $title ?></h3>
    </div>
  </caption>
  <tr>
    <th>类型</th>
    <td>
      <?php
      switch ($store['StoreType']) {
        case '1':
          echo "超市";
          break;
        case '2':
          echo "商店";
          break;
        case '3':
          echo "餐饮";
          break;
        case '4':
          echo "住宿";
          break;
        case '5':
          echo "旅游";
          break;
        case '6':
          echo "房屋";
          break;
        case '7':
          echo "车辆";
          break;
        case '8':
          echo "政府";
          break;
        case '9':
          echo "保险";
          break;

        default:
          echo "未知";
          break;
      }
      ?>
    </td>
  </tr>
  <?php if (!$store['StoreName'] == NULL): ?>
    <tr>
      <th>网址</th>
      <td><a title="<?= $store['StoreName'] ?> 网址" target="_blank" href="<?= $store['Web'] ?>"><?= $store['Web'] ?></a></td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['Flyer'] == NULL): ?>
    <tr>
      <th>传单</th>
      <td><a title="<?= $store['StoreName'] ?> 传单" target="_blank" href="<?= $store['Flyer'] ?>"><?= $store['Flyer'] ?></a></td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['StoreAdd'] == NULL): ?>
    <tr>
      <th>地址</th>
      <td>
        <a title="Google地图" target="_blank" href="http://maps.google.com/?q=<?= $store['StoreAdd'] ?>"><?= $store['StoreAdd'] ?></a>&nbsp;
        <?php if ($store['StoreBus']): ?>
          <a title="311公交" target="_blank" href="http://winnipegtransit.com/en/navigo/result?leave_right_away=on&timeMode=Depart_After&tripDate=<?= date('Y-m-d') ?>&originKey=23932&originName=18+Livingston+Place&originType=address&destinationKey=<?= $store['StoreBus'] ?>&destinationType=address&commit=Submit">查看公交路线</a>
        <?php endif; ?>
      </td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['StorePhone'] == NULL): ?>
    <tr>
      <th>电话</th>
      <td><?= $store['StorePhone'] ?></td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['StoreMon'] == NULL): ?>
    <tr>
      <th>工作时间</th>
      <td>
        周一：<?= $store['StoreMon'] ?><br>
        周二：<?= $store['StoreTue'] ?><br>
        周三：<?= $store['StoreWed'] ?><br>
        周四：<?= $store['StoreThu'] ?><br>
        周五：<?= $store['StoreFri'] ?><br>
        周六：<?= $store['StoreSat'] ?><br>
        周日：<?= $store['StoreSun'] ?>
      </td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['PharmacyMon'] == NULL): ?>
    <tr>
      <th>药店时间</th>
      <td>
        周一：<?= $store['PharmacyMon'] ?><br>
        周二：<?= $store['PharmacyTue'] ?><br>
        周三：<?= $store['PharmacyWed'] ?><br>
        周四：<?= $store['PharmacyThu'] ?><br>
        周五：<?= $store['PharmacyFri'] ?><br>
        周六：<?= $store['PharmacySat'] ?><br>
        周日：<?= $store['PharmacySun'] ?>
      </td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['OpticalMon'] == NULL): ?>
    <tr>
      <th>眼镜店时间</th>
      <td>
        周一：<?= $store['OpticalMon'] ?><br>
        周二：<?= $store['OpticalTue'] ?><br>
        周三：<?= $store['OpticalWed'] ?><br>
        周四：<?= $store['OpticalThu'] ?><br>
        周五：<?= $store['OpticalFri'] ?><br>
        周六：<?= $store['OpticalSat'] ?><br>
        周日：<?= $store['OpticalSun'] ?>
      </td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['ClinicMon'] == NULL): ?>
    <tr>
      <th>诊所时间</th>
      <td>
        周一：<?= $store['ClinicMon'] ?><br>
        周二：<?= $store['ClinicTue'] ?><br>
        周三：<?= $store['ClinicWed'] ?><br>
        周四：<?= $store['ClinicThu'] ?><br>
        周五：<?= $store['ClinicFri'] ?><br>
        周六：<?= $store['ClinicSat'] ?><br>
        周日：<?= $store['ClinicSun'] ?>
      </td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['StoreHoliday'] == NULL): ?>
    <tr>
      <th>节假日时间</th>
      <td><?= $store['StoreHoliday'] ?></td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['StoreCollect'] == NULL): ?>
    <tr title="在前台取货，需要事先在网上购物">
      <th title="在前台取货，需要事先在网上购物">取货时间</th>
      <td title="在前台取货，需要事先在网上购物"><?= $store['StoreCollect'] ?></td>
    </tr>
  <?php endif; ?>
  <?php if (!$store['StoreDes'] == NULL): ?>
    <tr>
      <th>备注</th>
      <td><?= $store['StoreDes'] ?></td>
    </tr>
  <?php endif; ?>
</table>

<div class="container text-center">
  <a class="btn btn-warning" href="<?= base_url('stores/edit/' . $store['StoreID']) ?>">修改商店/公司</a>
  <a class="btn btn-primary" href="<?= base_url('stores') ?>">返回商店/公司首页</a>
</div>
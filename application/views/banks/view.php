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
    <th>网址</th>
    <td><a title="<?= $bank['BankName'] ?> 网址" target="_blank" href="<?= $bank['BankWeb'] ?>"><?= $bank['BankWeb'] ?></a></td>
  </tr>
  <tr>
    <th>地址</th>
    <td>
      <a title="Google地图" target="_blank" href="http://maps.google.com/?q=<?= $bank['BankAddress'] ?>"><?= $bank['BankAddress'] ?></a>&nbsp;
      <a title="311公交" target="_blank" href="http://winnipegtransit.com/en/navigo/result?leave_right_away=on&timeMode=Depart_After&tripDate=<?=date('Y-m-d')?>&originKey=23932&originName=18+Livingston+Place&originType=address&destinationKey=<?=$bank['BankBus']?>&destinationType=address&commit=Submit">查看公交路线</a>
  </td>
</tr>
<tr>
  <th>前台电话</th>
  <td><?= $bank['BankPhone'] ?></td>
</tr>
<tr>
  <th>工作时间</th>
  <td>
    周一：<?= $bank['BankMon'] ?><br>
    周二：<?= $bank['BankTue'] ?><br>
    周三：<?= $bank['BankWed'] ?><br>
    周四：<?= $bank['BankThu'] ?><br>
    周五：<?= $bank['BankFri'] ?><br>
    周六：<?= $bank['BankSat'] ?><br>
    周日：<?= $bank['BankSun'] ?>
  </td>
</tr>
<tr>
  <th>银行经理</th>
  <td><?= $bank['BankManager'] ?></td>
</tr>
<tr>
  <th>经理电话</th>
  <td><?= $bank['ManagerPhone'] ?></td>
</tr>
<tr>
  <th>经理Email</th>
  <td><a href="mailto:<?= $bank['ManagerEmail'] ?>"><?= $bank['ManagerEmail'] ?></a></td>
</tr>
</table>

<div class="container text-center"><a class="btn btn-primary" href="<?= base_url('banks') ?>">返回银行首页</a></div>
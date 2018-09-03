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
  <tr class="info">
    <th>卡号</th>
    <td><?=$card['CardNum'] ?></td>
  </tr>
  <tr>
    <th>持卡用户</th>
    <td><?=$card['ShowName'] ?></td>
  </tr>
  <tr>
    <th>卡面姓名</th>
    <td>
      <?=$card['NameOnCard'] ?>
    </td>
  </tr>
  <tr>
    <th>银行</th>
    <td><a href="<?=base_url('banks/view/'.$card['BankID'])?>"><?=$card['BankName'] ?></a></td>
  </tr>
  <tr>
    <th>卡种</th>
    <td>
      <?=$card['CardType'] ?>
    </td>
  </tr>
  <tr>
    <th>过期日期</th>
    <td><?=$card['ExpMonth'] ?>/<?=$card['ExpYear'] ?></td>
  </tr>
  <tr>
    <th>安全码</th>
    <td><?=$card['SecureNum'] ?></td>
  </tr>
  <tr>
    <th>金额</th>
    <td>
      <?php if ($card['CardTypeID'] > 3) {echo '-';}?>
        <?=$card['Balance'] ?>
    </td>
  </tr>
  <?php if ($card['CardTypeID'] > 3): ?>
  <tr>
    <th>限额</th>
    <td>- <?= $card['Limit'] ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <th>备注</th>
    <td><?= $card['CardDes'] ?></td>
  </tr>
</table>

<div class="container text-center"><a class="btn btn-primary" href="<?= base_url('cards') ?>">返回银行卡首页</a></div>
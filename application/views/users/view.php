<table class="table table-striped table-hover ">
  <caption class="text-center">
    <div class="row">
      <h3><?= $title ?></h3>
    </div>
  </caption>
  <tr class="info">
    <th>用户名</th>
    <td>
      <?= $user['UserName'] ?>
      <?php if ($user['UserID'] == $this->session->userdata('user_id')): ?>
        <div class="pull-right">
          <a href="<?= base_url('Users/edit/' . $this->session->userdata('user_id')) ?>" class="btn-xs btn-warning">修改</a>
          <a href="<?= base_url('Users/pass/' . $this->session->userdata('user_id')) ?>" class="btn-xs btn-default">改密码</a>
        </div>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <th>姓名（昵称）</th>
    <td><?= $user['ShowName'] ?></td>
  </tr>
  <tr>
    <th>SIN</th>
    <td><?= $user['SIN'] ?></td>
  </tr>
  <tr>
    <th>健康卡号</th>
    <td><?= $user['HealthCard'] ?></td>
  </tr>
  <tr>
    <th>宅电/手机号</th>
    <td>
      <?= $user['Phone'] ?>
    </td>
  </tr>
  <?php if ($user['HomeAdd']): ?>
    <tr>
      <th>住址</th>
      <td><a title="Google地图" target="_blank" href="http://maps.google.com/?q=<?= $user['HomeAdd'] ?>"><?= $user['HomeAdd'] ?></a></td>
    </tr>
  <?php endif; ?>
  <?php if ($user['WorkTel']): ?>
    <tr>
      <th>工作电话</th>
      <td>
        <?= $user['WorkTel'] ?>
      </td>
    </tr>
  <?php endif; ?>
  <?php if ($user['WorkAdd']): ?>
    <tr>
      <th>工作地址</th>
      <td><a title="Google地图" target="_blank" href="http://maps.google.com/?q=<?= $user['WorkAdd'] ?>"><?= $user['WorkAdd'] ?></a></td>
    </tr>
  <?php endif; ?>
  <?php if ($user['Email1']): ?>
    <tr>
      <th>Email</th>
      <td>
        <a title="发送Email" href="mailto:<?= $user['Email1'] ?>"><?= $user['Email1'] ?></a>
        <?php if ($user['Email2']): ?>
          <br>
          <a title="发送Email" href="mailto:<?= $user['Email2'] ?>"><?= $user['Email2'] ?></a>
        <?php endif; ?>
        <?php if ($user['Email3']): ?>
          <br>
          <a title="发送Email" href="mailto:<?= $user['Email3'] ?>"><?= $user['Email3'] ?></a>
        <?php endif; ?>
      </td>
    </tr>
  <?php endif; ?>
  <tr>
    <th>QQ</th>
    <td>
      <?= $user['QQ'] ?>
    </td>
  </tr>
  <tr>
    <th>微信</th>
    <td><?= $user['WeChat'] ?></td>
  </tr>
  <tr>
    <th>备注</th>
    <td><?= $user['Description'] ?></td>
  </tr>
</table>

<div class="container text-center">
  <a href="<?php echo site_url('cards/user_cards/' . $user['UserID']); ?>" class="btn btn-warning"><span class="fa fa-credit-card"></span>&nbsp;&nbsp;查看卡</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a class="btn btn-primary" href="<?= base_url('users') ?>">返回用户首页</a>
</div>
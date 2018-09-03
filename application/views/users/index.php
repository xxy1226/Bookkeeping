<table class="table table-striped table-hover ">
  <caption class="text-center"><h3><?= $title ?></h3></caption>
  <thead>
    <tr class="info">
      <th>#</th>
      <th>用户</th>
      <th>随身电话</th>
      <th>邮箱</th>
      <th>管理</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
      <?php if ($user['UserID'] > 2): ?>
        <tr>
          <td><?= $user['UserID'] - 2 ?></td>
          <td><a href="<?php echo site_url('users/view/' . $user['UserID']); ?>"><?= $user['ShowName'] ?></a></td>
          <td><?= $user['Phone'] ?></td>
          <td><a href="mailto:<?= $user['Email1'] ?>"><?= $user['Email1'] ?></a></td>
          <td>
            <a href="<?php echo site_url('users/view/' . $user['UserID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-user-o"></span>&nbsp;&nbsp;详情</a> 

            <a href="<?php echo site_url('cards/user_cards/' . $user['UserID']); ?>" class="btn btn-success btn-xs"><span class="fa fa-credit-card"></span>&nbsp;&nbsp;查看卡</a> 

            <?php if ($this->session->userdata('user_id') == $user['UserID']): ?>
              <a href="<?php echo site_url('users/edit/' . $user['UserID']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> 修改</a> 
            <?php endif; ?>
          </td>
        </tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>
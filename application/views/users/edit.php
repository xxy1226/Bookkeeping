<div class="container">
  <div class="container text-center">
    <h3>修改用户：<?= $user['UserName'] ?></h3><br>
  </div>
  <?php echo form_open('Users/update'); ?>
  <div class="row">
    <div class="col-lg-6">
      <input class="hidden" type="hidden" name="user_id" value="<?php echo $user['UserID']; ?>">
      <div class="form-group">
        <label for="qq">QQ: </label>
        <input type="text" class="form-control" name="qq" value="<?php echo $user['QQ']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="phone">电话(随身): </label>
        <input type="text" class="form-control" name="phone" value="<?php echo $user['Phone']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="home_add">住址: </label>
        <input type="text" class="form-control" name="home_add" value="<?php echo $user['HomeAdd']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email1">主要Email: </label>
        <input type="text" class="form-control" name="email1" value="<?php echo $user['Email1']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="email2">其他Email: </label>
        <input type="text" class="form-control" name="email2" value="<?php echo $user['Email2']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="email3">其他Email: </label>
        <input type="text" class="form-control" name="email3" value="<?php echo $user['Email3']; ?>" autofocus>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="show_name">昵称: </label>
        <input type="text" class="form-control" name="show_name" value="<?php echo $user['ShowName']; ?>" required autofocus>
      </div>
      <div class="form-group">
        <label for="we_chat">微信: </label>
        <input type="text" class="form-control" name="we_chat" value="<?php echo $user['WeChat']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="work_tel">电话(工作): </label>
        <input type="text" class="form-control" name="work_tel" value="<?php echo $user['WorkTel']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="work_add">地址(工作): </label>
        <input type="text" class="form-control" name="work_add" value="<?php echo $user['WorkAdd']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="sin">社保号: </label>
        <input type="text" class="form-control" name="sin" value="<?php echo $user['SIN']; ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="health_card">健康卡号: </label>
        <input type="text" class="form-control" name="health_card" value="<?php echo $user['HealthCard']; ?>" autofocus>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="form-group">
        <label for="description">自我介绍: </label>
        <textarea class="form-control" rows="4" id="description" name="description"><?php echo $user['Description']; ?></textarea>
      </div>
    </div>
    <div class="col-lg-2 col-lg-offset-5 col-md-4 col-md-offset-4">
      <div class="form-group">
        <?php if ($user['UserID'] == $this->session->userdata('user_id')): ?>
          <a href="<?= base_url('Users/pass/' . $user['UserID']) ?>" class="btn btn-warning btn-block">&nbsp;改&nbsp;密&nbsp;码&nbsp;</a>
        <?php endif; ?>
        <button type="submit" class="btn btn-success btn-block">&nbsp;&nbsp;&nbsp;&nbsp;确 定&nbsp;&nbsp;&nbsp;&nbsp;</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>
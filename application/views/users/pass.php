<div class="container">
  <div class="container text-center">
    <h3>修改用户名、密码：<?= $user['UserName'] ?></h3><br>
  </div>
  <?php echo form_open('Users/update_pass'); ?>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <input class="hidden" type="hidden" name="user_id" value="<?php echo $user['UserID']; ?>">
      <div title="注意：用户名用于登录用户，慎重修改。" class="form-group">
        <label for="user_name" class="inline">用户名:</label>
        
        <input type="text" class="form-control" name="user_name" value="<?php echo $user['UserName']; ?>" autofocus required>
      </div>
      <div title="注意：密码用于登录验证，慎重修改。" class="form-group">
        <label for="password">新密码: </label>
        <input title="注意：密码用于登录验证，慎重修改。" type="password" class="form-control" name="password" autofocus required>
      </div>
      <div title="确认密码须与新密码一致。" class="form-group">
        <label for="password2">确认密码: </label>
        <input title="确认密码须与新密码一致。" type="password" class="form-control" name="password2" autofocus required>
      </div>
      <?php echo validation_errors(); ?>
      <div class="form-group">
        <div class="col-md-6 col-lg-6 col-sm-6">
          <button type="submit" class="btn btn-success btn-block">确定</button>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">
          <a href="<?= base_url('Users/edit/' . $user['UserID']); ?>" class="btn btn-warning btn-block">取消</a>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>
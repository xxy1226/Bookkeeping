<?php echo form_open(); ?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1 class="text-center"><?php echo $title; ?></h1>
    <div class="form-group">
      <?php if ($username): ?>
        <input type="text" name="username" class="form-control" placeholder="用户名" required value="<?= $username ?>">
      <?php else: ?>
        <input type="text" name="username" class="form-control" placeholder="用户名" required autofocus>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <input type="password" id="password" name="password" class="form-control" placeholder="密码" required autofocus>
      <span id="cap_error" style="color: yellow; display: none;">大写锁定键被按下，请注意大小写</span>
    </div>
    <button type="submit" class="btn btn-primary btn-block">登录</button>
  </div>
</div>
<?php echo form_close(); ?>

<script>
  function  detectCapsLock(event) {
    var e = event || window.event;
    var o = e.target || e.srcElement;
    var oTip = document.getElementById('cap_error');
    var keyCode = e.keyCode || e.which; // 按键的keyCode 
    var isShift = e.shiftKey || (keyCode === 16) || false; // shift键是否按住
    if (
            ((keyCode >= 65 && keyCode <= 90) && !isShift) // Caps Lock 打开，且没有按住shift键 
            || ((keyCode >= 97 && keyCode <= 122) && isShift)// Caps Lock 打开，且按住shift键
            ) {
      oTip.style.display = '';
    } else {
      oTip.style.display = 'none';
    }
  }
  document.getElementById('password').onkeypress = detectCapsLock;
</SCRIPT>
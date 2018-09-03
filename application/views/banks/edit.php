<?php echo form_open('banks/update'); ?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <input class="hidden" type="hidden" name="bank_id" value="<?php echo $bank['BankID']; ?>">
    <div class="form-group text-center">
      <label for="bank_name">银行名: </label>
      <input type="text" class="form-control" name="bank_name" value="<?php echo $bank['BankName']; ?>">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
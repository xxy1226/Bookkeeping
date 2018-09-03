<table class="table table-striped table-hover ">
  <caption class="text-center"><h3><?= $title ?></h3></caption>
  <thead>
    <tr class="info">
      <th>#</th>
      <th>银行</th>
      <th>管理</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($banks as $bank): ?>
      <?php if ($bank['BankID'] <> 1): ?>
        <tr>
          <td><?= $bank['BankID'] - 1 ?></td>
          <td><a href="<?php echo site_url('banks/view/' . $bank['BankID']); ?>"><?= $bank['BankName'] ?></a></td>
          <td>
            <!--<a href="<?php echo site_url('banks/edit/' . $bank['BankID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> 修改</a>--> 
            <a href="<?php echo site_url('banks/view/' . $bank['BankID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-university"></span>&nbsp;&nbsp;银行详情</a> 
            <a href="<?php echo site_url('cards/bank_cards/' . $bank['BankID']); ?>" class="btn btn-success btn-xs"><span class="fa fa-credit-card"></span>&nbsp;&nbsp;查看卡</a> 
          </td>
        </tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>
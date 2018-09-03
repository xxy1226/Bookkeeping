<table class="table table-striped table-hover ">
  <caption class="text-center">
    <div class="row">
      <h3><?= $good['GoodName'] ?></h3>
    </div>
  </caption>
  <tr>
    <th>图片</th>
    <td>
      <img alt="<?= $good['GoodName'] ?>" src="<?= strtolower(substr($good['Pic'], 0, 6)) === 'http://' ? $good['Pic'] : base_url('assets/img/goods/' . $good['Pic'] . '.' . $good['Extension']) ?>" height="200">
      <?php for ($i = 0; $i < $good['Series']; $i++): ?>
        <img alt="<?= $good['GoodName'] . '_' . ($i + 1) ?>" src="<?= base_url('assets/img/goods/' . $good['Pic'] . '_' . ($i + 1) . '.' . $good['Extension']) ?>" height="200">
      <?php endfor; ?>
    </td>
  </tr>
  <tr>
    <th>品牌/公司</th>
    <td><?= $good['Brand'] ?></td>
  </tr>
  <tr>
    <th>规格</th>
    <td><?= $good['Weight'] ?></td>
  </tr>
  <tr>
    <th>描述</th>
    <td><?= $good['GoodDescription'] ?></td>
  </tr>
</table>

<div class="container text-center"><a class="btn btn-primary" href="<?= base_url('goods') ?>">返回商品/服务首页</a></div>
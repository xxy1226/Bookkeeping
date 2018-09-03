<table class="table table-striped table-hover ">
  <caption class="text-center"><h3><?= $title ?></h3></caption>
  <thead>
    <tr class="info">
      <th>#</th>
      <th>商品/服务</th>
      <th>品牌/公司</th>
      <th>管理</th>
    </tr>
  </thead>
  <tbody>
    <?php $count = 1; ?>
    <?php foreach ($goods as $good): ?>
    <tr title="<?=$good['GoodDescription']?>">
        <td><?= $count++ ?></td>
        <td><a href="<?php echo site_url('goods/view/' . $good['GoodID']); ?>"><?= $good['GoodName'] ?></a></td>
        <td><?= $good['Brand'] ?></td>
        <td>
          <a href="<?php echo site_url('goods/view/' . $good['GoodID']); ?>" class="btn btn-success btn-xs"><span class="fa fa-cubes"></span>&nbsp;&nbsp;详情</a>
          <a href="<?php echo site_url('goods/edit/' . $good['GoodID']); ?>" class="hidden btn btn-warning btn-xs"><span class="fa fa-pencil"></span>&nbsp;&nbsp;修改</a> 
          <a href="#" class="hidden btn btn-danger btn-xs"><span class="fa fa-credit-card"></span>&nbsp;&nbsp;删除</a> 
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
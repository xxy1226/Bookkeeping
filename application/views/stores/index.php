<table class="table table-striped table-hover ">
  <caption class="text-center">
    <h3>
      <?= $title ?>
      <div class="pull-right">
        <a href="#add-store" data-toggle="modal" class="btn btn-sm btn-danger">+ 增加</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    </h3>
  </caption>
  <div class="modal fade" id="add-store" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">增加商店/公司</h4>
        </div>
        <div class="modal-body">
          <div class="input-group" style="margin-bottom: 5px">
            <a class="btn input-group-addon">名称</a>
            <input class="form-control" id="store_name" autofocus value="">
          </div>
          <div class="input-group" style="margin-bottom: 5px">
            <a class="btn input-group-addon">类型</a>
            <select class="form-control" id="store_type">
              <option value="1">超市</option>
              <option value="2">商店</option>
              <option value="3">餐饮</option>
              <option value="4">住宿</option>
              <option value="5">旅游</option>
              <option value="6">房屋</option>
              <option value="7">车辆</option>
              <option value="8">政府</option>
              <option value="9">保险</option>
              <option value="10">医药</option>
            </select>
          </div>
          <div class="input-group">
            <a class="btn input-group-addon">备注</a>
            <textarea class="form-control" id="store_des"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-default" id="submit-text" data-dismiss="modal">确定</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        </div>
      </div>
    </div>
  </div>
  <thead>
    <tr class="info">
      <th>#</th>
      <th>名称</th>
      <th>类型</th>
      <th>管理</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($stores as $store): ?>
      <tr>
        <td><?= $store['StoreID'] ?></td>
        <td><a href="<?php echo site_url('stores/view/' . $store['StoreID']); ?>"><?= $store['StoreName'] ?></a></td>
        <td>
          <?php
          switch ($store['StoreType']) {
            case '0': echo '不用';
              break;
            case '1': echo '超市';
              break;
            case '2': echo '商店';
              break;
            case '3': echo '餐饮';
              break;
            case '4': echo '住宿';
              break;
            case '5': echo '旅游';
              break;
            case '6': echo '房屋';
              break;
            case '7': echo '车辆';
              break;
            case '8': echo '政府';
              break;
            case '9': echo '保险';
              break;
          }
          ?>
        </td>
        <td>
          <a href="<?php echo site_url('stores/edit/' . $store['StoreID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> 修改</a>
          <a href="<?php echo site_url('stores/view/' . $store['StoreID']); ?>" class="btn btn-success btn-xs"><span class="fa fa-shopping-cart"></span>&nbsp;&nbsp;查看详情</a> 
          <a href="#" class="btn btn-warning btn-xs"><span class="fa fa-wpforms"></span>&nbsp;&nbsp;消费记录</a> 
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
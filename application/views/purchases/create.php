<!-- 用于创建日历的 JavaScript 和 CSS -->
<script type="text/javascript" src="<?= base_url('/assets/js/bootstrap-datetimepicker.min.js') ?>">
</script>
<link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap-datetimepicker.min.css') ?>">

<?php echo form_open('purchases/create_purchase', array('class' => 'well')); ?>
<div class="row">
  <!-- 日期 -->
  <div class="col-md-2">
    <div class="form-group">
      <label class="control-label" for="date">日期: </label>
      <div id="datetimepicker" class="input-append input-group">
        <input class="form-control" data-format="yyyy-MM-dd" type="text" id="date" name="date" readonly onclick="open_calendar()" <?= $filled ? 'value="' . $content['date'] . '"' : "" ?>>
        <span class="add-on input-group-btn">
          <button class="btn btn-default" id="btn_calendar" type="button">
            <i class="fa fa-calendar" data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
          </button>
        </span>
      </div>
    </div>
  </div>
  <!-- 消费者 -->
  <div class="col-md-2">
    <div class="form-group">
      <label class="control-label" for="date">消费者: </label>
      <select class="form-control" id="purchaser_id" name="purchaser_id">
        <?php foreach ($users as $user): ?>
          <?php if ($user['UserID'] > 2): ?>
            <option id="purchaser<?= $user['UserID'] ?>" value="<?= $user['UserID'] ?>"
                    <?php if (($filled && $user['UserID'] === $content['purchaser_id']) || ( ! $filled && $user['UserID'] == $this->session->userdata('user_id'))): ?>selected<?php endif; ?>><?= $user['ShowName'] ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
      <input class="hidden" id="recorder_id" name="recorder_id" value="<?= $this->session->userdata('user_id') ?>">
    </div>
  </div>
  <div class="col-md-2"></div>
  <!-- 商店/公司 -->
  <div class="col-md-4">
    <div class="form-group text-center">
      <label class="control-label" for="date">商店/公司: </label>
      <select class="form-control" id="store" name="store">
        <div id="store-container">
          <?php foreach ($stores as $store): ?>
            <option value="<?= $store['StoreID'] ?>" <?php if ($filled && $store['StoreID'] === $content['store']): ?>selected<?php endif; ?>><?= $store['StoreName'] ?></option>
          <?php endforeach; ?>
        </div>
        <option value="-1" id="opt_add_store">新增商店/公司</option>
      </select>
    </div>
  </div>
  <!-- 消费方式 -->
  <div class="col-md-2">
    <div class="form-group text-center">
      <label class="control-label">消费方式: </label>
      <select class="form-control" name="pay_method">
        <option class="cash" value="1">现金</option>
        <!-- ***须要从database中读取*** -->
        <?php foreach ($cards as $card): ?>
          <?php if ($card['CardID'] > 1): ?>
            <option class="card card<?= $card['UserID'] ?> <?= $card['UserID'] == $this->session->userdata['user_id'] ? "" : "hidden" ?>" value="<?= $card['CardID'] ?>"
                    <?php if ($filled && $card['CardID'] === $content['pay_method']): ?>selected<?php endif; ?>><?= $card['CardDes'] . "(" . $card['CardNum'] . ")" ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>
<!-- 新增商店/公司modal -->
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
          <input class="form-control" id="store_name">
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
        <button type="button" class="btn btn-default" id="submit-text" data-dismiss="modal" onclick="submit_new_store()">确定</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

<!-- 我是分割线 -->
<div class="row">
  <hr>
</div>

<!-- 消费目录 -->
<div class="container-fluid" id="purchase_list">
  <div class="row">
    <div class="col-md-1">
      <p class="control-label">#</p>
    </div>
    <div class="col-md-2">
      <p>商品/服务</p>
    </div>
    <div class="col-md-2">
      <p>单价</p>
    </div>
    <div class="col-md-2">
      <p>数量</p>
    </div>
    <div class="col-md-2">
      <p>合计</p>
    </div>
    <div class="col-md-1 text-center">
      <p>交税</p>
    </div>
    <div class="col-md-1 text-center">
      <p>备注</p>
    </div>
    <div class="col-md-1 text-center">
      <p>删除</p>
    </div>
  </div>
  <!-- 消费开始 -->
  <div id="good-container">
  </div>
</div>
<!-- 商品结束 -->

<!-- 我是分割线 -->
<div class="row">
  <hr>
</div>

<!-- 控制面板 -->
<div class="row">
  <div class="col-md-2 form-group">
    <a class="btn btn-info" id="add_item" onclick="create_line()">+增加商品/服务</a>
  </div>
  <div class="col-md-1 form-group">
    <a class="btn btn-default" id="calculator" onclick="calculate_all()" title="根据已有的商品属性自动计算税和总价">自动计算</a>
  </div>
  <div class="col-md-1" style="border-right:1px solid #444;height:80px"></div>
  <div class="col-md-2 col-md-offset-1">
    <div class="form-group">
      <label class="control-label" for="gst">GST: </label>
      <a class="hidden" id="error_gst" data-target="#gst-message" data-toggle="modal">error_gst</a>
      <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" class="form-control tax" id="gst" name="gst" value="0.00">
      </div>
    </div>
  </div>
  <div class="modal fade" id="gst-message" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">错误</h4>
        </div>
        <div class="modal-body">
          <p id="total_error" class="yellow">GST必须是数字</p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" data-dismiss="modal">&nbsp;&nbsp;<span class="fa fa-pencil">再改改&nbsp;&nbsp;</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label class="control-label" for="pst">PST: </label>
      <a class="hidden" id="error_pst" data-target="#pst-message" data-toggle="modal">error_pst</a>
      <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" class="form-control tax" id="pst" name="pst" value="0.00">
      </div>
    </div>
  </div>
  <div class="modal fade" id="pst-message" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">错误</h4>
        </div>
        <div class="modal-body">
          <p id="total_error" class="yellow">PST必须是数字</p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" data-dismiss="modal">&nbsp;&nbsp;<span class="fa fa-pencil">再改改&nbsp;&nbsp;</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label class="control-label" for="total" min="0.01">总价: </label>
      <input type="number" class="hidden" id="count" name="count" value="0">
      <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" class="form-control" id="total" name="total" value="0.00">
      </div>
    </div>
  </div>
</div>
<a data-target="#nan" data-toggle="modal" id="nan" class="hidden"></a>

<!-- ***不是数字提示 -->
<div class="modal fade" id="modal-submit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">确认提交</h4>
      </div>
      <div class="modal-body">
        <ul class="form-control-static" id="submit-list"></ul>
      </div>
      <div class="modal-footer">
        <button id="submit" type="submit" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-check"> 完成&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
        <a class="btn btn-warning" data-dismiss="modal">&nbsp;&nbsp;<span class="fa fa-pencil"> 再改改&nbsp;&nbsp;</a>
      </div>
    </div>
  </div>
</div>


<!-- 我是分割线 -->
<div class="row">
  <hr>
</div>

<!-- 提交 -->
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="form-group">
      <button type="button" data-target="#modal-submit" data-toggle="modal" id="modal_click" class="btn btn-success col-md-5" title="必须花钱才能提交" disabled><span class="fa fa-check"> 完成</span></button>
      <a href="<?= base_url('purchases') ?>" class="btn btn-warning col-md-5  col-md-offset-2">取消</a>
    </div>
  </div>
</div>

<!-- ***确认提交窗口 -->
<div class="modal fade" id="modal-submit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">确认提交</h4>
      </div>
      <div class="modal-body">
        <ul class="form-control-static" id="submit-list"></ul>
      </div>
      <div class="modal-footer">
        <button id="submit" type="submit" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-check"> 完成&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
        <a class="btn btn-warning" data-dismiss="modal">&nbsp;&nbsp;<span class="fa fa-pencil"> 再改改&nbsp;&nbsp;</a>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>

<?php if ($filled): ?>
  <?php print_r($this->input->post()); ?>
<?php endif; ?>

<!-- 以下是前端程序 -->
<script type="text/javascript">
  //商品/服务的总数-1
  var count = 0;
  var store_val;
  var old_value = 0;
  var old_gst = 0;
  var old_pst = 0;
  var old_total = 0;
  var gst_fixed = false;
  var pst_fixed = false;
  var total_fixed = false;
  var progressing = false;

  $(document).ready(function () {
    //记录当前store的选项
    store_val = $("#store").val();

    //预设日期为今天
    <?php if (! $filled): ?>
    today = new Date();
    month = today.getMonth() + 1;
    if (month < 10) {
      month = '0' + month;
    }
    date = today.getDate();
    if (date < 10) {
      date = '0' + date;
    }
    $("#date").attr("value", today.getFullYear() + '-' + month + '-' + date);
    <?php endif; ?>

    //只选择日期
    $("#datetimepicker").datetimepicker({
      pickTime: false
    });

    //选择消费者后更改消费方式的显示与隐藏
    <?php foreach ($users as $user): ?>
    <?php if ($user['UserID'] > 2): ?>
    change_pay_method(<?= $user['UserID'] ?>);
    <?php endif; ?>
    <?php endforeach; ?>

    <?php if (! $filled): ?> //自动创建第一条
    create_line();
    <?php else: ?> //***自动创建所有条目
    <?php for ($i = 0; $i < $content['count']; $i++): ?>
    create_line();
    $("#good_name<?= $i ?>").val('<?= $content['good_name' . $i] ?>');
    $("#unit_price<?= $i ?>").val('<?= $content['unit_price' . $i] ?>');
    $("#unit<?= $i ?>").val('<?= $content['unit' . $i] ?>');
    $("#price<?= $i ?>").val('<?= $content['price' . $i] ?>');
    <?php if ($content['tax' . $i] === '1'): ?>
    $("#tax_btn<?= $i ?>").click();
    <?php endif; ?>
    <?php if ($content['on_sale' . $i] === '1'): ?>
    $("#on_sale_btn<?= $i ?>").click();
    <?php endif; ?>
    $("#memo<?= $i ?>").val('<?= $content['memo' . $i] ?>');
    <?php endfor; ?>
    calculate_total();
    $("#gst").val('<?=$content['gst']?>');
    $("#pst").val('<?=$content['pst']?>');
    $("#total").val('<?=$content['total']?>');
    <?php if (! $edit): ?>
    disable_able_submit();
    <?php endif; ?>
    <?php endif; ?>

    //当总价focusout时，判断是否合理计算
    $("#total").focusout(total_focusout);

    //当总价改变时，判断是否可以提交
    $("#total").change(disable_able_submit);

    //当GST和PST focusin时，记录当前值
    $(function () {
      $("#gst").focusin(function () {
        if ($.isNumeric($(this).val())) {
          old_gst = parseFloat($("#gst").val());
        }
      });
      $("#pst").focusin(function () {
        if ($.isNumeric($(this).val())) {
          old_pst = parseFloat($("#pst").val());
          console.log("PST: " + old_pst);
        }
      });
    });

    //当GST focusout时，如果changed则计算总价
    $("#gst").focusout(function () {
      if ($.isNumeric($(this).val())) {
        $(this).parent().removeClass('has-error'); //取消错误边框
        $(this).val(parseFloat($(this).val()).toFixed(2));
        if (parseFloat($(this).val()) !== old_gst) {
          calculate_total();
          gst_fixed = true;
        }
      } else {
        $("#error_gst").click();
        $(this).delay(0).fadeIn(0, function () {
          $(this).focus().select();
          $(this).parent().addClass('has-error');
        });
      }
    });

    //当PST focusout时，如果changed则计算总价
    $("#pst").focusout(function () {
      if ($.isNumeric($(this).val())) {
        $(this).parent().removeClass('has-error');
        $(this).val(parseFloat($(this).val()).toFixed(2));
        if (parseFloat($(this).val()) !== old_pst) {
          calculate_total();
          pst_fixed = true;
          console.log('PST changed.');
        }
      } else {
        3
        $("#error_pst").click();
        $(this).delay(0).fadeIn(0, function () {
          $(this).focus().select();
          $(this).parent().addClass('has-error');
        });
      }
    });

    //当选中新增商店/公司时，如果选择新增则自动选择之前选项并打开新增模块，否则记录当前选项
    $("#store").change(function () {
      if ($("#store").val() === '-1') {
        $("#add-store").modal();
        $("#store:first").val(store_val);
      } else {
        store_val = $("#store").val();
      }
    });

  }); //初始化结束

  //当总价focusout时，判断是否合理计算
  function total_focusout() {
    if ($.isNumeric($("#total").val().trim()) && (parseFloat($("#total").val().trim()) >= 0.01 || parseFloat($("#total").val().trim()) <= -0.01)) {
      $("#total_error").attr("style", "display: none;");
      $("#modal_click").removeAttr('disabled').removeAttr("title");
      $("#total").val(parseFloat($("#total").val().trim()).toFixed(2));
    } else if (!$.isNumeric($("#total").val().trim())) {
      alert("不是数字");
      $("#total").delay(0).fadeIn(0, function () {
        $("#total").focus().select();
        $("#total").parent().addClass('has-error');
      });
    } else {
      $("#total").val(parseFloat($("#total").val().trim()).toFixed(2));
      $("#modal_click").attr("title", "总价错误").attr('disabled', '');
      $("#total_error").removeAttr("style");
    }
  }

  //(由总价)判断是否能提交
  function disable_able_submit() {
    if (!$.isNumeric($("#total").val().trim()) || parseFloat($("#total").val()) === 0) {
      $("#modal_click").attr("title", "总价错误").attr('disabled', '');
      $("#total_error").removeAttr("style");
    } else {
      var error = false;
      for ( var i = 0; i < count; i++) {
        if () {
          error = true;
        }
      }

        $("#total_error").attr("style", "display: none;");
        $("#modal_click").removeAttr('disabled').removeAttr("title");
    }
  }

  //新增商品
  function create_line() {
    var str_start = "<div class=\"row\" id=\"item" + count + "\" style=\"margin-bottom: 5px;\">";
    var str_line =
        "<div class=\"col-md-1\">\n" +
        " <p class=\"form-control-static\" id=\"good_num" + count + "\">" + (count + 1) + "</p>" +
        "</div>" +
        "<div class=\"col-md-2\">" +
        " <input class=\"form-control\" id=\"good_name" + count + "\" name=\"good_name" + count + "\" placeholder=\"名称\" required>" +
        "</div>" +
        "<div class=\"col-md-2\">" +
        " <div class=\"input-group\">" +
        "   <a class=\"btn input-group-addon\">$</a>" +
        "   <input class=\"form-control\" id=\"unit_price" + count + "\" name=\"unit_price" + count + "\" value=\"0.00\">" +
        " </div>" +
        "</div>" +
        "<div class=\"col-md-2\">" +
        " <input class=\"form-control\" id=\"unit" + count + "\" name=\"unit" + count + "\" value=\"1\">" +
        "</div>" +
        "<div class=\"col-md-2\">" +
        " <div class=\"input-group\">" +
        "   <span class=\"input-group-addon\">$</span>" +
        "   <input type=\"text\" class=\"form-control\" id=\"price" + count + "\" name=\"price" + count + "\" value=\"0.00\">" +
        " </div>" +
        "</div>" +
        "<div class=\"text-center col-md-1\">" +
        " <a class=\"btn btn-default\" id=\"tax_btn" + count + "\"><span id=\"tax_check" + count + "\" class=\"fa fa-square\" style=\"font-size:20px;\"></span></a>" +
        " <input class=\"hidden\" id=\"tax" + count + "\" name=\"tax" + count + "\" value=\"0\">" +
        "</div>" +
        "<div class=\"text-center col-md-1\">" +
        " <a href=\"#modal-memo" + count + "\" data-toggle=\"modal\" id=\"memo_click" + count + "\" class=\"btn btn-warning\"><span class=\"fa fa-pencil\"></span></a>" +
        "</div>" +
        "<div class=\"text-center col-md-1\">" +
        " <a href=\"#modal-delete" + count + "\" data-toggle=\"modal\" id=\"delete_click" + count + "\" class=\"btn btn-danger\"><span class=\"fa fa-trash\"></span></a>" +
        "</div>";
    var str_end = "</div>";
    var str_memo =
        "<div class=\"modal fade\" id=\"modal-memo" + count + "\" role=\"dialog\">" +
        " <div class=\"modal-dialog\">" +
        "   <div class=\"modal-content\">" +
        "     <div class=\"modal-header\">" +
        "       <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
        "       <h4 class=\"modal-title\">备注</h4>" +
        "     </div>" +
        "     <div class=\"modal-body\">" +
        "       <div class=\"form-group\">" +
        "         <label class=\"form-control-static\">打折商品: &nbsp;&nbsp;</label>" +
        "         <a class=\"btn btn-default\" id=\"on_sale_btn" + count + "\"><span id=\"on_sale_check" + count + "\" class=\"fa fa-square\" style=\"font-size:20px;\"></span></a>" +
        "         <input class=\"hidden\" id=\"on_sale" + count + "\" name=\"on_sale" + count + "\" value=\"0\">" +
        "       </div>" +
        "       <div class=\"form-group\">" +
        "         <label class=\"form-control-static\">备注: </label>" +
        "         <textarea id=\"memo" + count + "\" name=\"memo" + count + "\" class=\"form-control\"></textarea>" +
        "       </div>" +
        "     </div>" +
        "     <div class=\"modal-footer\">" +
        "       <a class=\"btn btn-default\" data-dismiss=\"modal\">保存</a>" +
        "     </div>" +
        "   </div>" +
        " </div>" +
        "</div>";
    var str_delete =
        "<div class=\"modal fade\" id=\"modal-delete" + count + "\" role=\"dialog\">" +
        " <div class=\"modal-dialog\">" +
        "   <div class=\"modal-content\">" +
        "     <div class=\"modal-header\">" +
        "       <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
        "       <h4 class=\"modal-title\">删除</h4>" +
        "     </div>" +
        "     <div class=\"modal-body\">" +
        "       <h4>确定删除吗？</h4>" +
        "     </div>" +
        "     <div class=\"modal-footer\">" +
        "       <a class=\"btn btn-default\" id=\"delete" + count + "\" data-dismiss=\"modal\">确定</a>" +
        "       <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">关闭</button>" +
        "     </div>" +
        "   </div>" +
        " </div>" +
        "</div>";

    var str = str_start + str_line + str_end + str_memo + str_delete;
    $("#good-container").append(str);

    onsale_checkbox(count);
    memo_btn(count);

    //删除商品/服务
    delete_btn(count);

    //当单价focusout时，计算合计、税、总价
    unit_price_focusout(count);

    //当数量focusout时，计算合计、税、总价
    unit_focusout(count);

    //当合计focusout时，计算单价（单价为0）或者计算数量（单价不为0）、税、总价
    price_focusout(count);

    //当交税状况改变时，计算税、总价
    tax_checkbox(count);

    //***当总价focusout时，提示计算错误

    count++;
    $("#count").removeAttr('value').attr('value', count);
  }

  //当更改消费者时，更改可使用的消费方式列表
  function change_pay_method(id) {
    $("#purchaser" + id).click(function () {
      $(".card").addClass("hidden").removeAttr("selected");
      $(".card" + id).removeClass("hidden");
      $("select[name='pay_method']:first").val('1');
    });
  }

  //交税勾选框
  function tax_checkbox(num) {
    $("#tax_btn" + num).click(function () {
      if ($("#tax" + num).val() === '0') {
        $("#tax_check" + num).removeAttr('class');
        $("#tax_check" + num).addClass('fa fa-check-square');
        $("#tax" + num).attr('value', '1');
        calculate_all();
      } else {
        $("#tax_check" + num).removeAttr('class');
        $("#tax_check" + num).addClass('fa fa-square');
        $("#tax" + num).attr('value', '0');
        calculate_all();
      }
    });
  }

  //打折勾选框
  function onsale_checkbox(num) {
    $("#on_sale_btn" + num).click(function () {
      if ($("#on_sale" + num).val() === '0') {
        $("#on_sale_check" + num).removeAttr('class');
        $("#on_sale_check" + num).addClass('fa fa-check-square');
        $("#on_sale" + num).attr('value', '1');
      } else {
        $("#on_sale_check" + num).removeAttr('class');
        $("#on_sale_check" + num).addClass('fa fa-square');
        $("#on_sale" + num).attr('value', '0');
      }
    });
  }

  //自动选中备注文本框
  function memo_btn(num) {
    $("#memo_click" + num).click(function () {
      $("#memo" + num).delay(250).fadeIn(0, function () {
        $(this).focus();
      });
    });
  }

  //删除商品/服务
  function delete_btn(num) {
    $("#delete" + num).click(function () {
      $("#item" + num).delay(400).fadeOut(300, function () {
        $(this).remove();
        $("#modal-memo" + num).remove();
        $("#modal-delete" + num).remove();

        //***改变后续商品/服务编号
        for (i = num; i < count; i++) {
          //***取消后续项目的功能
          $("#tax_btn" + (i + 1)).off();
          $("#on_sale_btn" + (i + 1)).off();
          $("#memo_click" + (i + 1)).off();
          $("#delete" + (i + 1)).off();
          $("#unit_price" + (i + 1)).off("focusout");
          $("#unit" + (i + 1)).off("focusout");

          //将所有号码提前1号
          $("#item" + (i + 1)).removeAttr('id').attr('id', "item" + i);
          $("#good_num" + (i + 1)).html(i + 1);
          $("#good_num" + (i + 1)).removeAttr('id').attr('id', "good_num" + i);
          $("#good_name" + (i + 1)).removeAttr('name').attr('name', "good_name" + i);
          $("#good_name" + (i + 1)).removeAttr('id').attr('id', "good_name" + i);
          $("#unit_price" + (i + 1)).removeAttr('name').attr('name', "unit_price" + i);
          $("#unit_price" + (i + 1)).removeAttr('id').attr('id', "unit_price" + i);
          $("#unit" + (i + 1)).removeAttr('name').attr('name', "unit" + i);
          $("#unit" + (i + 1)).removeAttr('id').attr('id', "unit" + i);
          $("#price" + (i + 1)).removeAttr('name').attr('name', "price" + i);
          $("#price" + (i + 1)).removeAttr('id').attr('id', "price" + i);
          $("#tax_btn" + (i + 1)).removeAttr('id').attr('id', "tax_btn" + i);
          $("#tax_check" + (i + 1)).removeAttr('id').attr('id', "tax_check" + i);
          $("#tax" + (i + 1)).removeAttr('name').attr('name', "tax" + i);
          $("#tax" + (i + 1)).removeAttr('id').attr('id', "tax" + i);
          $("#on_sale_btn" + (i + 1)).removeAttr('id').attr('id', "on_sale_btn" + i);
          $("#on_sale_check" + (i + 1)).removeAttr('id').attr('id', "on_sale_check" + i);
          $("#on_sale" + (i + 1)).removeAttr('name').attr('name', "on_sale" + i);
          $("#on_sale" + (i + 1)).removeAttr('id').attr('id', "on_sale" + i);
          $("#memo_click" + (i + 1)).removeAttr('href').attr('href', "#modal-memo" + i);
          $("#memo_click" + (i + 1)).removeAttr('id').attr('id', "memo_click" + i);
          $("#delete_click" + (i + 1)).removeAttr('href').attr('href', "#modal-delete" + i);
          $("#delete_click" + (i + 1)).removeAttr('id').attr('id', "delete_click" + i);
          $("#modal-memo" + (i + 1)).removeAttr('id').attr('id', "modal-memo" + i);
          $("#memo" + (i + 1)).removeAttr('id').attr('id', "memo" + i);
          $("#modal-delete" + (i + 1)).removeAttr('id').attr('id', "modal-delete" + i);
          $("#delete" + (i + 1)).removeAttr('id').attr('id', "delete" + i);

          //***恢复功能
          tax_checkbox(i);
          onsale_checkbox(i);
          memo_btn(i);
          delete_btn(i);
          unit_price_focusout(i);
          unit_focusout(i);
        }

        count--;
        $("#count").removeAttr('value').attr('value', count);

        //重新计算税和总价
        calculate_all();
      });
    });
  }

  //(当单价改变时)计算合计、税、总价
  function unit_price_focusout(num) {
    $("#unit_price" + num).change(function () {
      if ($.isNumeric($(this).val())) {
        $(this).parent().removeClass('has-error');
        if ($("#price" + num).val() === '0.00') {
          $('#price' + num).val(($(this).val() * $("#unit" + num).val()).toFixed(2));
          $(this).val(parseFloat($(this).val()).toFixed(2));
        }
        else {
          $("#unit" + num).val(($("#price" + num).val() / $(this).val()).toFixed(3));
        }
        calculate_all();
      } else {
        alert("不是数字");
        $(this).delay(0).fadeIn(0, function () {
          $(this).focus().select();
          $(this).parent().addClass('has-error');
        });
      }
    });
  }

  //当数量改变时，计算合计、税、总价
  function unit_focusout(num) {
    $("#unit" + num).change(function () {
      if ($.isNumeric($(this).val())) {
        $(this).parent().removeClass('has-error');
        $('#price' + num).val(($(this).val() * $("#unit_price" + num).val()).toFixed(2));
        if (($(this).val() % 1) === 0) {
          $(this).val(parseFloat($(this).val()).toFixed(0));
        } else if (($(this).val() % 1) !== 0) {
          $(this).val(parseFloat($(this).val()).toFixed(3));
        }
        calculate_all();
      } else {
        alert("不是数字");
        $(this).delay(0).fadeIn(0, function () {
          $(this).focus().select();
          $(this).parent().addClass('has-error');
        });
      }
    });
  }

  //当合计focusout时，计算单价（单价为0）或者计算数量（单价不为0）、税、总价
  function price_focusout(num) {
    $("#price" + num).focusout(function () {
      if ($.isNumeric($(this).val())) {
        $(this).parent().removeClass('has-error');
        $(this).val((1 * $(this).val()).toFixed(2));
        if ($("#unit_price" + num).val() === '0.00' && $(this).val() !== '0.00') { //单价为0，合计不为0
          if ($("#unit" + num).val() === '0') {
            $("#unit" + num).val("1");
            $("#unit_price" + num).val($(this).val());
          }
          else {
            $("#unit_price" + num).val((1.00 * $(this).val() / $("#unit" + num).val()).toFixed(2));
          }
        }
        else if ($(this).val() !== '0.00') {
          $("#unit" + num).val((1.00 * $(this).val() / $("#unit_price" + num).val()).toFixed(3));
        }
        else if ($("#unit_price" + num).val() !== '0.00') {
          $(this).val(($("#unit_price" + num).val() * $("#unit" + num).val()).toFixed(2));
        }
        calculate_all();
      } else {
        alert("不是数字");
        $(this).delay(0).fadeIn(0, function () {
          $(this).focus().select();
          $(this).parent().addClass('has-error');
        });
      }
//      if ($("#unit_price" + num).val() === '0.00' && $("#price" + num) === '0.00')
//        console.log("0.00");
    });
  }

  //计算税和总价
  function calculate_all() {
    var gst = 0.00;
    var pst = 0.00;
    var sum = 0.00;
    for (i = 0; i < count; i++) {

      if ($("#tax" + i).val() === '1') {
        gst += $("#price" + i).val() * 0.05;
        pst += $("#price" + i).val() * 0.08;
        sum += $("#price" + i).val() * 1.13;
      } else {
        gst += $("#price" + i).val() * 0;
        pst += $("#price" + i).val() * 0;
        sum += $("#price" + i).val() * 1;
      }
    }
    $("#gst").val(gst.toFixed(2));
    $("#pst").val(pst.toFixed(2));
    $("#total").val(sum.toFixed(2));
    disable_able_submit();
  }

  //计算总价（税手写），***修改tax格式
  function calculate_total() {
    var sum = 0.00;
    for (i = 0; i < count; i++) {
      sum += parseFloat($("#price" + i).val());
    }
    sum += parseFloat($("#gst").val());
    sum += parseFloat($("#pst").val());
    $("#total").val(sum.toFixed(2));
  }

  //添加新商店至数据库并加入至列表
  function submit_new_store() {
    var store_name_val = $("#store_name").val();
    var store_type_val = $("#store_type").val();
    var store_des_val = $("#store_des").val();
    var error = 0;
    if (store_name_val === "" || store_name_val === null)
      error += 1;
    if (store_type_val === "" || store_type_val === null)
      error += 2;
    if (store_des_val === "" || store_des_val === null)
      error += 4;

    if (error === 0) {
      $.ajax({
        url: "<?= base_url('Stores/ajax_insert') ?>",
        type: "post",
        dataType: "text",
        data: {
          store_name: store_name_val,
          store_type: store_type_val,
          store_des: store_des_val
        },
        success: function (new_id) {
          //绑定新商店
          $("#opt_add_store").remove();
          var str = "<option value='" + new_id + "'>" + store_name_val + "</option>";
          str += "<option value=\"-1\" id=\"opt_add_store\">新增商店/公司</option>";

          $("#store").append(str);
          $("#store:first").val(new_id);
          store_val = new_id;

          $("#store_name").val("");
          $("#store_type:first").val("1");
          $("#store_des").val("");
        }
      });
    }
  }

  function open_calendar() {
    $("#btn_calendar").click();
  }

</script>
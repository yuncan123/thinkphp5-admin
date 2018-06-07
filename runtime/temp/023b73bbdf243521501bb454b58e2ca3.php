<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/home/wwwroot/works.songqiphp.xin/public/../application/admin/view/login/login-index.html";i:1527753494;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="__STATIC__/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="__STATIC__/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="__STATIC__/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="__STATIC__/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<title>后台登录</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="index.html" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="name" name="name" type="text" placeholder="姓名" class="input-text size-L" value="<?php if(!empty($name) == true): ?><?php echo $name; endif; ?>">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="pwd" name="pwd" value="<?php if(!empty($pwd) == true): ?><?php echo $pwd; endif; ?>" type="password" placeholder="密码" class="input-text size-L" oninput="changep()">
          <input type="hidden" name="is_rem" value="<?php if(!empty($pwd) == true): ?>1<?php else: ?>0<?php endif; ?>" id="is_rem">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" id="captcha" value="验证码:" style="width:150px;">
          <img src="<?php echo captcha_src(); ?>" id="verify_img" style="width: 158px;height: 41px;padding-left: 3rem;" onclick="refreshVerify()"></div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online" style="cursor:pointer">
            <input type="checkbox" name="rempsw" id="online" checked="checked">
            记住账号密码</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" onclick="check()" style="width:94.41px">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright songqiphp.xin</div>
<script type="text/javascript" src="__STATIC__/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
</body>
</html>
<script>
  function check(){
    var pwd = $('#pwd').val();
    var name = $('#name').val();
    var captcha = $('#captcha').val();
    var rempsw = 0;
    var is_rem = $('#is_rem').val();
    if (pwd != '' && name != '' && captcha != '验证码:') {
      if($('#online').is(':checked')){
        rempsw = 1;
      }
      $.post(
        "<?php echo url('admin/login/index'); ?>",
        {pwd:pwd,name:name,captcha:captcha,rempsw:rempsw,is_rem:is_rem},
        function (dat){
            data = JSON.parse(dat);
              if(data.status == 1){
                  window.location.href = "<?php echo url("","",true,false);?>";
              }else{
                  alert(data.msg);return false;
              }
        });
      
    } else {
      alert('请填写登陆信息');
    }
  }

  function refreshVerify() {
    var ts = Date.parse(new Date())/1000;
    $('#verify_img').attr("src", "/captcha?id="+ts);
  }

  function changep(){
    $('input[name=is_rem]').val(0);
  }

</script>
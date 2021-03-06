<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"/Users/rain/WWW/leave/application/index/view/login/register.html";i:1557277846;}*/ ?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>请假管理系统</title>
  <meta name="description" content="请假管理系统">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="//public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="//public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/public/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="/public/assets/css/admin.css">
  <link rel="stylesheet" href="/public/assets/css/app.css">
</head>

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				<?php echo $title; ?> <i class="am-icon-skyatlas"></i>

			</div>
		</div>

		<div class="login-font">
			<i><?php echo $state; ?> </i>
			<span style="font-size: 25px;"> 学生注册页面</span>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form" method="post" action="/index.php/index/login/register">
				<input type="hidden" name="flag" value="1">
				<fieldset>
					<div class="am-form-group">
						<input type="text" class="" name="s_card"  required id="doc-ipt-email-1" placeholder="输入学号">
					</div>
					<div class="am-form-group">
						<input type="text" name="s_username" class="" required id="doc-ipt-pwd-1" placeholder="姓名">
					</div>
					<div class="am-form-group">
						<input type="password" name="s_password" class="" required id="doc-ipt-pwd-1" placeholder="密码">
					</div>
					<div class="am-form-group">
						<input type="text" name="s_phone" class="" required id="doc-ipt-pwd-1" placeholder="手机号">
					</div>
					<div class="am-form-group">
						<label for="s_g_id" class="am-u-sm-3 am-form-label">级别</label>
						<div class="am-u-sm-9">
							<select class="am-input-sm am-radius" id="s_g_id" name="s_g_id" onchange="change_class()">
								<option value="" >请选择级别</option>
								<?php if(is_array($grade_list) || $grade_list instanceof \think\Collection || $grade_list instanceof \think\Paginator): $i = 0; $__LIST__ = $grade_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $list['g_id']; ?>"><?php echo $list['g_name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<br>
					<div class="am-form-group">
						<label for="s_c_id" class="am-u-sm-3 am-form-label">班级</label>
						<div class="am-u-sm-9">
							<select class="am-input-sm am-radius" id="s_c_id"  name="s_c_id">
								<option value="">请选择班级</option>
							</select>
						</div>
					</div>
					<p><button type="submit"  class="am-btn am-btn-default">注册</button></p>
					<p><button type="button" onclick="location.href='/index.php/index/login/index';"  class="am-btn am-btn-default">学生登录</button></p>
				</fieldset>
			</form>
		</div>
	</div>
</div>

  <script src="/public/assets/js/jquery.min.js"></script>
  <script src="/public/assets/js/amazeui.min.js"></script>
  <script src="/public/assets/js/app.js"></script>
</body>
<script>

    function change_class(){
        var s_g_id = document.getElementById('s_g_id').value;
        $.get("/index.php/index/login/apply_ajax?s_g_id=" + s_g_id, function(data){
            var res = data;//转为Object对象
            var str = '<option value="">请选择班级</option>';
            for (var i=0;i<res.length;i++){
                str = str + '<option value="' + res[i].c_id + '">' + res[i].c_name + '</option>';
            }
            document.getElementById('s_c_id').innerHTML = str;
        });
    }
</script>
</html>
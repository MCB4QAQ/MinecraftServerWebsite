<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="author" content="yinq">
<title>登录 - CaryWorld管理面板</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/style.min.css">
<link rel="stylesheet" type="text/css" href="path/to/toastr.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lyear-loading.js"></script>
<script type="text/javascript" src="js/bootstrap-notify.min.js"></script>
<style>
</style>
</head>

<body class="bg-white overflow-x-hidden">
<div class="row bg-white vh-100">
  <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block" style="background-image: url(images/serverimg.png); background-size: cover;">
    <div class="d-flex vh-100">
      <div class="p-5 align-self-end">
        <br><br><br>
        <p class="text-white">欢迎来到CaryWorld后台管理系统</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-5 col-xl-4 align-self-center">
    <div class="p-5">
      <div class="text-center">
        <a href="index.html"> <img alt="CaryWorldAdmin" src="images/logo2.png"> </a>
      </div>
      <p class="text-center text-muted"><small>请使用您的账号登录系统</small></p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="signin-form needs-validation" novalidate>
        <div class="mb-3">
          <label for="username">用户名</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="请输入您的用户名" required>
        </div>
        <div class="mb-3">
          <label for="password">密码</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="请输入您的密码" required>
        </div>
        <div class="mb-3 d-grid">
          <button class="btn btn-primary" type="submit">立即登录</button>
        </div>
      </form>
      <p class="text-center text-muted mt-3">© 2022 <a target="_blank" href="//www.caryworld.top/">铭诚网络工作室</a>. All right reserved</p>
    </div>
  </div>
</div>

<?php
function getIP()
{
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        } 
    }
    return $realip;
}
$ip = getIP();

session_start();

// 检查是否已经登录
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取用户提交的用户名和密码
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // 连接数据库
    $servername = "localhost";
    $dbname = "cwweb";
    $username_db = "cwweb";
    $password_db = "EmFZRiJRxyXse4BR";
    
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    
    // 检查连接是否成功
    if ($conn->connect_error) {
        die("数据库连接失败: " . $conn->connect_error);
    }
    
    // 构建查询语句
    $sql = "SELECT * FROM control_panel_user WHERE name = '$username' AND passwd = '$password'";
    
    // 执行查询
    $result = $conn->query($sql);
    
    // 检查查询结果
    if ($result->num_rows > 0) {
        // 验证通过，设置登录状态
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time();
        $_SESSION['expire_time'] = time() + (60 * 60); // 1小时过期
        
        // 显示登录成功的消息提示框
        echo '<script>
            $.notify({
	            message: "登录成功，正在跳转...",
	        },{
	            type: "success",
	            placement: {
	            	from: "top",
	            	align: "right"
	            },
	            z_index: 10800,
	            delay: 1500,
                animate: {
                    enter: "animate__animated animate__fadeInUp",
                    exit: "animate__animated animate__fadeOutDown"
                }
	        });
        </script>';
        // 延时跳转到登录成功页面
        echo '<script>
            setTimeout(function(){
                window.location.href = "index.php";
            }, 1000);
        </script>';
        exit;
    } else {
        // 验证失败，显示错误信息
        echo '<script>
            $.notify({
	            message: "用户名或密码错误"
	        },{
	            type: "danger",
	            placement: {
	            	from: "top",
	            	align: "right"
	            },
	            z_index: 10800,
	            delay: 1500,
                animate: {
                    enter: "animate__animated animate__fadeInUp",
                    exit: "animate__animated animate__fadeOutDown"
                }
	        });
        </script>';
    }
    
    // 关闭数据库连接
    $conn->close();
}
?>
</body>
</html>
<?php
session_start();

// 检查是否已经登录
if (!isset($_SESSION['username']) || !isset($_SESSION['login_time']) || !isset($_SESSION['expire_time']) || $_SESSION['expire_time'] < time()) {
    // 未登录或登录已过期，跳转到登录页面
    header("Location: pages_login.php");
    exit;
}
?>
<?php

$oldpwd = $_GET['oldpwd'];
$newpwd = $_GET['newpwd'];
$confirmpwd = $_GET['confirmpwd'];
$servername = "localhost";
$username = "cwweb";
$password = "EmFZRiJRxyXse4BR";
$dbname = "cwweb";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检查连接
if ($conn->connect_error) {
    die("连接数据库失败，请联系网站管理员或稍后重试...");
}

// 预处理语句，防止SQL注入攻击
$stmt = $conn->prepare("SELECT passwd FROM control_panel_user");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($pass);
$stmt->fetch();

echo '您输入的旧密码：' . $oldpwd . '<br>';
echo '您输入的新密码：' . $newpwd . '<br>';
echo '您输入的重复密码：' . $confirmpwd . '<br>';

if ($confirmpwd == $newpwd) {
    $newpass = 'true';
    // 新密码 
}else {
    $newpass = 'false';
    echo "更改密码失败：新密码与重复密码不同。";
    // 新密码与重复密码不同提示
}

echo '新密码验证：' . $pass . '<br>';

if ($pass == $oldpwd) {
 $oldpass = 'true';
    // 旧密码检验
} else {
    $oldpass = 'false';
    echo "更改密码失败：旧密码填写错误。";
    // 旧密码填写错误提示
}

echo '旧密码验证：' . $oldpass . '<br>';

if ($oldpass == $newpass && $newpass == 'true') {
    // 使用预处理语句来防止SQL注入攻击
    $stmt = $conn->prepare("UPDATE control_panel_user SET passwd = ? WHERE id = 1");
    $stmt->bind_param("s", $newpwd);
    $stmt->execute();

    echo "修改密码成功！";
    session_start();

// 清除所有会话变量
$_SESSION = array();

// 如果存在会话 cookie，将其设置过期
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// 销毁会话
session_destroy();
    echo '<script>
            setTimeout(function(){
                window.location.href = "pages_login.php";
            }, 1000);
        </script>';
        exit;
} else {
    echo "更改密码失败：验证不通过。";
    echo '<script>
            setTimeout(function(){
                window.location.href = "pages_edit_pwd.php";
            }, 1500);
        </script>';
        exit;
}

$stmt->close();
$conn->close();
?>
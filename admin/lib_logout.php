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
$servername = "localhost";
$username = "cwweb";
$password = "EmFZRiJRxyXse4BR";
$dbname = "cwweb";
$ip = getIP();
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接数据库失败，请联系网站管理员或稍后重试...");
}
$sql = "INSERT INTO `safelog` (`file`, `do`, `ip`) VALUES ('/lib_logout.php', 'LOGOUT/退出登录', '$ip')";
if ($conn->query($sql) === TRUE) {
    
} else {
    echo "新的自检记录失败！" . "<br>";
    echo $conn->error;
}

session_start();

// 清除所有会话变量
$_SESSION = array();

// 如果存在会话 cookie，将其设置过期
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// 销毁会话
session_destroy();
?>
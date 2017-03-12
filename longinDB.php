<?php
include ('connectDB.php');
if (isset($_POST['signin'])){
    $personid = $_POST['personID'];
    $password = $_POST['password'];
    $result = $conn -> query("select personID,password,name form member where personID = '$personid'");
    $row = $result -> fetch();
    if($row["personID"] == $personid and $row["password"] == $password){
        echo "LONG IN Successful";
        session_start();
        $_SESSION['fname'] = $row["fname"];
        $_SESSION['lname'] = $row["lname"];
    }else{
        echo "คุณกรอก เลขบัตรประจำตัว และ รหัสผ่าน ไม่ถูกต้อง";
        echo "<meta http-equiv=\"refresh\" content=\"2;URL='http://nonghishop.hol.es/signin.php'\" />";
    }

}else{
    echo "NOT input username and password";
    echo "<meta http-equiv=\"refresh\" content=\"2;URL='http://locolhost/softeng/signin.php'\" />";
}
setcookie($cookiename,$cookvalue,time()+(600),"/");
?>
<html>
<head>
<meta>
</head>
<body>
<?php
    echo $_SESSION['username'];
    echo "cookie".$_COOKIE['$cookvalue'];
?>
</body>
</html>
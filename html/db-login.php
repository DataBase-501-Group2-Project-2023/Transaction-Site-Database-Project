<?php
#warning메세지 제거
ini_set('display_errors', '1');

include_once "encrypted_password.php"; #php 5.3.6 버전 이하에서 password 암호화 위하여 사용

$user_id = $_POST['user_id'];
$password = $_POST['user_password'];
$encrypted_password = null;
$wu = 0;
$wp = 0;

$oracle_username = "S3_501";
$oracle_password = "pw1234";
$oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

if (!is_null($user_id)) {
    $conn = oci_connect($oracle_username, $oracle_password, $oracle_db);
    $sql = "SELECT user_password FROM users WHERE user_id='$user_id'";
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);
    
    while ($row = oci_fetch_array($stmt, OCI_ASSOC)) {
        foreach ($row as $item) {
            $encrypted_password = $item;
        }
    }
    
    if (is_null($encrypted_password)) {
        $wu = 1;
        echo "<script>alert('아이디가 없습니다.!');</script>";
        echo "<script type='text/javascript'>
        location.href='auth-login-basic.php' 
        </script>";
    } else {
        if(password_verify($password, $encrypted_password)){
            session_start();
            $_SESSION['user_id'] = $user_id;
            echo "<script>alert('로그인에 성공하였습니다!');</script>";
            echo "<script type='text/javascript'>location.href='index.php'</script>"; 
            
        } else {
            $wp = 1;
            echo "<script>alert('비밀번호가 일치하지 않습니다.!');</script>";
            echo "<script type='text/javascript'>location.href='auth-login-basic.php' 
              </script>";
        }
    }

    oci_free_statement($stmt);
    oci_close($conn);
}   else {
    // user_id 또는 user_password가 전달되지 않았을 때의 처리
    echo "<script>alert('로그아웃 되었습니다!');</script>";
    echo "<script type='text/javascript'>location.href='auth-login-basic.php'</script>";
}
?>

<?php
# warning 메세지 제거
ini_set('display_errors', '1');

session_start();

include_once "encrypted_password.php"; #php 5.3.6 버전 이하에서 password 암호화 위하여 사용

$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$user_email = $_POST['user_email'];
$user_city = $_POST['user_city'];
$user_password = $_POST['user_password'];
$user_passwordcheck = $_POST['user_passwordcheck'];

$wu = 0;
$wp = 0;
$checkcounter = 0;

$oracle_username = "S3_501";
$oracle_password = "pw1234";
$oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

$conn = oci_connect($oracle_username, $oracle_password, $oracle_db,'UTF8');

if (!$conn) {
    $error = oci_error();
    echo "DB에 연결할 수 없습니다: " . $error['message'];
    exit;
}

if(!is_null($user_id)){
    $sql = "SELECT user_id FROM users WHERE user_id = '$user_id'";

    $stmt_check = oci_parse($conn, $sql);
    oci_execute($stmt_check);

    while ($row = oci_fetch_array($stmt_check, OCI_ASSOC)) {
        foreach ($row as $item) {
            $userid_exist = $item;
            if ($userid_exist == $user_id) {
                $checkcounter++;
            }
        }
    }

    oci_free_statement($stmt_check);
}

if($checkcounter > 0){
    $wu = 1;
    echo "<script>alert('이미 사용중인 아이디입니다. 다시 작성해주세요');</script>";
    echo "<script type='text/javascript'>
        location.href='auth-register-basic.php' 
        </script>";
} elseif ($user_password != $user_passwordcheck){
    $wp = 1;
    echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 작성해주세요');</script>";
    echo "<script type='text/javascript'>
    location.href='auth-register-basic.php'
    </script>";
} else{
    $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
    $query = "INSERT INTO USERS (user_id, user_name, user_phone, user_email, user_city, user_password) VALUES ('$user_id', '$user_name', '$user_phone', '$user_email', '$user_city', '$encrypted_password')";
    $stmt = oci_parse($conn, $query);

    // 데이터베이스에 데이터 삽입
    $result = oci_execute($stmt);
    oci_commit($conn);
    oci_free_statement($stmt);
    oci_close($conn);

    if (!$result) {
        $error = oci_error($stmt);
        echo "쿼리를 실행할 수 없습니다: " . $error['message'];
        oci_rollback($conn);
        exit;
}
    echo "<script>alert('회원가입이 완료 되었습니다. 로그인을 진행해주세요');</script>";
    echo "<script type='text/javascript'>
    location.href='auth-login-basic.php' 
    </script>";
}





?>

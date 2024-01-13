<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_city = $_POST['user_city'];

    $oracle_username = "S3_501";
    $oracle_password = "pw1234";
    $oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

    $oracle_conn = oci_connect($oracle_username, $oracle_password, $oracle_db,'UTF8');

    if (!$oracle_conn) {
        // 연결 실패시 JavaScript를 사용하여 팝업 표시 WHERE Users.user_id = '$user_id'
        echo '<script type="text/javascript">alert("Oracle DB 연결 실패");</script>';
    } else {

        $query="UPDATE Users 
                SET user_name = :user_name, 
                    user_email = :user_email, 
                    user_phone = :user_phone,
                    user_city = :user_city 
                WHERE Users.user_id = '$user_id'";

        // Prepare the statement
        $stmt = oci_parse($oracle_conn, $query);

        
        // Bind parameters
        oci_bind_by_name($stmt, ":user_name", $user_name);
        oci_bind_by_name($stmt, ":user_phone", $user_phone);
        oci_bind_by_name($stmt, ":user_email", $user_email);
        oci_bind_by_name($stmt, ":user_city", $user_city);

        // Execute the query
        $result=oci_execute($stmt);

        if($result){
            oci_commit($oracle_conn);
        
            echo '<script type="text/javascript">alert("회원정보 수정 성공");</script>';
            echo "<script type='text/javascript'>
            location.href='index.php'
            </script>";
            oci_free_statement($stmt);
            oci_close($oracle_conn);
        } else {
            $error = oci_error($stmt);
            oci_rollback($oracle_conn);
            echo '<script type="text/javascript">alert("회원정보 수정 실패");</script>';
            echo "사용자 정보 업데이트 오류: " . $error['message'];
        }
    }
} else {
    echo "로그인 세션이 없거나 만료하였습니다. 다시 로그인해주세요 :)";
}
?>

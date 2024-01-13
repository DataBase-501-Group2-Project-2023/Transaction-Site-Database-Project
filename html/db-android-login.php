<?php

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
        $response = array();
        $response["success"] = false;
        echo json_encode($response);
    } else {
        if(password_verify($password, $encrypted_password)){
            $response = array();
            $response["success"] = true;
            $response["user_id"] = $user_id;
            $response["user_password"] = $user_password;
            echo json_encode($response);
        } else {
            $wp = 1;
            $response = array();
            $response["success"] = false;
            echo json_encode($response);
        }
    }

    oci_free_statement($stmt);
    oci_close($conn);
}   else {
    $response = array();
    $response["success"] = false;
    echo json_encode($response);
}
?>

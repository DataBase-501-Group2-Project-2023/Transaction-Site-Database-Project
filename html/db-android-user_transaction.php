<?php
$user_id = $_POST['user_id'];

// Oracle DB 연결 정보
$oracle_username = "S3_501";
$oracle_password = "pw1234";
$oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

// Oracle DB 연결
$oracle_conn = oci_connect($oracle_username, $oracle_password, $oracle_db,'UTF8');

// Oracle DB 연결 여부 확인
if (!$oracle_conn) {
    // 연결 실패시 JavaScript를 사용하여 팝업 표시 WHERE Users.user_id = '$user_id'
    $response = array();
    $response["success"] = false;
    echo json_encode($response);
    //echo '<script type="text/javascript">alert("Oracle DB 연결 실패");</script>';
} else {
    $query = "SELECT USER_NAME,SHOP_NAME,PRODUCT_NAME,PURCHASE_DATE,PURCHASE_PRICE
                FROM Transactions
                JOIN Users ON Transactions.user_id = Users.user_id
                JOIN Shops ON Transactions.shop_id = Shops.shop_id
                WHERE Users.user_id = '$user_id'";
                
    $stmt = oci_parse($oracle_conn, $query);
    oci_execute($stmt);
    
    $response = array();
    $response["success"] = true;
    $response["user_id"] = $user_id;
    $response["user_name"] = $user_name;
    $response["shop_name"] = $shop_name;
    $response["product_name"] = $product_name;
    $response["purchase_date"] = $purchase_date;
    $response["purchase_price"] = $purchase_price;
    echo json_encode($response);

    oci_free_statement($stmt);
    oci_close($oracle_conn);
}
?>

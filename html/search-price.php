<?php
session_start();
// 세션에 저장된 user_id가 있는지 확인
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $selectedValue = $_POST['selectedValue'];
    $selectedItemName = $_POST['selectedItemNameback'];

    $oracle_username = "S3_501";
    $oracle_password = "pw1234";
    $oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

    $oracle_conn = oci_connect($oracle_username, $oracle_password, $oracle_db,'UTF8');

    if (!$oracle_conn) {
        // 연결 실패시 JavaScript를 사용하여 팝업 표시 
        echo '<script type="text/javascript">alert("Oracle DB 연결 실패");</script>';
    } else {
        // 품목 번호 가져온 뒤 물건 id 맵핑
        $product_ids = array();
        if($selectedValue == 1){
            $product_ids = implode(',', range(1, 51, 10));
        }else if($selectedValue == 2){
            $product_ids = implode(',', range(2, 52, 10));
        }else if($selectedValue == 3){
            $product_ids = implode(',', range(3, 53, 10));
        }else if($selectedValue == 4){
            $product_ids = implode(',', range(4, 54, 10));
        }else if($selectedValue == 5){
            $product_ids = implode(',', range(5, 55, 10));
        }else if($selectedValue == 6){
            $product_ids = implode(',', range(6, 56, 10));
        }else if($selectedValue == 7){
            $product_ids = implode(',', range(7, 57, 10));
        }else if($selectedValue == 8){
            $product_ids = implode(',', range(8, 58, 10));
        }else if($selectedValue == 9){
            $product_ids = implode(',', range(9, 59, 10));
        }else if($selectedValue == 10){
            $product_ids = implode(',', range(10, 60, 10));
        }

        // 품목 가격 정보 가져오기
        if (!empty($product_ids)) {
            $query ="SELECT p.shop_id, s.shop_name, p.price, p.product_id
                     FROM Products p 
                     JOIN Shops s ON p.shop_id = s.shop_id 
                     WHERE p.product_id IN ($product_ids) AND p.product_name = '$selectedItemName'";
            $stmt = oci_parse($oracle_conn, $query);
            $result=oci_execute($stmt);
            $prices = array();

            while ($row = oci_fetch_assoc($stmt)) {
                $price = array(
                    'shop_id' => $row['SHOP_ID'],
                    'shop_name' => $row['SHOP_NAME'],
                    'price' => $row['PRICE'],
                    'product_id' => $row['PRODUCT_ID']
                );
                $prices[] = $price;
            }
            oci_free_statement($stmt);
            if($result){
                //세션에 저장
                $_SESSION['prices'] = $prices;
                $_SESSION['product_ids'] = $product_ids;
                $_SESSION['selectedItemName'] = $selectedItemName;
                echo "<script>alert('조회에 성공하였습니다!');</script>";
                echo "<script type='text/javascript'>location.href='index.php'</script>";
                oci_free_statement($stmt);
                oci_close($oracle_conn);
            } else {
                $error = oci_error($stmt);
                echo "품목 가격 정보 로딩 오류: " . $error['message'];
            }
        }else{
            echo '<script type="text/javascript">alert("조회된 물건 없음");</script>';
            echo "<script type='text/javascript'>location.href='index.php'</script>";
            
        }
        oci_close($oracle_conn);
    }
} else {
    echo "로그인 세션이 없거나 만료하였습니다. 다시 로그인해주세요 :)";
}
?>
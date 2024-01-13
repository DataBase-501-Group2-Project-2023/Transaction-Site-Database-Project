<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $selected_name = $_SESSION['selectedItemName'];
    
        if (isset($_POST['selectedProduct'])) {
            list($selectedProductId, $selectedShopId, $purchase_price) = explode('|', $_POST['selectedProduct']);
        } else {
            echo "잘못된 접근입니다! 물건값 누락!";
        }
        // 현재 날짜 및 시간으로 설정
        $purchase_date = date('d-M-Y'); 

        $oracle_username = "S3_501";
        $oracle_password = "pw1234";
        $oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

        $oracle_conn = oci_connect($oracle_username, $oracle_password, $oracle_db,'UTF8');
        if ($oracle_conn) {
            $sql = "INSERT INTO Transactions (user_id, shop_id, product_id, purchase_date, purchase_price, product_name)
                    VALUES (:user_id, :shop_id, :product_id, TO_DATE(:purchase_date, 'DD-MON-YY'), :purchase_price,:product_name)";
            $stmt = oci_parse($oracle_conn, $sql);
            oci_bind_by_name($stmt, ':user_id', $user_id);
            oci_bind_by_name($stmt, ':shop_id', $selectedShopId);
            oci_bind_by_name($stmt, ':product_id', $selectedProductId);
            oci_bind_by_name($stmt, ':purchase_date', $purchase_date);
            oci_bind_by_name($stmt, ':purchase_price', $purchase_price);
            oci_bind_by_name($stmt, ':product_name', $selected_name);
            $result = oci_execute($stmt);

            oci_commit($oracle_conn);
            if ($result) {
                // 성공시 물품 테이블에서 구매된 물품 삭제
                $deleteSQL = "DELETE FROM AverageProductPrices WHERE product_id = :product_id";
                $deletestmt = oci_parse($oracle_conn, $deleteSQL);
                oci_bind_by_name($deletestmt, ':product_id', $selectedProductId);
                $deleteResult = oci_execute($deletestmt);

                oci_commit($oracle_conn);

                $delete2SQL = "DELETE FROM Products WHERE product_id = :product_id";
                $delete2stmt = oci_parse($oracle_conn, $delete2SQL);
                oci_bind_by_name($delete2stmt, ':product_id', $selectedProductId);
                $delete2Result = oci_execute($delete2stmt);


                oci_commit($oracle_conn);

                // 세션 초기화
                if ($deleteResult) {
                    unset($_SESSION['product_ids']);
                    unset($_SESSION['prices']);
                    unset($_SESSION['selectedProduct']);
                    unset($_SESSION['selectedValue']);
                    unset($_SESSION['selectedItemName']);

                    echo "<script>alert('구매가 완료되었습니다!');</script>";
                    echo "<script type='text/javascript'>location.href='account-settings.php'</script>";
                } else {
                    // 삽입 실패 시 롤백
                    oci_rollback($oracle_conn); 
                    echo "<script>alert('구매에 실패하였습니다!');</script>";
                    echo "<script type='text/javascript'>location.href='index.php'</script>";
                }
            } else {
                // 삽입 실패 시 롤백
                oci_rollback($oracle_conn); 
                echo "<script>alert('물건 삭제에 실패하였습니다!');</script>";
                echo "<script type='text/javascript'>location.href='index.php'</script>";
            }
            oci_free_statement($stmt);
            oci_close($oracle_conn);
            
        }else{
            // 연결 실패시 JavaScript를 사용하여 팝업 표시
            echo '<script type="text/javascript">alert("Oracle DB 연결 실패");</script>';
        }

    }else {
        echo "<script>alert('세션이 만료되었였습니다! 다시 로그인 해주세요');</script>";
        echo "<script type='text/javascript'>location.href='index.php'</script>";
    }
}else {
    echo "<script>alert('잘못된 접근입니다! POST 오류!');</script>";
    echo "<script type='text/javascript'>location.href='index.php'</script>";
}
?>
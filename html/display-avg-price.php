<?php
session_start();
if (isset($_SESSION['product_ids'])) {
    $product_ids = $_SESSION['product_ids'];
    $selectedItemName = $_SESSION['selectedItemName'];

    $oracle_username = "S3_501";
    $oracle_password = "pw1234";
    $oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

    $oracle_conn = oci_connect($oracle_username, $oracle_password, $oracle_db, 'UTF8');

    // 오라클 DB 연결 확인
    if (!$oracle_conn) {
        // 연결 실패시 JavaScript를 사용하여 팝업 표시
        echo '<script type="text/javascript">alert("Oracle DB 연결 실패");</script>';
    } else {
        // SQL 쿼리 작성
        $query = "SELECT average_price
                  FROM AverageProductPrices a
                  WHERE a.product_id IN ($product_ids)";

        // SQL 쿼리 실행
        $stmt = oci_parse($oracle_conn, $query);
        oci_execute($stmt);

        // 결과 처리
        while ($row = oci_fetch_assoc($stmt)) {
            $p_price = $row['AVERAGE_PRICE'];
            echo "<div style='background-color: #f8f9fa; padding: 20px; border-radius: 10px; margin-top: 20px;'>
                      <p style='font-size: 16px; line-height: 1.6;'>
                          <strong style='color: #007bff;'>한국농수산식품유통공사</strong>의 농식품 빅데이터 거래소 기준 <br>
                          <span style='font-weight: bold;'>{$selectedItemName}</span>의 평균 가격은<strong style='color: #28a745;'> {$p_price}원 </strong>입니다.
                      </p>
                  </div>";
            break;
        }
    }
} else {
    echo '<br><br><br><p style="font-size: 18px; font-weight: bold;">제품을 먼저 선택해 주세요.</p>';
}


                    
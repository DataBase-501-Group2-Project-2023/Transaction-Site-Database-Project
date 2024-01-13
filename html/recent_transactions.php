<?php
session_start();

// 세션에서 사용자 ID 등의 정보를 가져오기
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Oracle DB 연결 정보
    $oracle_username = "S3_501";
    $oracle_password = "pw1234";
    $oracle_db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=orcl)))";

    // Oracle DB 연결
    $oracle_conn = oci_connect($oracle_username, $oracle_password, $oracle_db,'UTF8');

    // Oracle DB 연결 여부 확인
    if (!$oracle_conn) {
        // 연결 실패시 JavaScript를 사용하여 팝업 표시 WHERE Users.user_id = '$user_id'
        echo '<script type="text/javascript">alert("Oracle DB 연결 실패");</script>';
    } else {
        $query = "SELECT *
                FROM (
                    SELECT USER_NAME,SHOP_NAME,PRODUCT_NAME,PURCHASE_DATE,PURCHASE_PRICE
                    FROM Transactions
                    JOIN Users ON Transactions.user_id = Users.user_id
                    JOIN Shops ON Transactions.shop_id = Shops.shop_id
                    ORDER BY Transactions.TRANSACTION_ID DESC 
                )
                WHERE ROWNUM <= 3";

        $stmt = oci_parse($oracle_conn, $query);
        oci_execute($stmt);

        echo "<style>
                table {
                    border-collapse: collapse;
                    width: 120%;
                    text-align: center;
                }

                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                th {
                    background-color: #f2f2f2;
                }
            </style>";

        echo "<table border='1' style='border-collapse: collapse; width: 120%;'>
                <thead>
                    <tr style='background-color: #f2f2f2;'>
                        <th>사용자</th>
                        <th>상점</th>
                        <th>물품</th>
                        <th>구매 날짜(일 / 월 / 년도)</th>
                        <th>거래 가격</th>
                    </tr>
                </thead>
                <tbody>";

        // 데이터를 HTML 표에 가져와서 표시
        while ($row = oci_fetch_assoc($stmt)) {
            echo "<tr>
                    <td>{$row['USER_NAME']}</td>
                    <td>{$row['SHOP_NAME']}</td>
                    <td>{$row['PRODUCT_NAME']}</td>
                    <td>{$row['PURCHASE_DATE']}</td>
                    <td>{$row['PURCHASE_PRICE']}</td>
                </tr>";
        }

        echo "</tbody></table>";

        oci_free_statement($stmt);
        oci_close($oracle_conn);
    }
} else {
    echo "로그인 세션이 없거나 만료하였습니다. 다시 로그인해주세요 :)";
}
?>

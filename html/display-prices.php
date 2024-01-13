<?php
session_start();

// 제품 가격 정보가 세션에 있는지 확인
if (isset($_SESSION['prices'])) {
    // 세션에서 제품 가격 및 선택된 제품 이름 가져오기
    $prices = $_SESSION['prices'];
    $selectedItemName = $_SESSION['selectedItemName'];

    // 제품 시세 결과 문구 출력
    echo "<div style='margin: 20px; text-align: center;'>";
    echo "<p style='font-size: 24px; font-weight: bold; margin-bottom: 10px;'>{$selectedItemName}의 시세 조회 결과입니다.</p>";

    // 제품 시세를 표 형태로 출력하기 위한 폼 시작
    echo "<form method='POST' action='purchase-product.php'>";
    echo "<table style='width: 70%; border-collapse: collapse; margin: auto; text-align: center;'>";
    echo "<tr><th>가게 상호명</th><th>가격</th><th>선택</th></tr>";

    // 각 제품 시세를 테이블 행으로 출력
    foreach ($prices as $price) {
        $product_id = $price['product_id'];
        $shop_id = $price['shop_id'];
        $purchase_price = $price['price'];

        echo "<tr>";
        echo "<td>{$price['shop_name']}</td>"; // 가게 상호명 열
        echo "<td>{$price['price']}원</td>";    // 가격 열
        echo "<td>";
        echo "<input type='radio' name='selectedProduct' value='{$product_id}|{$shop_id}|{$purchase_price}'> 선택"; // 선택 체크박스 열
        echo "</td>";
        echo "</tr>";
    }

    // 테이블 종료
    echo "</table>";
    echo "<br><hr><br>";

    // 구매 버튼
    echo "<button style='padding: 10px 20px; font-size: 16px; border: none; background-color: #007bff; color: #fff;' type='submit'>선택한 상품 구매하기</button>";

    // 폼 종료
    echo "</form></div>";
} else {
    // 제품을 선택하지 않은 경우 안내 메시지
    echo "<div style='text-align: center;'>";
    echo "<br><br><br><p style='font-size: 20px; font-weight: bold;'>제품을 먼저 선택해 주세요.</p>";
    echo "</div>";
}

# 농수산물 거래 플랫폼 기능 구현 "repo"

# Log in & create account 기능
<img width="1470" alt="스크린샷 2023-11-22 오후 11 50 59" src="https://github.com/WellshCorgi/Transaction-Site-Database-Project/assets/112881296/65e4c6b9-dbb4-486a-a80f-9f0ddafb1b59">

### 작동 파일
- db-login.php    
- logout.php  
- auth-login-basic.php         
- db-register.php 
- auth-register-basic.php   
- update_user.php
- encrypted_password.php     


### 작동 흐름
1. index.php 접속 / 세션 유효 확인
2. auth-login-basic.php 실행
3. 회원가입 버튼을 통한 db-register-basic.php 접속
4. 회원 가입 정보 입력 후, update_user.php를 통한 database 회원 등록  
5. encrypted_password.php를 통한 비밀번호 MD5 암호화
6. auth-login-basic.php - db-login.php를 통하여 계정 로그인 #<strong> 로그인 세션 유지</strong>
7. index.php 접속

<br><br><br>
# My Account Information [ 유저 개인 정보 수정 기능 & 거래 내역 조회 ]
<img width="1470" alt="스크린샷 2023-11-22 오후 11 51 28" src="https://github.com/WellshCorgi/Transaction-Site-Database-Project/assets/112881296/05948e2f-78df-4009-8657-1651d762ee5c">


### 작동 파일
- account-settings.php
- user_information.php
- user_recnet_transcations.php
- update_user.php


### 작동 흐름
1. index.php 접속 / 세션 유효 확인
2. account-settings.php 를 통해 내정보 접속
3. user_information.php 기존 세션을 통해 내 정보 불러오기
4. user_recent_transactions.php 를 통해 해당 회원의 모든 거래 불러오기
5. 변경 양식 입력 후 제출 시, update_user.php 를 통해 사용자 정보 수정 


<br><br><br> 
# 팀 프로젝트 구성원 소개 페이지
<img width="1196" alt="스크린샷 2023-11-29 오전 10 25 31" src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/8147a17a-679f-4955-afa2-323c90ef8016">

- tables-basic.php 

 
# 메인 홈페이지
<img width="1470" alt="스크린샷 2023-11-29 오전 10 17 25" src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/d5e85e2d-c45b-4760-b6e8-14d640b9f948">

## 도소매 시세가격 정보
<img width="559" alt="스크린샷 2023-11-29 오전 10 17 35" src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/b509ece5-9703-4acf-98c2-77cda753460e">

### 작동 파일
- index.php
- recent_transactions.php  
- search-price.php
- display-prices.php  
- display-avg-price.php
- purchase-product.php

### 작동 흐름
1. index.php 접속 / 세션 유효 확인
2. recent_transactions.php 를 통해 최근 거래 상단 3개 불러오기
3. 품목 선택 하고 조회하기 / search-price.php 품목 세션 유지 및 쿼리 진행
4. 조회 된 품목에 대한 상품 좌측에 표시 display-prices.php & 구매 버튼 활성화
5. 하단에 한국농수산물거래소 평균가격 출력 / display-avg-price.php
6. 구매 시 purchase-product.php 활성화 / 구매한 품목 물건 테이블에서 삭제
<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>회원가입 - DB Team 2</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/1437b234-02cc-4109-9c9d-ed9a0155c5b1" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <svg width="25" viewBox="0 0 25 42"></svg>
                  </span>
                  <img src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/1437b234-02cc-4109-9c9d-ed9a0155c5b1" alt class="w-px-40 h-auto " />
                  <span class="app-brand-text demo text-body fw-bolder">회원 가입하기</span>
                  <svg width="25" viewBox="0 0 25 42"></svg>
                </a>
              </div>
              <!-- /Logo -->

              <form id="formAuthentication" class="mb-3" action="./db-register.php" method="POST">
                <div class="mb-3">
                  <label for="user_id" class="form-label">아이디</label>
                  <input type="text" class="form-control" id="user_id" name="user_id" placeholder="아이디를 입력해주세요" autofocus required/>
                </div>

                <div class="mb-3">
                  <label for="user_name" class="form-label">이름</label> <!-- 레이블 수정 -->
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="이름을 입력해주세요" autofocus required/>
                  <br>

              <div class="mb-3">
                <label for="user_email" class="form-label">이메일</label> <!-- 레이블 수정 -->
                <input type="text" class="form-control" id="user_email" name="user_email" placeholder="이메일을 입력해주세요" autofocus required/>
                <br>

              <div class="mb-3">
                  <label for="user_city" class="form-label">거주지역</label> <!-- 레이블 수정 -->
                  <input type="text" class="form-control" id="user_city" name="user_city" placeholder="거주지를 입력해주세요 ex) 세종시" autofocus required/>
                  <br>

                <div class="mb-3">
                   <label for="user_phone" class="form-label">전화번호</label>
                   <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="전화번호를 입력해주세요" autofocus required
                    />
                  </div>


                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="user_password">비밀번호:</label>
                  <input type="password" id="user_password" class="form-control" name="user_password" placeholder="비밀번호" required>              
                  <div class="input-group input-group-merge">
                  <!--<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> 숨김 눈표시 -->
                  </div>
                </div>

                <!-- 패스워드 확인 입력란 -->
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="user_passwordcheck">비밀번호 확인:</label>
                <input type="password" id="user_passwordcheck" class="form-control" name="user_passwordcheck" placeholder="비밀번호 확인" required>              
                <div class="input-group input-group-merge">
                  <!--<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> 숨김 눈표시 -->
                </div>
              </div>
                
              <br>  
              <button class="btn btn-primary d-grid w-100" type="submit">가입하기</button>
              </form>

              <p class="text-center">
                <span>계정이 이미 있으신가요?</span>
                <a href="auth-login-basic.php">
                  <span>로그인 하기</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->
  </body>
</html>

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

    <title>Login page - DataBase Team 2</title>
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

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <svg width="25" viewBox="0 0 25 42"></svg>
                  </span>
                  <img src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/1437b234-02cc-4109-9c9d-ed9a0155c5b1" alt class="w-px-40 h-auto " />
                  <span class="app-brand-text demo text-body fw-bolder">농수산물 거래 플랫폼</span>
                  <svg width="25" viewBox="0 0 25 42"></svg>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">반갑습니다! 👋 <br><br>농수산물 거래 플랫폼입니다! </h4>
              <p class="mb-4"><strong>'상점 별 최저가 가격비교'</strong>를 통해 저렴하게 구입하세요!</p>

              <form id="formAuthentication" class="mb-3" action="db-login.php" method="POST">
                <div class="mb-3">
                  <label for="user_id" class="form-label">아이디</label>
                  <input type="text" class="form-control" id="user_id" name="user_id" placeholder="아이디를 입력해주세요" autofocus required/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="user_password">비밀번호</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="user_password" class="form-control" name="user_password"  />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">로그인</button>
                </div>
              </form>

              <p class="text-center">
                <span>처음 이용하시나요?</span>
                <a href="auth-register-basic.php">
                  <span>계정 생성하기</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->
    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>

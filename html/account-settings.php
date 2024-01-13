<!DOCTYPE html>
<?php
  session_start(); // 세션 시작

  // 사용자가 로그인되어 있는지 확인
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
  }else{
    header("Location: auth-login-basic.php");
    exit();
  }
?>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
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

    <title>Account Information - Database Team 2</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />

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

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->


        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <img src="../assets/img/avatars/hongik.jpg" alt class="w-px-40 h-auto " />
              <span class="app-brand-text demo menu-text fw-bolder ms-2">TEAM 2</span>
            </a>
          </div>
          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">품목 및 시세 비교하기</div>
              </a>
            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">공공데이터 LINK</span></li>
            
            <li class="menu-item">
              <a
                href="https://kadx.co.kr/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Support">전국 시세 공공 데이터</div>
              </a>
            </li>
           
            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Site &amp; Github</span></li>
            <!-- Forms -->
            <li class="menu-item">
              <a
              href="https://www.hongik.ac.kr/index.do"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Support"> Hongik.univ</div>
              </a>
            </li>
            <li class="menu-item">
              <a
              href="http://software.hongik.ac.kr/home/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Support">Dept.Software</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://github.com/DataBase-501-Group2-Project-2023"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Support">Our Github</div>
              </a>
            </li>

            <!-- Tables -->
            <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Members</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- 홈페이지 이름 -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <img src="../assets/img/favicon.png" alt class="w-px-40 h-auto " />
                  <svg width="25" viewBox="0 0 25 42"></svg>
                  <a href="index.php">
                  <span class="app-brand-text demo text-body fw-bolder">농수산물 거래 플랫폼</span>
                  <svg width="25" viewBox="0 0 40 42"></svg>
                </div>
              </div>
              <!-- 홈페이지 이름 부분 -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a> 어서오세요! 반갑습니다! </a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/6fbf151f-a1e3-4a8a-be28-6b44a1d0110f" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="account-settings.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">내 정보</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Information /</span> My Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/6fbf151f-a1e3-4a8a-be28-6b44a1d0110f"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div>
                        <?php
                          include "user_information.php";
                          ?>
                        </div>

                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="update_user.php" style="display: none;">
                        <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="user_name" class="form-label">이름</label>
                            <input
                              type="text"
                              class="form-control"
                              id="name"
                              name="user_name"
                              value=""
                              autofocus required
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="user_email" class="form-label">이메일</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="user_email"
                              value=""
                              placeholder="database@db.com"
                              autofocus required
                            />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="user_phone">전화번호</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="phoneNumber"
                                name="user_phone"
                                class="form-control"
                                placeholder="010-xxxx-xxxx"
                                autofocus required
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="user_city" class="form-label">거주 지역</label>
                            <input class="form-control" type="text" id="address" name="user_city" placeholder="ex) 서울" autofocus required />
                          </div>
                        </div>
                        <div class="mt-2 text-center" >
                          <button type="submit" class="btn btn-primary me-2">변경 사항 저장</button>
                          <button id="cancelButton" type="reset" class="btn btn-outline-secondary">취소</button>
                        </div>
                        <script>
                        </script>
                      </form>
                    </div>
                    <button id="editButton" type="submit" class="btn btn-primary me-2">정보 수정하기</button>

                    <script>
                      const editButton = document.querySelector("#editButton");
                      const cancelButton = document.querySelector("#cancelButton");
                      const formAccountSettings = document.querySelector("#formAccountSettings");

                      editButton.addEventListener("click", function() {
                        if(formAccountSettings.style.display == "none"){
                          formAccountSettings.style.display = "block";
                        }else{
                          formAccountSettings.style.display = "none";
                        }  
                      });
                      cancelButton.addEventListener("click", function() {
                        // 모든 입력 필드의 값을 빈 문자열로 설정하여 지우기(초기화)
                        const inputFields = formAccountSettings.querySelectorAll("input");
                        inputFields.forEach(function(input) {
                          input.value = "";
                        });
                      });
                    </script>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">고객님의 농수산물 거래 내역</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <?php
                          include 'user_recnet_transcations.php';
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made by Hongik.university "DataBase and exercise" Team 2 Project.
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/pages-account-settings-account.js"></script>
  </body>
</html>

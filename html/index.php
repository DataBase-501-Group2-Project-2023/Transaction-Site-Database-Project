<!DOCTYPE html>
<?php
  session_start(); // 세션 시작

  // 사용자가 로그인되어 있는지 확인
  if (!isset($_SESSION['user_id'])) {
      // 로그인되어 있지 않다면 로그인 페이지로 리다이렉트
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
    <title>Database Team 2</title>
    <meta name="description" content="홍익대학교 2023년 DATABASE 강의 2조 프로젝트 입니다." />

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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->


        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <img src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/eae17f03-cab2-4615-9917-b2709521b6cd" alt class="w-px-40 h-auto " />
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
              <a href="tables-basic.php" class="menu-link">
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
                  <img src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/1437b234-02cc-4109-9c9d-ed9a0155c5b1" alt class="w-px-40 h-auto " />
                  <svg width="25" viewBox="0 0 25 42"></svg>
                  <span class="app-brand-text demo text-body fw-bolder">농수산물 거래 플랫폼</span>
                  <svg width="25" viewBox="0 0 25 42"></svg>
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
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        
                        <div class="card-body">
                          <h5 class="card-title text-primary">최근 플랫폼에서 거래된 내역 🎉</h5>
                          <?php
                            include 'recent_transactions.php';
                          ?>

                        </div>
                      </div>
                      <div class="col-sm-4 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/6cabe344-3f9c-4616-872b-5a0a88b1d31e"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/52153fe8-b89b-4256-8b3c-4bde3f03f022"
                            data-app-light-img="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/52153fe8-b89b-4256-8b3c-4bde3f03f022"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-14 col-lg-12 order-0 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">시세 조회</h5>
                        <hr>
                        <div id="totalRevenueChart" class="px-2"></div>
                        <div class="text-center">
                          <div id="result">
                            <?php
                              include 'display-prices.php';
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                type="button"
                                id="growthReportId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              <span id="selectedItemName">품목</span>
                              </button>
                              
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="max-height: 200px; overflow-y: auto;">
                                <a class="dropdown-item" onclick="setSelectedValue(1,'tangerine')">tangerine</a>
                                <a class="dropdown-item" onclick="setSelectedValue(2,'apple')">apple</a>
                                <a class="dropdown-item" onclick="setSelectedValue(3, 'grapes')">grapes</a>
                                <a class="dropdown-item" onclick="setSelectedValue(4,'potato')">potato</a>
                                <a class="dropdown-item" onclick="setSelectedValue(5,'napacabbage')">napacabbage</a>
                                <a class="dropdown-item" onclick="setSelectedValue(6,'onion')">onion</a>
                                <a class="dropdown-item" onclick="setSelectedValue(7,'cutlassfish')">cutlassfish</a>
                                <a class="dropdown-item" onclick="setSelectedValue(8,'mackerel')">mackerel</a>
                                <a class="dropdown-item" onclick="setSelectedValue(9,'chicken')">chicken</a>
                                <a class="dropdown-item" onclick="setSelectedValue(10,'pork')">pork</a>
                              </div>

                              <form id="category" method="POST"  action="search-price.php">
                                <input type="hidden" id="selectedValue" name="selectedValue">
                                <input type="hidden" id="selectedItemNameback" name="selectedItemNameback">
                                <button class="btn btn-sm btn-primary" id="search" type="submit" onclick="submitForm()">조회</button>
                              </form>
                              

                              <script>
                                function setSelectedValue(value, itemName,imageURL) {
                                  document.getElementById('selectedValue').value = value;
                                  document.getElementById('selectedItemName').innerText = itemName;
                                  document.getElementById('selectedItemNameback').value = itemName;
                                  

                                  //기본 이미지 설정 후 클릭시에 해당 이미지 변경
                                  var imageSrc='';
                                  switch(value){
                                    case 1:
                                      imageSrc='https://github-production-user-asset-6210df.s3.amazonaws.com/112881296/284073042-b9f772c1-f765-4e7b-834b-23a28d143b7f.png'
                                      break;
                                    case 2:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/f4bc4296-598d-4506-a5e4-e0b6fb9f230d'
                                      break;
                                    case 3:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/e472ea68-cd1a-432e-b61f-b0b526580269'
                                      break;
                                    case 4:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/64285521-8acc-4484-b534-51d91ba2aa80'
                                      break;
                                    case 5:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/9246436c-a133-431f-8fb1-7c8eae4dbcef'
                                      break;
                                    case 6:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/676db317-9d0d-49f2-978b-bf3f71068599'
                                      break;
                                    case 7:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/1c80aef9-6b6a-449c-9089-64a02c40dd53'
                                      break;
                                    case 8:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/71dc2f6d-b956-4007-a786-361cdb99ebb2'
                                      break;
                                    case 9:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/94ca6cc1-4796-4450-9725-c290ec70c9ef'
                                      break;
                                    case 10:
                                      imageSrc='https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/5603c510-6c72-4305-9dca-10a58bc6c46b'
                                      break;
                                  }

                                  document.getElementById('itemImage').src = imageSrc;

                                }
                                function submitForm() {
                                    document.getElementById('category').submit();
                                }

                              </script>
                              </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="text-center fw-semibold pt-3 mb-2">
                            <div id="selectedItemImage" style="display: inline-block;">
                              <img id="itemImage" alt="Selected Item Image" src="https://github.com/DataBase-501-Group2-Project-2023/.github/assets/112881296/aea8a760-d1ae-4282-96cf-5105c52c4040" alt="Default Image" style="display: block; max-width: 100%; height: auto;">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-7 col-lg-5 order-0 order-md-3 order-lg-2 mb-4">
                  
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="col-md-8">
                        <h5 class="m-0 me-2">해당 상품의 평균 가격</h5>
                      </div>
                    </div>
                    <hr>
                    <div class="card-body">
                    <?php
                      include 'display-avg-price.php';
                    ?>
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

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>

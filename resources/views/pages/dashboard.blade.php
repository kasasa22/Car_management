@include("components.header")

<body>

@include("components.topnav")
@include("components.sidebar")

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">
          <!-- Total Vehicles Sold Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="total-vehicles-sold.html">
                <div class="card-body">
                  <h5 class="card-title">Total Vehicles Sold</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-car-front"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Total Vehicles Sold Card -->

          <!-- Total Amount Sold Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="total-amount-sold.html">
                <div class="card-body">
                  <h5 class="card-title">Total Amount Sold</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$123,456</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Total Amount Sold Card -->

          <!-- Total Amount Paid Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="total-amount-paid.html">
                <div class="card-body">
                  <h5 class="card-title">Total Amount Paid</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-exchange"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$98,765</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Total Amount Paid Card -->

          <!-- Total Balance Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="total-balance.html">
                <div class="card-body">
                  <h5 class="card-title">Total Balance</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$24,691</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Total Balance Card -->

          <!-- Vehicles with Balance Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="vehicles-with-balance.html">
                <div class="card-body">
                  <h5 class="card-title">Vehicles with Balance</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>30</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Vehicles with Balance Card -->

          <!-- Upcoming Payments Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="upcoming-payments.html">
                <div class="card-body">
                  <h5 class="card-title">Upcoming Payments</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar3"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$5,000</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Upcoming Payments Card -->

          <!-- Vehicles Owned Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="vehicles-owned.html">
                <div class="card-body">
                  <h5 class="card-title">Vehicles Owned</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-car-front-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>200</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Vehicles Owned Card -->

          <!-- Expenses Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <a href="expenses.html">
                <div class="card-body">
                  <h5 class="card-title">Expenses</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$45,000</h6> <!-- Replace with dynamic value -->
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Expenses Card -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">
        <!-- Recent Activity -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Recent Activity <span>| Today</span></h5>
            <div class="activity">
              <!-- Add dynamic recent activity content here -->
              <div class="activity-item d-flex">
                <div class="activite-label">32 min</div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                  Sold a vehicle <a href="#" class="fw-bold text-dark">Toyota Camry</a> for $15,000
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">56 min</div>
                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                <div class="activity-content">
                  Received payment for <a href="#" class="fw-bold text-dark">Honda Accord</a>
                </div>
              </div><!-- End activity item-->

              <!-- Continue adding recent activities here -->

            </div>
          </div>
        </div><!-- End Recent Activity -->
      </div><!-- End Right side columns -->
    </div>
  </section>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>

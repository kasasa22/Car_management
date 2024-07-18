@include("components.header")

<body>

@include("components.topnav")
@include("components.sidebar")

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Vehicles</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Vehicles</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
      <div class="card-header">
        <b>List of Vehicles</b>
      </div>
      <table class="table table-condensed table-bordered table-hover datatable no-footer">
        <thead>
          <tr>
            <th>Number Plate</th>
            <th>Date of Purchase</th>
            <th>Date of Sale</th>
            <th>Duration in Parking (days)</th>
            <th>Parking Fee</th>
            <th>Status</th>
            <th>Date Given Out (Installments)</th>
            <th>Date of First Payment (Installments)</th>
            <th>Date to be Completed (Installments)</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example row, replace with dynamic content -->
          <tr>
            <td>ABC123</td>
            <td>2023-01-15</td>
            <td>2023-06-20</td>
            <td>156</td>
            <td>$200</td>
            <td>Sold</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>XYZ789</td>
            <td>2023-03-05</td>
            <td></td>
            <td>50</td>
            <td>$50</td>
            <td>Installments</td>
            <td>2023-04-01</td>
            <td>2023-05-01</td>
            <td>2024-04-01</td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </section>
</main>
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

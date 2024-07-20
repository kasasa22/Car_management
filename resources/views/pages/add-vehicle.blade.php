@include("components.header")

<body>

@include("components.topnav")
@include("components.sidebar")

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Vehicle</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Add Vehicle</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
      <div class="card-header">
        <b>Add New Vehicle</b>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('vehicles.store') }}">
          @csrf
          <div class="row mb-3">
            <label for="vehicleName" class="col-sm-2 col-form-label">Vehicle Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="vehicleName" name="name" placeholder="Enter Vehicle Name">
            </div>
          </div>
          <div class="row mb-3">
            <label for="vehicleNo" class="col-sm-2 col-form-label">Vehicle No.</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="vehicleNo" name="number" placeholder="Enter Vehicle Number">
            </div>
          </div>
          <div class="row mb-3">
            <label for="color" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="color" name="color" placeholder="Enter Vehicle Color">
            </div>
          </div>
          <div class="row mb-3">
            <label for="model" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="model" name="model" placeholder="Enter Vehicle Model">
            </div>
          </div>
          <div class="row mb-3">
            <label for="amountPaid" class="col-sm-2 col-form-label">Amount Paid</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="amountPaid" name="amount_paid" placeholder="Enter Amount Paid">
            </div>
          </div>
          <div class="row mb-3">
            <label for="balance" class="col-sm-2 col-form-label">Balance</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter Balance">
            </div>
          </div>
          <div class="row mb-3">
            <label for="dateBought" class="col-sm-2 col-form-label">Date Bought</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="dateBought" name="date_bought">
            </div>
          </div>
          <div class="row mb-3">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="status" name="status" placeholder="Enter Status">
            </div>
          </div>
          <div class="row mb-3">
            <label for="amountCredited" class="col-sm-2 col-form-label">Amount Credited</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="amountCredited" name="amount_credited" placeholder="Enter Amount Credited">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add Vehicle</button>
        </form>
      </div>
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

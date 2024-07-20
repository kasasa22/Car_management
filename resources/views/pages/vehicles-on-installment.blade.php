@include("components.header")

<body>

@include("components.topnav")
@include("components.sidebar")

<main id="main" class="main">

  <div class="pagetitle">
    <h1>View On Installments</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">View On Installments</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
      <div class="card-header">
        <b>Vehicles On Installments</b>
      </div>
      <div class="card">
        <div class="card-body">
          <!-- Vehicles Table -->
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Vehicle Name</th>
                <th scope="col">Vehicle No.</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Dynamic Data Rows -->
              <tr>
                <th scope="row">1</th>
                <td>Toyota Lexus</td>
                <td>UBK479X</td>
                <td><button class="btn btn-primary view-btn" data-vehicle='{"name":"Toyota Lexus","number":"UBK479X","color":"White","model":"2008","customerName":"Katoko Zainabu","customerContact":"0787423182/0755364787","amountSold":"29,500,000","amountPaid":"16,500,000","totalAmount":"29,500,000","balance":"0","dateBought":"June","period":"1 Month","status":"Cleared","amountCredited":"11,500,000","monthlyDeposits":"June: 5,000,000, July: 11,500,000"}'>View</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Toyota Rumion</td>
                <td>UBQ030S</td>
                <td><button class="btn btn-primary view-btn" data-vehicle='{"name":"Toyota Rumion","number":"UBQ030S","color":"White","model":"2010","customerName":"Kabuga Abbey","customerContact":"779216401","amountSold":"31,000,000","amountPaid":"11,000,000","totalAmount":"31,000,000","balance":"11,000,000","dateBought":"May","period":"1 month and two weeks","status":"Expired Time","amountCredited":"0","monthlyDeposits":"N/A"}'>View</button></td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table>
          <!-- End Vehicles Table -->

          <!-- Simulated Pagination Links -->
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
          <!-- End Simulated Pagination Links -->
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Modal Structure -->
<div class="modal fade" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vehicleModalLabel">Vehicle Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul id="vehicleDetails">
          <!-- Vehicle details will be populated here -->
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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

<!-- Custom JS for Modal -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-btn');

    viewButtons.forEach(button => {
      button.addEventListener('click', function () {
        const vehicle = JSON.parse(this.getAttribute('data-vehicle'));

        const detailsList = document.getElementById('vehicleDetails');
        detailsList.innerHTML = `
          <li><strong>Vehicle Name:</strong> ${vehicle.name}</li>
          <li><strong>Vehicle No.:</strong> ${vehicle.number}</li>
          <li><strong>Color:</strong> ${vehicle.color}</li>
          <li><strong>Model:</strong> ${vehicle.model}</li>
          <li><strong>Customer Name:</strong> ${vehicle.customerName}</li>
          <li><strong>Customer Contact:</strong> ${vehicle.customerContact}</li>
          <li><strong>Amount Sold:</strong> ${vehicle.amountSold}</li>
          <li><strong>Amount Paid:</strong> ${vehicle.amountPaid}</li>
          <li><strong>Total Amount:</strong> ${vehicle.totalAmount}</li>
          <li><strong>Balance:</strong> ${vehicle.balance}</li>
          <li><strong>Date Bought:</strong> ${vehicle.dateBought}</li>
          <li><strong>Period:</strong> ${vehicle.period}</li>
          <li><strong>Status:</strong> ${vehicle.status}</li>
          <li><strong>Amount Credited:</strong> ${vehicle.amountCredited}</li>
          <li><strong>Monthly Deposits:</strong> ${vehicle.monthlyDeposits}</li>
        `;

        const vehicleModal = new bootstrap.Modal(document.getElementById('vehicleModal'));
        vehicleModal.show();
      });
    });
  });
</script>

</body>
</html>

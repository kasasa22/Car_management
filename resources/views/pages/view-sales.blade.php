<!DOCTYPE html>
<html lang="en">
<head>
  @include("components.header")
</head>
<body>

@include("components.topnav")
@include("components.sidebar")

<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Sales</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">View Sales</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
      <div class="card-header">
        <b>Sales List</b>
      </div>
      <div class="card-body">
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Vehicle Name</th>
              <th scope="col">Vehicle plate</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Amount Paid</th>
              <th scope="col">Sale Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sales as $sale)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $sale->vehicle->name }}</td>
              <td>{{ $sale->vehicle->number }}</td>
              <td>{{ $sale->customer_name }}</td>
              <td>{{ $sale->amount_paid }}</td>
              <td>{{ $sale->sale_date }}</td>
              <td>
                <button class="btn btn-primary view-btn" data-id="{{ $sale->id }}">View</button>
                {{-- <a href="{{ route('sales.print', $sale->id) }}" class="btn btn-secondary print-btn">Print</a> --}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

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
      </div>
    </div>
  </section>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Modal Structure -->
<div class="modal fade" id="saleModal" tabindex="-1" aria-labelledby="saleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="saleModalLabel">Sale Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul id="saleDetails">
          <!-- Sale details will be populated here -->
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
        const saleId = this.getAttribute('data-id');

        fetch(`/sales/${saleId}`)
          .then(response => response.json())
          .then(sale => {
            const detailsList = document.getElementById('saleDetails');
            detailsList.innerHTML = `
              <li><strong>Vehicle Name:</strong> ${sale.vehicle.name}</li>
              <li><strong>Customer Name:</strong> ${sale.customer_name}</li>
              <li><strong>Customer Contact:</strong> ${sale.customer_contact}</li>
              <li><strong>Amount Paid:</strong> ${sale.amount_paid}</li>
              <li><strong>Sale Date:</strong> ${sale.sale_date}</li>
              <li><strong>Payment Type:</strong> ${sale.payment_type}</li>
              <li><strong>Balance:</strong> ${sale.balance}</li>
              <li><strong>Chassis Number:</strong> ${sale.chassis_number}</li>
              <li><strong>Total Amount:</strong> ${sale.total_amount}</li>
              <li><strong>Period:</strong> ${sale.period}</li>
              <li><strong>Amount Credited:</strong> ${sale.amount_credited}</li>
              <li><strong>Monthly Deposit:</strong> ${sale.monthly_deposit}</li>
            `;

            const saleModal = new bootstrap.Modal(document.getElementById('saleModal'));
            saleModal.show();
          }).catch(error => {
            console.error('Error fetching sale details:', error);
          });
      });
    });
  });
</script>

</body>
</html>

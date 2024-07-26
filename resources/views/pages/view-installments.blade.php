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
    <h1>View Installments</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">View Installments</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
      <div class="card-header">
        <b>Installment Plans List</b>
      </div>
      <div class="card-body">
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Vehicle Name</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Total Amount</th>
              <th scope="col">Monthly Deposit</th>
              <th scope="col">Balance</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($installmentPlans as $plan)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $plan->name }}</td>
              <td>{{ $plan->customer_name }}</td>
              <td>{{ $plan->total_amount }}</td>
              <td>{{ $plan->monthly_deposit }}</td>
              <td>{{ $plan->balance }}</td>
              <td>
                <button class="btn btn-primary pay-btn" data-vehicle-id="{{ $plan->id }}" data-sale-id="{{ $plan->sale_id }}">Pay</button>
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
<!-- Payment Modal Structure -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Make Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="paymentForm" method="POST" action="{{ route('make-payment') }}">
            @csrf
            <input type="hidden" name="vehicle_id" id="vehicle_id">
            <input type="hidden" name="sale_id" id="sale_id">
            <div class="mb-3">
              <label for="payment_amount" class="form-label">Payment Amount</label>
              <input type="number" class="form-control" id="payment_amount" name="payment_amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Payment</button>
          </form>
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
<!-- Blade Template -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const payButtons = document.querySelectorAll('.pay-btn');

      payButtons.forEach(button => {
        button.addEventListener('click', function () {
          const vehicleId = this.getAttribute('data-vehicle-id');
          const saleId = this.getAttribute('data-sale-id');

          document.getElementById('vehicle_id').value = vehicleId;
          document.getElementById('sale_id').value = saleId;

          const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
          paymentModal.show();
        });
      });
    });
  </script>


</body>
</html>

@include("components.header")

<body>

@include("components.topnav")
@include("components.sidebar")

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Record Sales</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Record Sales</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
      <div class="card-header">
        <b>Record a New Sale</b>
      </div>
      <div class="card-body">
        <form id="recordSaleForm" action="{{ route('sales.store') }}" method="POST">
          @csrf
          <div class="row mb-3">
            <label for="vehicle_id" class="col-sm-2 col-form-label">Vehicle Name</label>
            <div class="col-sm-10">
              <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                <option value="" disabled selected>Select Vehicle</option>
                @foreach ($availableVehicles as $vehicle)
                  <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="customer_name" class="col-sm-2 col-form-label">Customer Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="amount_paid" class="col-sm-2 col-form-label">Amount Paid</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="amount_paid" name="amount_paid" placeholder="Enter Amount Paid" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="payment_type" class="col-sm-2 col-form-label">Payment Type</label>
            <div class="col-sm-10">
              <select class="form-control" id="payment_type" name="payment_type" required>
                <option value="full">Full Payment</option>
                <option value="installment">Installment</option>
              </select>
            </div>
          </div>
          <div class="row mb-3" id="balance_row" style="display: none;">
            <label for="balance" class="col-sm-2 col-form-label">Balance</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="balance" name="balance" placeholder="Enter Balance">
            </div>
          </div>
          <div class="row mb-3">
            <label for="chassis_number" class="col-sm-2 col-form-label">Chassis Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="chassis_number" name="chassis_number" placeholder="Enter Chassis Number" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="sale_date" class="col-sm-2 col-form-label">Sale Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="sale_date" name="sale_date" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Record Sale</button>
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

<!-- Custom JS for Balance Field -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const paymentTypeSelect = document.getElementById('payment_type');
    const balanceRow = document.getElementById('balance_row');

    paymentTypeSelect.addEventListener('change', function () {
      if (this.value === 'installment') {
        balanceRow.style.display = '';
      } else {
        balanceRow.style.display = 'none';
      }
    });

    // Handle form submission with AJAX
    document.getElementById('recordSaleForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const formData = new FormData(this);

      fetch('{{ route('sales.store') }}', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Sale recorded successfully');

          // Update vehicle details in the modal
          fetch(`/vehicles/${data.vehicle_id}`)
            .then(response => response.json())
            .then(vehicle => {
              updateVehicleDetails(vehicle);
            });
        } else {
          alert('Error recording sale');
        }
      })
      .catch(error => console.error('Error:', error));
    });
  });

  function updateVehicleDetails(vehicle) {
    const detailsList = document.getElementById('vehicleDetails');
    detailsList.innerHTML = `
      <li><strong>Vehicle Name:</strong> ${vehicle.name}</li>
      <li><strong>Vehicle No.:</strong> ${vehicle.number}</li>
      <li><strong>Color:</strong> ${vehicle.color}</li>
      <li><strong>Model:</strong> ${vehicle.model}</li>
      <li><strong>Status:</strong> ${vehicle.status}</li>
      <li><strong>Customer Name:</strong> ${vehicle.customer_name}</li>
      <li><strong>Customer Contact:</strong> ${vehicle.customer_contact}</li>
      <li><strong>Amount Sold:</strong> ${vehicle.amount_sold}</li>
      <li><strong>Amount Paid:</strong> ${vehicle.amount_paid}</li>
      <li><strong>Total Amount:</strong> ${vehicle.total_amount}</li>
      <li><strong>Balance:</strong> ${vehicle.balance}</li>
      <li><strong>Date Bought:</strong> ${vehicle.date_bought}</li>
      <li><strong>Period:</strong> ${vehicle.period}</li>
      <li><strong>Amount Credited:</strong> ${vehicle.amount_credited}</li>
      <li><strong>Monthly Deposit:</strong> ${vehicle.monthly_deposit}</li>
    `;

    if (vehicle.expenses && vehicle.expenses.length > 0) {
      detailsList.innerHTML += `<li><strong>Expenses:</strong></li>`;
      let expensesTable = `
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Date</th>
              <th>Amount</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
      `;
      vehicle.expenses.forEach(expense => {
        expensesTable += `
          <tr>
            <td>${expense.date}</td>
            <td>${expense.amount}</td>
            <td>${expense.description}</td>
          </tr>
        `;
      });
      expensesTable += `</tbody></table>`;
      detailsList.innerHTML += expensesTable;
    } else {
      detailsList.innerHTML += `<li>No expenses recorded for this vehicle.</li>`;
    }

    const vehicleModal = new bootstrap.Modal(document.getElementById('vehicleModal'));
    vehicleModal.show();
  }
</script>

</body>
</html>

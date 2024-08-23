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
      <div class="card-body">
        <!-- Vehicles Table -->
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Vehicle Name</th>
                <th scope="col">Vehicle No.</th>
                <th scope="col">Color</th>
                <th scope="col">Model</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vehicles as $vehicle)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $vehicle->name }}</td>
                <td>{{ $vehicle->number }}</td>
                <td>{{ $vehicle->color }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->status }}</td>
                <td><button class="btn btn-primary view-btn" data-id="{{ $vehicle->id }}">View</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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
  </section>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Modal Structure -->
<div class="modal fade" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
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
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS for Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewButtons = document.querySelectorAll('.view-btn');

        viewButtons.forEach(button => {
            button.addEventListener('click', function () {
                const vehicleId = this.getAttribute('data-id');
                fetchVehicleDetails(vehicleId);
            });
        });
    });

    function fetchVehicleDetails(vehicleId) {
        fetch(`/vehicles/${vehicleId}`)
            .then(response => response.json())
            .then(vehicle => {
                updateVehicleDetails(vehicle);
                const vehicleModal = new bootstrap.Modal(document.getElementById('vehicleModal'));
                vehicleModal.show();
            })
            .catch(error => console.error('Error fetching vehicle details:', error));
    }

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
        <li><strong>Parking Fee:</strong> shs.${vehicle.parking_fee}</li>
        <li><strong>Amount Bought:</strong> ${vehicle.amount_paid}</li>
        <li><strong>Blocker Fee:</strong> ${vehicle.blocker_fee}</li>
        <li><strong>Total Amount:</strong> ${vehicle.total_amount}</li>
        <li><strong>Balance:</strong> ${vehicle.balance}</li>
        <li><strong>Date Bought:</strong> ${vehicle.date_bought}</li>
        <li><strong>Period:</strong> ${vehicle.period}</li>
        <li><strong>Amount Credited:</strong> ${vehicle.amount_credited}</li>
        <li><strong>Monthly Deposit:</strong> ${vehicle.monthly_deposit}</li>
    `;

    if (vehicle.expenses && vehicle.expenses.length > 0) {
    detailsList.innerHTML += `<li><strong>Expenses:</strong></li>`;
    let totalExpenses = 0;
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
        const expenseDate = new Date(expense.created_at).toLocaleDateString('en-GB', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        });
        totalExpenses += parseFloat(expense.amount);
        expensesTable += `
            <tr>
                <td>${expenseDate}</td>
                <td>${expense.amount}</td>
                <td>${expense.description || 'N/A'}</td>
            </tr>
        `;
    });
    expensesTable += `
        <tr>
            <td><strong>Total Expenses:</strong></td>
            <td colspan="2">${totalExpenses.toFixed(2)}</td>
        </tr>
    `;
    expensesTable += `</tbody></table>`;
    detailsList.innerHTML += expensesTable;
} else {
    detailsList.innerHTML += `<li>No expenses recorded for this vehicle.</li>`;
}

}


</script>

</body>
</html>

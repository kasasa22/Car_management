<!DOCTYPE html>
<html lang="en">
<head>
  @include("components.header")
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Additional responsive styles */
    .table-responsive {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }

    .modal-dialog {
      max-width: 90%;
      margin: 1.75rem auto;
    }

    /* Adjust modal title font size on smaller screens */
    @media (max-width: 576px) {
      .modal-title {
        font-size: 1.25rem;
      }
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
      .pagetitle h1 {
        font-size: 1.5rem;
      }
      .breadcrumb-item {
        font-size: 0.875rem;
      }
    }
  </style>
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
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Vehicle Name</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Monthly Deposit</th>
                <th scope="col">Balance</th>
                {{-- <th scope="col">Action</th> --}}
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
                {{-- <td>
                  <button class="btn btn-primary pay-btn" data-vehicle-id="{{ $plan->id }}" data-sale-id="{{ $plan->sale_id }}">Pay</button>
                </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

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
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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

    document.getElementById('paymentForm').addEventListener('submit', function (event) {
      event.preventDefault();

      const vehicleId = document.getElementById('vehicle_id').value;
      const paymentAmount = document.getElementById('payment_amount').value;

      fetch('{{ route('make-payment') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          vehicle_id: vehicleId,
          payment_amount: paymentAmount,
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const balanceCell = document.querySelector(`button[data-vehicle-id="${vehicleId}"]`).closest('tr').querySelector('td:nth-child(6)');
          balanceCell.textContent = data.balance.toFixed(2);

          // Hide the modal after successful payment
          const paymentModal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
          paymentModal.hide();
        } else {
          // Handle error
          alert('Payment failed. Please try again.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Payment failed. Please try again.');
      });
    });
  });
</script>

</body>
</html>

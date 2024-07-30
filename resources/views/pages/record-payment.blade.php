<!DOCTYPE html>
<html lang="en">
<head>
    @include("components.header")
    <style>
        .full-width {
            width: 100%;
        }
    </style>
</head>
<body>

    @include("components.topnav")
    @include("components.sidebar")

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Record Payments</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Record Payments</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Record a Payment</h5>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('record-payment.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="vehicle_id" class="form-label">Vehicle</label>
                                    <select name="vehicle_id" id="vehicle_id" class="form-select full-width" required>
                                        <option value="">Select a vehicle</option>
                                        @foreach($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->name }} (Plate: {{ $vehicle->number }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="sale-details" style="display: none;">
                                    <h5 class="mt-3">Sale Details</h5>
                                    <ul class="list-group full-width">
                                        <li class="list-group-item"><strong>Customer Name:</strong> <span id="customer_name"></span></li>
                                        <li class="list-group-item"><strong>Customer Contact:</strong> <span id="customer_contact"></span></li>
                                        <li class="list-group-item"><strong>Amount Paid:</strong> <span id="amount_paid"></span></li>
                                        <li class="list-group-item"><strong>Balance:</strong> <span id="balance"></span></li>
                                        <li class="list-group-item"><strong>Amount Credited:</strong> <span id="amount_credited"></span></li>
                                        <li class="list-group-item"><strong>Monthly Deposit:</strong> <span id="monthly_deposit"></span></li>
                                    </ul>
                                </div>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" step="0.01" name="amount" id="amount" class="form-control full-width" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Record Payment</button>
                            </form>

                        </div>
                    </div>
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

    <!-- Custom JS -->
    <script>
        document.getElementById('vehicle_id').addEventListener('change', function() {
            const vehicleId = this.value;
            if (vehicleId) {
                fetch(`/get-sale-details/${vehicleId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                            document.getElementById('sale-details').style.display = 'none';
                        } else {
                            document.getElementById('customer_name').textContent = data.customer_name;
                            document.getElementById('customer_contact').textContent = data.customer_contact;
                            document.getElementById('amount_paid').textContent = data.amount_paid;
                            document.getElementById('balance').textContent = data.balance;
                            document.getElementById('amount_credited').textContent = data.amount_credited;
                            document.getElementById('monthly_deposit').textContent = data.monthly_deposit;
                            document.getElementById('sale-details').style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching sale details:', error);
                        document.getElementById('sale-details').style.display = 'none';
                    });
            } else {
                document.getElementById('sale-details').style.display = 'none';
            }
        });
    </script>

</body>
</html>

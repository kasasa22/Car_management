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
            <h1>Record Sales</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

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
                            <label for="customer_contact" class="col-sm-2 col-form-label">Customer Contact</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_contact" name="customer_contact" placeholder="Enter Customer Contact">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="customer_location" class="col-sm-2 col-form-label">Customer Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_location" name="customer_location" placeholder="Enter Customer Location" required>
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
                        <div class="row mb-3" id="total_amount_row" style="display: none;">
                            <label for="total_amount" class="col-sm-2 col-form-label">Total Amount</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Enter Total Amount">
                            </div>
                        </div>
                        <div class="row mb-3" id="period_row" style="display: none;">
                            <label for="period" class="col-sm-2 col-form-label">Period</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="period" name="period" placeholder="Enter Period">
                            </div>
                        </div>
                        <div class="row mb-3" id="amount_credited_row" style="display: none;">
                            <label for="amount_credited" class="col-sm-2 col-form-label">Amount Credited</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="amount_credited" name="amount_credited" placeholder="Enter Amount Credited">
                            </div>
                        </div>
                        <div class="row mb-3" id="monthly_deposit_row" style="display: none;">
                            <label for="monthly_deposit" class="col-sm-2 col-form-label">Monthly Deposit</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="monthly_deposit" name="monthly_deposit" placeholder="Enter Monthly Deposit">
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
            const totalAmountRow = document.getElementById('total_amount_row');
            const periodRow = document.getElementById('period_row');
            const amountCreditedRow = document.getElementById('amount_credited_row');
            const monthlyDepositRow = document.getElementById('monthly_deposit_row');

            paymentTypeSelect.addEventListener('change', function () {
                if (this.value === 'installment') {
                    balanceRow.style.display = '';
                    totalAmountRow.style.display = '';
                    periodRow.style.display = '';
                    amountCreditedRow.style.display = '';
                    monthlyDepositRow.style.display = '';
                } else {
                    balanceRow.style.display = 'none';
                    totalAmountRow.style.display = 'none';
                    periodRow.style.display = 'none';
                    amountCreditedRow.style.display = 'none';
                    monthlyDepositRow.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>

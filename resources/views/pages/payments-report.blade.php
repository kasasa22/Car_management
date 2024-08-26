<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header')
</head>
<body>
    @include('components.topnav')
    @include('components.sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Payments Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Payments Reports</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <!-- Form and Print Button -->
                            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                                <form id="filter-report" method="GET" action="{{ route('payments-report') }}" class="d-flex flex-wrap mb-2 mb-md-0">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <label for="month_of" class="control-label me-2">Month of:</label>
                                        <input type="month" id="month_of" name="month_of" class="form-control me-2 mb-2 mb-md-0" value="{{ request()->get('month_of', date('Y-m')) }}">
                                        <button class="btn add-btnn btn-sm btn-primary">Filter</button>
                                    </div>
                                </form>
                                <button class="btn add-btn btn-sm btn-success" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                            </div>

                            <hr>
                            <div id="report">
                                <div class="on-print text-center">
                                    <p>Payments Report</p>
                                    <p>for the Month of <b>{{ date('F, Y', strtotime(request()->get('month_of', date('Y-m')) . '-1')) }}</b></p>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date of Payment</th>
                                                    <th>Vehicle</th>
                                                    <th>Vehicle Number</th>
                                                    <th>Amount Paid</th>
                                                    <th>Balance</th>
                                                    <th>Recorded By (User)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $payments = \App\Models\Payment::with(['vehicle', 'user'])
                                                        ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [request()->get('month_of', date('Y-m'))])
                                                        ->orderBy('created_at', 'asc')
                                                        ->get();
                                                    $totalAmountPaid = $payments->sum('amount');
                                                    $totalBalance = $payments->sum(function($payment) {
                                                        return $payment->vehicle->balance;
                                                    });
                                                @endphp
                                                @forelse ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ date('M d, Y', strtotime($payment->created_at)) }}</td>
                                                        <td>{{ $payment->vehicle->name ?? 'N/A' }}</td>
                                                        <td>{{ $payment->vehicle->number ?? 'N/A' }}</td>
                                                        <td class="text-end">{{ number_format($payment->amount, 2) }}</td>
                                                        <td class="text-end">{{ number_format($payment->vehicle->balance, 2) }}</td>
                                                        <td>{{ $payment->user->name ?? 'N/A' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>No Data.</center>
                                                        </th>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">Total</th>
                                                    <th class='text-end'>{{ number_format($totalAmountPaid, 2) }}</th>
                                                    <th class='text-end'>{{ number_format($totalBalance, 2) }}</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('#print').click(function() {
                var _style = $('<style>').append($('style').clone()).html(); // Cloning styles to the new window
                var _content = $('#report').clone(); // Cloning content to the new window
                var nw = window.open("", "_blank", "width=800,height=700");

                nw.document.open();
                nw.document.write('<html><head><title>Print Report</title>' + _style + '</head><body>');
                nw.document.write(_content.html());
                nw.document.write('</body></html>');
                nw.document.close();
                nw.focus(); // Ensure the new window is focused
                nw.print();
                setTimeout(function() {
                    nw.close();
                }, 500);
            });

            $('#filter-report').submit(function(e) {
                e.preventDefault();
                location.href = '{{ route("payments-report") }}?' + $(this).serialize();
            });
        });
    </script>
</body>
</html>

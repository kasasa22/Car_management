@include('components.header')

<body>
    @include('components.topnav')
    @include('components.sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sales Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Sales Reports</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <form id="filter-report" method="GET" action="{{ route('sales-report') }}">
                                <div class="row form-group">
                                    <label class="control-label col-md-2 offset-md-2 text-left">Month of: </label>
                                    <input type="month" name="month_of" class='form-control col-md-4 float-right search-btn' value="{{ request()->get('month_of', date('Y-m')) }}">
                                    <button class="btn add-btnn float-right btn-sm btn-block btn-primary col-md-2 ml-1">Filter</button>
                                </div>
                            </form>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn add-btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                            <div id="report">
                                <div class="on-print">
                                    <p>
                                        <center>Sales Report</center>
                                    </p>
                                    <p>
                                        <center>for the Month of <b>{{ date('F ,Y', strtotime(request()->get('month_of', date('Y-m')) . '-1')) }}</b></center>
                                    </p>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Vehicle</th>
                                                <th>Customer</th>
                                                <th>Chassis Number</th>
                                                <th>Amount</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sales = \App\Models\Sale::with('vehicle')
                                                    ->whereRaw("DATE_FORMAT(sale_date, '%Y-%m') = ?", [request()->get('month_of', date('Y-m'))])
                                                    ->orderBy('sale_date', 'asc')
                                                    ->get();
                                                $totalAmount = $sales->sum('amount_paid');
                                                $totalBalance = $sales->sum('balance');
                                            @endphp
                                            @forelse ($sales as $sale)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ date('M d, Y', strtotime($sale->sale_date)) }}</td>
                                                    <td>{{ $sale->vehicle->name }}</td>
                                                    <td>{{ $sale->chassis_number }}</td>
                                                    <td class="text-right">{{ number_format($sale->amount_paid, 2) }}</td>
                                                    <td class="text-right">{{ number_format($sale->balance, 2) }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="6">
                                                        <center>No Data.</center>
                                                    </th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Total</th>
                                                <th class='text-right'>{{ number_format($totalAmount, 2) }}</th>
                                                <th class='text-right'>{{ number_format($totalBalance, 2) }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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

    <script>
        $('#print').click(function() {
            var _style = $('<noscript>').append($('style').clone()).html();
            var _content = $('#report').clone();
            var nw = window.open("", "_blank", "width=800,height=700");
            nw.document.write(_style);
            nw.document.write(_content.html());
            nw.document.close();
            nw.print();
            setTimeout(function() {
                nw.close();
            }, 500);
        });

        $('#filter-report').submit(function(e) {
            e.preventDefault();
            location.href = '{{ route("sales-report") }}?' + $(this).serialize();
        });
    </script>
</body>
</html>

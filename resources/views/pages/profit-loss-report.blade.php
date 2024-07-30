@include('components.header')

<body>
    @include('components.topnav')
    @include('components.sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profit/Loss Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profit/Loss Reports</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <button class="btn add-btn btn-sm btn-success" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                            </div>

                            <hr>
                            <div id="report">
                                <div class="on-print">
                                    <p>
                                        <center>Profit/Loss Report</center>
                                    </p>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Vehicle Name</th>
                                                <th>Selling Price</th>
                                                <th>Buying Price</th>
                                                <th>Total Expenses</th>
                                                <th>Profit/Loss</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($profitLossData as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data['vehicle']->name }}</td>
                                                    <td>{{ number_format($data['vehicle']->total_amount, 2) }}</td>
                                                    <td>{{ number_format($data['vehicle']->amount_paid, 2) }}</td>
                                                    <td>{{ number_format($data['total_expenses'], 2) }}</td>
                                                    <td>{{ number_format($data['profit_loss'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total Profit/Loss</th>
                                                <th>{{ number_format($profitLossData->sum('profit_loss'), 2) }}</th>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
    </script>
</body>
</html>

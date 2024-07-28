<!-- resources/views/pages/view-expenses.blade.php -->

@include("components.header")

<body>

    @include("components.topnav")
    @include("components.sidebar")

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>View Expenses</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">View Expenses</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Expenses</h5>

                    <!-- Expense Table -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Vehicle Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->name }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->description }}</td>
                                    <td>{{ $expense->vehicle->name }}</td>
                                    <td>{{ $expense->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Expense Table -->

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>

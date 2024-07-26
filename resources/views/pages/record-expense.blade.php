@include("components.header")

<body>

    @include("components.topnav")
    @include("components.sidebar")

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Record Expenses</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Record Expenses</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Record New Expense</h5>
                    @include("components.header")

                    <body>

                        @include("components.topnav")
                        @include("components.sidebar")

                        <main id="main" class="main">

                            <div class="pagetitle">
                                <h1>Record Expenses</h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active">Record Expenses</li>
                                    </ol>
                                </nav>
                            </div><!-- End Page Title -->

                            <section class="section dashboard">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Record New Expense</h5>

                                        <!-- Expense Form -->
                                        <form method="POST" action="{{ route('expenses.store') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="text" class="form-control" id="amount" name="amount" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <input type="text" class="form-control" id="category" name="category" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="vehicle_id" class="form-label">Vehicle</label>
                                                <select class="form-control" id="vehicle_id" name="vehicle_id">
                                                    @foreach($vehicles as $vehicle)
                                                        <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        <!-- End Expense Form -->

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

                    </body>

                    </html>

                    <!-- Expense Form -->
                    <form method="POST" action="{{ route('expenses.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="vehicle_name" class="form-label">Vehicle Name</label>
                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- End Expense Form -->

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

</body>

</html>

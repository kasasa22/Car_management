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
        <form action="{{ route('sales.store') }}" method="POST">
          @csrf
          <div class="row mb-3">
            <label for="vehicle_name" class="col-sm-2 col-form-label">Vehicle Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" placeholder="Enter Vehicle Name" required>
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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="b

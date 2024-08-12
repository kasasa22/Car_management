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
        <h1>Installments Reports</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Installments Reports</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <!-- Filter form and print button -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <form id="filter-report" method="GET" action="{{ route('installments-report') }}" class="d-flex">
                            <div class="d-flex align-items-center">
                                <label for="month_of" class="control-label me-2">Month of:</label>
                                <input type="month" id="month_of" name="month_of" class='form-control me-2' value="{{ request()->get('month_of', date('Y-m')) }}">
                                <button class="btn add-btnn btn-sm btn-primary">Filter</button>
                            </div>
                        </form>
                        <button class="btn add-btn btn-sm btn-success" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                    </div>

                    <hr>

                    <div id="report">
                        <div class="on-print">
                            <p>
                                <center>Installments Report</center>
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
                                        <th>Date Recorded</th>
                                        <th>Vehicle</th>
                                        <th>Vehicle Number</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalAmount = 0;
                                        $totalBalance = $installments->sum('balance');
                                    @endphp
                                    @forelse ($installments as $installment)
                                        @php
                                            $vehicleAmount = $installment->vehicle->total_amount;
                                            $totalAmount += $vehicleAmount;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('M d, Y', strtotime($installment->created_at)) }}</td>
                                            <td>{{ $installment->vehicle->name }}</td>
                                            <td>{{ $installment->vehicle->number }}</td>
                                            <td class="text-right">{{ number_format($vehicleAmount, 2) }}</td>
                                            <td class="text-right">{{ number_format($installment->balance, 2) }}</td>
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
    </section>
</main><!-- End #main -->

<a href="#" class="back-to

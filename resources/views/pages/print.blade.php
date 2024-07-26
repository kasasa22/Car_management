<!DOCTYPE html>
<html lang="en">
<head>
    @include("components.header")
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DDAMBA MOTOS</h2>
        <p>Mengo Bakuli Next to Hass Petrol Station Mufunya Road</p>
        <p>+256 703 972410 | +256 779 159943 | +256 753 224359</p>
        <hr>

        <p>Date: {{ $sale->sale_date }}</p>
        <p>AG, No: {{ $sale->id }}</p>

        <h4>BUYER'S DETAILS:</h4>
        <p>Names: {{ $sale->customer_name }} | Phone No: {{ $sale->customer_contact }}</p>
        <p>Address: </p>
        <p>Sex: </p>

        <p>NIN: </p>
        <p>Permit No: </p>

        <h4>IT IS HEREBY AGREED AS FOLLOWS:</h4>
        <ol>
            <li>That the vendor has agreed to sell the said vehicle and the purchaser has agreed to buy the said vehicle in the condition of “as it is”.</li>
            <li>Agreed Purchase Price is: UGx: {{ number_format($sale->total_amount, 2) }} (In words: {{ ucwords(\NumberFormatter::create('en', \NumberFormatter::SPELLOUT)->format($sale->total_amount)) }})</li>
            <li>Purchaser Has Paid a Non-refundable amount of: UGx: {{ number_format($sale->amount_paid, 2) }}</li>
            <li>Balance is: UGx: {{ number_format($sale->balance, 2) }} (In words: {{ ucwords(\NumberFormatter::create('en', \NumberFormatter::SPELLOUT)->format($sale->balance)) }})</li>
        </ol>

        <p>The Seller is RESPONSIBLE for all the illegal Crimes, Penalties, and offences committed before the Date the buyer purchased the Specified vehicle in this Agreement.</p>

        <h4>Seller's Details:</h4>
        <p>Names:</p>
        <p>Sign:</p>
        <p>Tel:</p>

        <h4>Buyer's Details:</h4>
        <p>Names: {{ $sale->customer_name }}</p>
        <p>Sign:</p>
        <p>Tel: {{ $sale->customer_contact }}</p>

        <button class="btn btn-primary no-print" onclick="window.print();">Print</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary no-print">Back to Dashboard</a>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 border p-4">
        <div class="form-group" style="width: 200px; float: right;">
            <input type="text"  class="form-control"  id="membership_number" name="membership_number"  value="5266" 
                   style="text-align: center;border: 2px solid #1a1010; border-radius: none;">
        </div>
        <div class="text-center mb-4">
            <h4>EAST INDIA MCS LTD</h4>
            <p>Under Govt of Assam</p>
            <p><strong>EAST INDIA MULTIPURPOSE CO-OPERATIVE SOCIETY LTD.</strong></p>
            <p>AGDOLA BAIHATA CHARIALI NEAR UJJIVAN BANK MANGALDAI ROAD, DIST-KAMRUP</p>
            <p>REG NO: ZJ/45/2022-23</p>
        </div>
     
        <div class="row mb-4">
            <div class="col-6">
                <p><strong>Receipt No:</strong> {{ $data['receipt_no'] }}</p>
                <p><strong>Certificate No:</strong> {{ $data['certificate_no'] }}</p>
                <p><strong>Membership No:</strong> {{ $data['membership_no'] }}</p>
            </div>
            <div class="col-6 text-end">
                <p><strong>Branch:</strong> {{ $data['branch'] }}</p>
                <p><strong>City:</strong> {{ $data['city'] }}</p>
                <p><strong>Region:</strong> {{ $data['region'] }}</p>
            </div>
        </div>

        <p>Received from Member Account Holder Shri/Smt/Miss <strong>{{ $data['member_name'] }}</strong> a sum of rupees (in figure) <strong>{{ $data['amount'] }}/-</strong></p>
        <p>(in words) <strong>{{ $data['amount_in_words'] }}</strong></p>

        <p>On date <strong>{{ $data['start_date'] }}</strong> for the period of 12 months.</p>

        <p>This shall bear fixed interest as per rules of the Society under the terms and conditions of the Scheme.</p>

        <p><strong>Maturity Amount:</strong> {{ $data['maturity_amount'] }}/-</p>
        <p><strong>Interest payable monthly:</strong> {{ $data['interest_monthly'] }}/-</p>
        <p><strong>Maturity Date:</strong> {{ $data['maturity_date'] }}</p>

        <div class="row mt-5">
            <div class="col-6 text-start">
                <p>Authorized Branch Seal</p>
            </div>
            <div class="col-6 text-end">
                <p>Authorized Signatory</p>
                <p>Emp Code</p>
            </div>
        </div>
    </div>
</body>
</html>

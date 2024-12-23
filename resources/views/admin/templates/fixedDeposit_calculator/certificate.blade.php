<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 border p-4" style="background: #fdfaf3">
        <div class="d-flex align-items-start justify-content-between" style="width: 100%; gap: 20px;">
            <!-- Left Input Field (Company Name at Bottom) -->
            <div class="form-group d-flex flex-column justify-content-between" style="width: 250px; height:150px">
                <div class="flex-grow-1"></div> <!-- Empty space to push company name to the bottom -->
                <input type="text" class="form-control" id="campany_name" name="campany_name" 
                       value="EAST INDIA MCS LTD" 
                       style="text-align: center; border: 2px solid #1a1010; border-radius: 0; font-weight: bold; font-size: 20px;background:#fcf3dd">
            </div>
        
            <!-- Center Image (Image at Top) -->
            <div class="d-flex justify-content-center" style="width: 200px; align-items: flex-start;">
                <img src="{{ Storage::url('images/east_india.png') }}" class="campany_logo" alt="company logo" width="150" height="150">
            </div>
        
            <!-- Right Input Field -->
            <div class="form-group" style="width: 200px;">
                <input type="text" class="form-control" id="membership_number" name="membership_number" 
                       value="5266" 
                       style="text-align: center; border: 2px solid #1a1010; border-radius: 0;background:#fdfaf3">
            </div>
        </div>
        
        <div class="text-center mb-4">
            <p>Under Govt of Assam</p>
            <p><strong>EAST INDIA MULTIPURPOSE CO-OPERATIVE SOCIETY LTD.</strong></p>
            <p>of AGDOLA BAIHATA CHARIALI NEAR UJJIVAN BANK MANGALDAI ROAD.DIST-KAMRUP, REG NO-ZJ/45/2022-23, UNDER OFFICE OF THE ZONAL JOINT REGISTRAR OF CO-OPERATIVE SOCIETY, GUWAHATI-05.</p>
            
        </div>
        <div class="row">
            <div class="col-4">
                <p><strong>Receipt No:</strong> {{ $data['receipt_no'] }}</p>
            </div>
            <div class="col-4">
                <p><strong>Certificate No:</strong> {{ $data['certificate_no'] }}</p>
            </div>
            <div class="col-4">
                <p><strong>Membership No:</strong> {{ $data['membership_no'] }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <p><strong>Branch:</strong> {{ $data['branch'] }}</p>
            </div>
            <div class="col-4">
                <p><strong>City:</strong> {{ $data['city'] }}</p>
            </div>
            <div class="col-4">
                <p><strong>Region:</strong> {{ $data['region'] }}</p>
            </div>
        </div>

        <p>Received from Member Account Holder Shri/Smt/Miss <strong>{{ $data['member_name'] }}</strong> a sum of rupees (in figure) <strong>{{ $data['amount'] }}/-</strong></p>
        <p>(in words) <strong>{{ $data['amount_in_words'] }}</strong></p>
        <div class="row">
          <div class="col-6">
            <p>On date <strong>{{ $data['start_date'] }}</strong></p>
          </div>
          <div class="col-6">
            <p>for the period of 12 months.</p>
          </div>
        </div>
       

        <p>This shall bear fixed interest as per rules of the Society under the terms and conditions of the Scheme.</p>
      
        <p><strong>Account No.</strong> {{ $data['membership_no'] }}</p>
        <p><strong>Maturity Amount:</strong> {{ $data['maturity_amount'] }}/-</p>
        <p><strong>Interest payable monthly:</strong> {{ $data['interest_monthly'] }}/-</p>
        <p><strong>Maturity Date:</strong> {{ $data['maturity_date'] }}</p>

        <div class="row mt-5">
            <div class="col-4">
            </div>
            <div class="col-3 text-start">
                <p>Authorized Branch Seal</p>
            </div>
            <div class="col-4 text-end">
                <p>Authorized Signatory</p>
                <p>Emp Code</p>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
</html>

<section class="content-header">
    <h1> Dashboard <small>{{ $data['page_title'] }}</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home </a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
        <li class="active">{{ $data['page_title'] }}</li>
    </ol>
</section>
<style type="text/css">

</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-header" style="width:100%">
                  
                                     <a class="margin-r-10 float-right btn btn-primary " href="javascript:history.back()"><i
                                     class="mdi mdi-file-export "></i> Back</a>  
                  
                                </h3>
                              </div>
                            <div class="container md-6">
                                <div class="d-flex align-items-center card profile-card shadow-sm p-3"
                                    style="max-width: 600px;">
                                    <!-- Profile Image -->
                                    <div class="col-sm-4">
                                        <img src="{{ asset('assets/images/user.png') }}" class="rounded-circle"
                                            alt="User Image" width="120" height="120">
                                    </div>

                                    <!-- User Details -->
                                    <div class="col-sm-4">
                                        <p class="mb-1"><strong>Name:</strong> {{ $data['basicDetails']->name ??""}}</p>
                                        <p class="mb-1"><strong>Mobile No.:</strong>
                                            {{ $data['basicDetails']->mobile_no }}</p>
                                        <p class="mb-1"><strong>Email:</strong> {{ $data['basicDetails']->email??"" }}</p>

                                    </div>
                                  
                                </div>
                            </div>


                            <div class="container mt-4">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0">Personal Details</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th width="30%">Name</th>
                                                    <td>{{ $data['basicDetails']->name ??""}}</td>
                                                    <th>Email</th>
                                                    <td>{{ $data['basicDetails']->email ??""}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Mobile</th>
                                                    <td>{{ $data['basicDetails']->mobile_no ??""}}</td>
                                                    <th>Gender</th>
                                                    <td>{{ $data['basicDetails']->gender ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>DOB</th>
                                                    <td>{{ $data['basicDetails']->dob ??""}}</td>
                                                    <th>Age</th>
                                                    <td>{{ $data['basicDetails']->age ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Father Name</th>
                                                    <td>{{ $data['basicDetails']->father_name ??""}}</td>
                                                    <th>Mother Name</th>
                                                    <td>{{ $data['basicDetails']->mother_name ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Marital Status</th>
                                                    <td>{{ $data['basicDetails']->marital_status ??""}}</td>
                                                    <th>Religion</th>
                                                    <td>{{ $data['basicDetails']->religion ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Member Cast</th>
                                                    <td>{{ $data['basicDetails']->member_cast ??""}}</td>
                                                    <th>Enrollment Date</th>
                                                    <td>{{ $data['basicDetails']->enrollment_date ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Agent Name</th>
                                                    <td>{{ $data['basicDetails']->agent_name ??""}}</td>
                                                    <th>Latitude</th>
                                                    <td>{{ $data['basicDetails']->latitude ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Longitude</th>
                                                    <td>{{ $data['basicDetails']->longitude ??""}}</td>
                                                    <th>Adhar Card No.</th>
                                                    <td>{{ $data['basicDetails']->adhar_card_no ??""}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Pan</th>
                                                    <td>{{ $data['basicDetails']->pan ??""}}</td>
                                                    <th>Vother ID NO.</th>
                                                    <td>{{ $data['basicDetails']->voter_id_no??"" }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ration Card No.</th>
                                                    <td>{{ $data['basicDetails']->ration_card_no ??""}}</td>
                                                    <th>Driving License No.</th>
                                                    <td>{{ $data['basicDetails']->driving_license_no ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Passport No.</th>
                                                    <td>{{ $data['basicDetails']->passport_no ??""}}</td>
                                                    <th>Status</th>
                                                    <td>{{ $data['basicDetails']->status ??""}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- Address Details Section -->

                            <div class="container mt-4">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0">Customer Address</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th width="30%">Residence Type</th>
                                                    <td>{{ $data['address']->residense_type ?? ""}}</td>
                                                    <th>Stability (Years)</th>
                                                    <td>{{ $data['address']->stability ?? ""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Present Residence Type</th>
                                                    <td>{{ $data['address']->present_residence_type ??""}}</td>
                                                    <th>Present Address 1</th>
                                                    <td>{{ $data['address']->present_address1 ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Present Address 2</th>
                                                    <td>{{ $data['address']->present_address2 ??""}}</td>
                                                    <th>Present Ward</th>
                                                    <td>{{ $data['address']->present_ward ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Present Area</th>
                                                    <td>{{ $data['address']->present_area ??""}}</td>
                                                    <th>Present State</th>
                                                    <td>{{ $data['address']->present_state ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Present City</th>
                                                    <td>{{ $data['address']->present_city ??""}}</td>
                                                    <th>Present Pin Code</th>
                                                    <td>{{ $data['address']->present_pin_code ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Permanent Residence Type</th>
                                                    <td>{{ $data['address']->permanent_residence_type ??""}}</td>
                                                    <th>Permanent Address 1</th>
                                                    <td>{{ $data['address']->permanent_address1 ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Permanent Address 2</th>
                                                    <td>{{ $data['address']->permanent_address2 ??""}}</td>
                                                    <th>Permanent Ward</th>
                                                    <td>{{ $data['address']->permanent_ward ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Permanent Area</th>
                                                    <td>{{ $data['address']->permanent_area ??""}}</td>
                                                    <th>Permanent State</th>
                                                    <td>{{ $data['address']->permanent_state ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Permanent City</th>
                                                    <td>{{ $data['address']->permanent_city ??""}}</td>
                                                    <th>Permanent Pin Code</th>
                                                    <td>{{ $data['address']->permanent_pin_code ??""}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <div class="container mt-4">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0">Bank Details</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Bank Name</th>
                                                    <td>{{ $data['bankDetails']->bank_name ??""}}</td>
                                                    <th>Account Type</th>
                                                    <td>{{ $data['bankDetails']->account_type ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Account Number</th>
                                                    <td>{{ $data['bankDetails']->account_no ??""}}</td>
                                                    <th>IFSC Code</th>
                                                    <td>{{ $data['bankDetails']->ifsc_code ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Address</th>
                                                    <td colspan="3">{{ $data['bankDetails']->bank_address ??""}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="container mt-4">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0">Electricity Details</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Meter No</th>
                                                    <td>{{ $data['electicDetails']->electric_meterno ??""}}</td>
                                                    <th>Consumer ID</th>
                                                    <td>{{ $data['electicDetails']->electric_consumer_id ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Owner Name</th>
                                                    <td>{{ $data['electicDetails']->electric_owner_name ??""}}</td>
                                                    <th>Relation</th>
                                                    <td>{{ $data['electicDetails']->electric_relation ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Last Bill Date</th>
                                                    <td colspan="3">
                                                        {{ $data['electicDetails']->electric_last_bill_date ??""}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <div class="container mt-4">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0">Nominee Details</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Nominee Name</th>
                                                    <td>{{ $data['nominee']->nominee_name ??""}}</td>
                                                    <th>Relation</th>
                                                    <td>{{ $data['nominee']->nominee_relation ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>DOB</th>
                                                    <td>{{ $data['nominee']->nominee_dob ??""}}</td>
                                                    <th>Age</th>
                                                    <td>{{ $data['nominee']->nominee_age ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile</th>
                                                    <td>{{ $data['nominee']->nominee_mobile ??""}}</td>
                                                    <th>Address</th>
                                                    <td>{{ $data['nominee']->nominee_address ??""}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Aadhar No</th>
                                                    <td>{{ $data['nominee']->nominee_aadhar_no ?? 'N/A' }}</td>
                                                    <th>PAN</th>
                                                    <td>{{ $data['nominee']->nominee_pan ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Voter ID</th>
                                                    <td>{{ $data['nominee']->nominee_voter_id ?? 'N/A' }}</td>
                                                    <th>Ration Card</th>
                                                    <td>{{ $data['nominee']->nominee_ration_card ?? 'N/A' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="container mt-4">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0">Customer Documents</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                @if ($data['documents'])
                                                    <tr>
                                                        <th>Aadhaar</th>
                                                        <td>
                                                            @if ($data['documents']->aadhaar)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->aadhaar) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <th>PAN</th>
                                                        <td>
                                                            @if ($data['documents']->pan)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->pan) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Driving License</th>
                                                        <td>

                                                            @if ($data['documents']->driving_license)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->driving_license) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <th>Ration Card</th>
                                                        <td>
                                                            @if ($data['documents']->ration_card)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->ration_card) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Electricity Bill</th>
                                                        <td>

                                                            @if ($data['documents']->electricity_bill)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->electricity_bill) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <th>Passport Photo</th>
                                                        <td>

                                                            @if ($data['documents']->passport_photo)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->passport_photo) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Signature</th>
                                                        <td>
                                                            @if ($data['documents']->signature)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->signature) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif


                                                        </td>
                                                        <th>Voter ID</th>
                                                        <td>

                                                            @if ($data['documents']->voter_id)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->voter_id) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Bank Statement</th>
                                                        <td>

                                                            @if ($data['documents']->bank_statement)
                                                                <button class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#imageModal"
                                                                    data-doc="{{ asset('storage/' . $data['documents']->bank_statement) }}">
                                                                    View
                                                                </button>
                                                            @else
                                                                N/A
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="4">No Document Details Available</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal for PDF Preview -->
                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">Uploaded File</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img id="previewImage" src="" class="img-fluid d-none">
                                            <iframe id="previewPDF" class="d-none" width="100%"
                                                height="500px"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>


            <!-- jQuery Script to Handle Modal -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    $('#imageModal').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget); // Button that triggered the modal
                        var docUrl = button.data('doc'); // Get the document URL
                        var previewImage = $('#previewImage');
                        var previewPDF = $('#previewPDF');

                        if (docUrl) {
                            if (docUrl.endsWith(".pdf")) {
                                // Show PDF in iframe
                                previewPDF.attr('src', docUrl);
                                previewPDF.removeClass("d-none");
                                previewImage.addClass("d-none");
                            } else {
                                // Show image
                                previewImage.attr('src', docUrl);
                                previewImage.removeClass("d-none");
                                previewPDF.addClass("d-none");
                            }
                        }
                    });

                    // Clear the modal when closing
                    $('#imageModal').on('hidden.bs.modal', function() {
                        $('#previewPDF').attr('src', "");
                        $('#previewImage').attr('src', "");
                    });
                });
            </script>
</section>

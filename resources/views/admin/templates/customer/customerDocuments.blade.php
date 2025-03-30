<section class="content-header">
    <h1> Electricity Bill Detail </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.customer.index') }}">Customer List</a></li>
        {{-- <li><a href="{{ route('admin.customer.edit', ['id' => $memberId]) }}">Customer View</a></li> --}}
        <li class="active">Electricity Bill Detail</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class=""><a href="{{ route('admin.customer.edit.basicDetails',array('id' => $memberId)) }}">Basic
                            Detail</a></li>
                    <li class=""><a
                            href="{{ route('admin.customer.address',array('id' => $memberId)) }}">Address</a></li>
                    <li class=""><a href="{{ route('admin.customer.bankDetail', ['id' => $memberId]) }}">Bank
                            Detail</a></li>
                    <li class=""><a
                            href="{{ route('admin.customer.professionDetail', ['id' => $memberId]) }}">Employement
                            Detail</a></li>
                    <li class=""><a href="{{ route('admin.customer.electricBillDetail',array('id' => $memberId)) }}">Electricity Bill Detail</a></li>
                    <li class=""><a
                            href="">Nominee </a>
                    </li>
                    <li class="active"><a href="#">Upload Documents</a></li>

                </ul>
                <form id="uploadDocuments" enctype="multipart/form-data" method="post" name="uploadDocuments"
                    action="{{ route('admin.customer.upload_documents') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="member_id" id="member_id" value="{{$memberId}}" />

                    <div class="tab-content">
                        <div class="tab-pane active" id="memberinfo">
                            <div class="box-body">
                                <div class="form-horizontal">
                                    <div class="col-md-12">
                             
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Adhar Card<span
                                                    class="requiredfield">*</span>
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="aadhaarInput"
                                                    name="aadhaarInput" accept="application/pdf">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="aadhaarInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Pan Card<span
                                                    class="requiredfield">*</span>
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" type="file"
                                                    id="panInput" name="panInput" accept="application/pdf">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="panInput"
                                                    disabled data-toggle="modal"
                                                    data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Driving License
                                        </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="drivingLicenseInput"
                                                    name="drivingLicenseInput" accept="application/pdf">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="drivingLicenseInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Ration Card
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="rationCardInput"
                                                    name="rationCardInput" accept="application/pdf">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="rationCardInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Electricity Bill
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="electricityBillInput"
                                                    name="electricityBillInput" accept="application/pdf">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="electricityBillInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Passport Photograph<span
                                                    class="requiredfield">*</span>
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="passportPhotographInput"
                                                    name="passportPhotographInput" accept="image/*">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="passportPhotographInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Signature<span
                                                    class="requiredfield">*</span>
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="signatureInput"
                                                    name="signatureInput" accept="image/*">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="signatureInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Voter Id
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="voterIdInput"
                                                    name="voterIdInput" accept="image/*,application/pdf">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="voterIdInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Bank Statement<span
                                                    class="requiredfield">*</span>
                                            </label>
                                            <div class="col-sm-5">
                                                <input class="form-control" type="file" id="bankStatementInput"
                                                    name="bankStatementInput" accept="image/*,application/pdf">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary viewButton" data-file="bankStatementInput"
                                                    disabled data-toggle="modal" data-target="#imageModal">View</button>
                                            </div>
                                        </div>

                                        <!-- Modal for PDF Preview -->
                                        <div class="modal fade" id="imageModal" tabindex="-1"
                                            aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="imageModalLabel">Uploaded File
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img id="previewImage" src=""
                                                            class="img-fluid d-none">
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
                        <div class="box-footer">
                            <div class="col-xs-12 text-center ">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-flat btn-success" value="Save" />
                                    <a class="btn btn-flat btn-danger" href="#">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </form>



        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function setupFileInput(fileInputId) {
                let fileInput = document.getElementById(fileInputId);
                let viewButton = document.querySelector(`.viewButton[data-file="${fileInputId}"]`);

                fileInput.addEventListener("change", function(event) {
                    let file = event.target.files[0];

                    if (file && (file.type.startsWith("image/") || file.type === "application/pdf")) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            viewButton.dataset.fileType = file.type;
                            viewButton.dataset.fileSrc = e.target.result;
                            viewButton.disabled = false; // Enable the button
                        };
                        reader.readAsDataURL(file);
                    } else {
                        viewButton.disabled = true;
                    }
                });

                viewButton.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevents page refresh

                    let fileType = this.dataset.fileType;
                    let fileSrc = this.dataset.fileSrc;

                    let imgPreview = document.getElementById("previewImage");
                    let pdfPreview = document.getElementById("previewPDF");

                    if (fileType.startsWith("image/")) {
                        imgPreview.src = fileSrc;
                        imgPreview.classList.remove("d-none");
                        pdfPreview.classList.add("d-none");
                    } else if (fileType === "application/pdf") {
                        pdfPreview.src = fileSrc;
                        pdfPreview.classList.remove("d-none");
                        imgPreview.classList.add("d-none");
                    }
                });
            }

            setupFileInput("aadhaarInput");
            setupFileInput("panInput");
            setupFileInput("drivingLicenseInput");
            setupFileInput("rationCardInput");
            setupFileInput("electricityBillInput");
            setupFileInput("panInput");
            setupFileInput("passportPhotographInput");
            setupFileInput("signatureInput");
            setupFileInput("voterIdInput");
            setupFileInput("bankStatementInput");

        });
    </script>
</section>

<div class="modal fade" id="add_row_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">{{$data['page_title']}} Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form id="add_form" method="post" name="add_form" >
            {{csrf_field()}}
                <input type="hidden" name="user_type" value="user" />
                <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" id="" class="form-control" placeholder="Enter Name" required />
                            <div class="invalid-feedback">Please provide a valid title..</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Email ID</label>
                            <input type="email" id="email" name="email" id="" class="form-control" placeholder="Enter Email ID" required />
                            <div class="invalid-feedback">Please provide a valid e Email..</div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Password</label>
                            <input type="password" id="password" name="password" id="" class="form-control" placeholder="Enter Password" required />
                            <div class="invalid-feedback">Please provide a valid e password..</div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Confirm Password</label>
                            <input type="password" id="c_password" name="c_password"class="form-control" placeholder="Enter Confirm Password" required />
                            <div class="invalid-feedback">Please provide a valid e Confirm Password..</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Mobile Number</label>
                            <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile" required />
                            <div class="invalid-feedback">Please provide a valid mobile..</div>
                        </div>
                    </div>
                     <div class="col-lg-6 hide" >
                         <div class="form-group">
                            <label for="field-1" class="control-label">User Image</label>
                            <input class="form-control" type="file" name="user_image"  id="formFile" onchange="readURLImage(this,'staff_image_preview')" >
                            <img id="staff_image_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="figure-img img-fluid rounded mt-1 hide"  />
                        </div>
                    </div> 
                </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <input type="submit" value="Save" class="btn btn-success"/>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
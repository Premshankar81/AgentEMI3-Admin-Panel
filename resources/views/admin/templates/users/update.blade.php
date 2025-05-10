<div class="modal fade" id="update_row_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">{{$data['page_title']}} Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form id="update_form" method="post" name="add_form" >
            {{csrf_field()}}
            <input type="hidden" name="update_id" id="update_id"/>
                <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" name="update_name" id="update_name" class="form-control" placeholder="Enter Category" required />
                            <div class="invalid-feedback">Please provide a valid title..</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                         <div class="mb-3">
                            <label for="name" class="form-label">Email ID</label>
                            <input type="email" id="update_email" name="update_email" id="" class="form-control" placeholder="Enter Email ID" required />
                            <div class="invalid-feedback">Please provide a valid e Email..</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Mobile Number</label>
                            <input type="text" id="update_mobile" name="update_mobile" id="" class="form-control" placeholder="Enter Mobile" required />
                            <div class="invalid-feedback">Please provide a valid mobile..</div>
                        </div>
                    </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Change Password</label>
                            <input type="password" id="change_password" name="change_password" class="form-control" placeholder="Enter Password" required />
                            <div class="invalid-feedback">Please provide a valid Password..</div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div>
                            <label for="status-field" class="form-label">Status</label>
                            <select class="form-control" data-trigger name="update_status" id="update_status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-6 hide" >
                     <div class="form-group">
                        <label for="field-1" class="control-label">Image Upload</label>
                        <input class="form-control " type="file" name="update_image"  id="formFile" onchange="readURLImage(this,'update_image_preview')" >
                        <img id="update_image_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="figure-img img-fluid rounded mt-1 hide"  />

                    </div>
                    </div> 
                    
                </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" onclick="update_row()" class="btn btn-success" id="edit-btn">Update</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
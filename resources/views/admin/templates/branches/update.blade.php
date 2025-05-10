<div class="modal fade" id="update_row_modal">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title">update {{$data['page_title']}}</h4>
    </div>
    <form id="update_form" method="post" name="update_form" >
    {{csrf_field()}}
    <input type="hidden" name="update_id" id="update_id"/>
    <div class="modal-body">
       <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" name="update_name" id="update_name" class="form-control" required />
                </div>
            </div>
            <div class="col-lg-4">
                 <div class="mb-3">
                    <label for="name" class="form-label">Email ID</label>
                    <input type="email" id="update_email" name="update_email" id="" class="form-control" required />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Mobile Number</label>
                    <input type="text" id="update_mobile" name="update_mobile" id="" class="form-control" required />
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_country_id" class="form-label">County</label>
                      <select id="update_country_id" name="update_country_id" class="form-control"  required onchange="getStates_ByCountry()">
                          <option value="">Select Country</option>
                          @foreach($counties as $key => $county)
                              <option value="{{$county['id']}}">{{$county['title']}}</option>    
                          @endforeach
                      </select>
                  </div>
              </div>

            <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_state_id" class="form-label">State</label>
                      <select id="update_state_id" name="update_state_id" class="form-control"  required onchange="getCity_ByState()">
                          <option value="">Select State</option>
                          
                      </select>
                  </div>
            </div>

            <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_city_id" class="form-label">City</label>
                      <select id="update_city_id" name="update_city_id" class="form-control"  required >
                          <option value="">Select City</option>
                          
                      </select>
                  </div>
            </div>

        </div>

        <div class="row">
                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_branch_code" class="form-label">Branch code</label>
                      <input type="text" id="update_branch_code" name="update_branch_code" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_pincode" class="form-label">Pincode</label>
                      <input type="text" id="update_pincode" name="update_pincode" class="form-control" />
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_tax_name" class="form-label">Tax Name</label>
                      <input type="text" id="update_tax_name" name="update_tax_name" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_tax_number" class="form-label">Tax Number</label>
                      <input type="text" id="update_tax_number" name="update_tax_number" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_cin" class="form-label">CIN</label>
                      <input type="text" id="update_cin" name="update_cin" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_website" class="form-label">Website</label>
                      <input type="text" id="update_website" name="update_website" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_currency_symbol" class="form-label">Currency Symbol</label>
                      <input type="text" id="update_currency_symbol" name="update_currency_symbol" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_time_zone" class="form-label">Time Zone</label>
                      <input type="text" id="update_time_zone" name="update_time_zone" class="form-control" />
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_opening_date" class="form-label">Opening Date</label>
                      <input type="date" id="update_opening_date" name="update_opening_date" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_address_first" class="form-label">Address First</label>
                      <textarea id="update_address_first" name="update_address_first" class="form-control"></textarea>
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="update_address_second" class="form-label">Address Second</label>
                      <textarea id="update_address_second" name="update_address_second" class="form-control"></textarea>
                  </div>
                </div>

            </div>

        <div class="row">

              <div class="col-lg-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Change Password</label>
                    <input type="password" id="change_password" name="change_password" class="form-control"  required />
                </div>
            </div>

            <div class="col-lg-4">
                <div>
                    <label for="status-field" class="form-label">Status</label>
                    <select class="form-control" data-trigger name="update_status" id="update_status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
             <div class="col-lg-4 hide" >
             <div class="form-group">
                <label for="field-1" class="control-label">Image Upload</label>
                <input class="form-control " type="file" name="update_image"  id="formFile" onchange="readURLImage(this,'update_image_preview')" >
                <img id="update_image_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="figure-img img-fluid rounded mt-1 hide"  />

            </div>
            </div> 
            
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="update_row()" class="btn btn-success" id="edit-btn">Update</button>
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    </div>
    </form>
  </div>
</div>
</div>

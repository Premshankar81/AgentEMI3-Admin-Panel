<div class="modal fade" id="add_row_modal">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title">Add {{$data['page_title']}}</h4>
    </div>
    <form id="add_form" method="post" name="add_form" >
    {{csrf_field()}}
    <div class="modal-body">
      <input type="hidden" name="user_type" value="branch" />
        <div class="row">
              <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="name" class="form-label">Branch Name</label>
                      <input type="text" id="name" name="name" class="form-control" required />
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="name" class="form-label">Email ID</label>
                      <input type="email" id="email" name="email" id="" class="form-control" required />
                  </div>
              </div>
               <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="name" class="form-label">Mobile Number</label>
                      <input type="number" id="mobile" name="mobile" class="form-control" required />
                  </div>
              </div>

            </div>

            <div class="row">
              <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="country_id" class="form-label">County</label>
                      <select id="country_id" name="country_id" class="form-control"  required onchange="getStates_ByCountry()">
                          <option value="">Select Country</option>
                          @foreach($counties as $key => $county)
                              <option value="{{$county['id']}}">{{$county['title']}}</option>    
                          @endforeach
                      </select>
                  </div>
              </div>

            <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="state_id" class="form-label">State</label>
                      <select id="state_id" name="state_id" class="form-control"  required onchange="getCity_ByState()">
                          <option value="">Select State</option>
                          
                      </select>
                  </div>
            </div>

            <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="city_id" class="form-label">City</label>
                      <select id="city_id" name="city_id" class="form-control"  required >
                          <option value="">Select City</option>
                          
                      </select>
                  </div>
            </div>
          </div>

            <div class="row">
                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="name" class="form-label">Branch code</label>
                      <input type="text" id="branch_code" name="branch_code" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="pincode" class="form-label">Pincode</label>
                      <input type="text" id="pincode" name="pincode" class="form-control" />
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="tax_name" class="form-label">Tax Name</label>
                      <input type="text" id="tax_name" name="tax_name" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="tax_number" class="form-label">Tax Number</label>
                      <input type="text" id="tax_number" name="tax_number" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="cin" class="form-label">CIN</label>
                      <input type="text" id="cin" name="cin" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="website" class="form-label">Website</label>
                      <input type="text" id="website" name="website" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="currency_symbol" class="form-label">Currency Symbol</label>
                      <input type="text" id="currency_symbol" name="currency_symbol" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="time_zone" class="form-label">Time Zone</label>
                      <input type="text" id="time_zone" name="time_zone" class="form-control" />
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="opening_date" class="form-label">Opening Date</label>
                      <input type="date" id="opening_date" name="opening_date" class="form-control" />
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="address_first" class="form-label">Address First</label>
                      <textarea id="address_first" name="address_first" class="form-control"></textarea>
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="address_second" class="form-label">Address Second</label>
                      <textarea id="address_second" name="address_second" class="form-control"></textarea>
                  </div>
                </div>

            </div>



            <div class="row">

              <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="name" class="form-label">Password</label>
                      <input type="password" id="password" name="password" id="" class="form-control" required />
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="mb-3">
                      <label for="name" class="form-label">Confirm Password</label>
                      <input type="password" id="c_password" name="c_password"class="form-control" required />
                  </div>
              </div>
             
               <div class="col-lg-4 hide" >
                   <div class="form-group">
                      <label for="field-1" class="control-label">User Image</label>
                      <input class="form-control" type="file" name="user_image"  id="formFile" onchange="readURLImage(this,'staff_image_preview')" >
                      <img id="staff_image_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="figure-img img-fluid rounded mt-1 hide"  />
                  </div>
              </div> 
          </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>

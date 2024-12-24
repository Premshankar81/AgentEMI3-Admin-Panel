<div class="modal fade" id="add_row_modal">
<div class="modal-dialog">
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
       <div class="row">
            <div class="col-lg-6">
                  <div class="mb-3">
                      <label for="country_id" class="form-label">County</label>
                      <select id="country_id" name="country_id" class="form-control" required onchange="getStates_ByCountry()">
                          <option value="">Select Country</option>
                          @foreach($counties as $key => $county)
                              <option value="{{$county['id']}}">{{$county['title']}}</option>    
                          @endforeach
                      </select>
                  </div>
            </div>

            <div class="col-lg-6">
                  <div class="mb-3">
                      <label for="state_id" class="form-label">State</label>
                      <select id="state_id" name="state_id" class="form-control" required>
                          <option value="">Select State</option>
                          
                      </select>
                  </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="title" class="form-label">City</label>
                    <input type="text" id="title" name="title" id="" class="form-control" placeholder="Enter City" required />
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

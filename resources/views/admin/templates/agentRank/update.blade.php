<div class="modal fade" id="update_row_modal">
<div class="modal-dialog">
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

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-4 control-label">Rank<span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control " id="update_rank" name="update_rank">
                      <option value="">--Select Rank--</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Rank Name<span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <input class="form-control required" id="update_title" maxlength="30" name="update_title" type="text">
                    
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Rank Definition</label>
                <div class="col-sm-7">
                    <input class="form-control"id="update_description" maxlength="2000" name="update_description" type="text" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Rank<span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control" data-trigger name="update_status" id="update_status">
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                  </select>
                </div>
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

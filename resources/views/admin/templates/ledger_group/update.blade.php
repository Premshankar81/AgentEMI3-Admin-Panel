<div class="modal fade" id="update_row_modal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title">Update {{$data['page_title']}}</h4>
    </div>
    <form id="update_form" method="post" name="update_form" >
    {{csrf_field()}}
    <input type="hidden" name="update_id" id="update_id"/>
    <div class="modal-body">
      <div class="row">
        
        <div class="col-lg-6">
          <div class="mb-3">
              <label for="title" class="form-label">Ledger Group</label>
              <input type="text" name="update_title" id="update_title" class="form-control" required />
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

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

        <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Rank<span class="requiredfield">*</span></label>
                    <div class="col-sm-7">
                        <select class="form-control " id="rank" name="rank">
                          <option value="">--Select Rank--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Rank Name<span class="requiredfield">*</span></label>
                    <div class="col-sm-7">
                        <input class="form-control required" id="title" maxlength="30" name="title" type="text">
                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Rank Definition</label>
                    <div class="col-sm-7">
                        <input class="form-control"id="description" maxlength="2000" name="description" type="text" >
                    </div>
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

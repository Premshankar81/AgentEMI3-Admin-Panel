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
                    <label for="title" class="form-label">Ledger Name</label>
                    <input type="text" id="title" name="title"  class="form-control" required />
                </div>
            </div>

             <div class="col-lg-6">
                  <div class="form-group">
                      <label for="ledger_group" class="form-label">Ledger Group</label>
                      <select id="ledger_group" name="ledger_group" class="form-control" required >
                          <option value="">Select Ledger Group</option>
                          @foreach($ledgerGroup as $key => $ledger_group)
                              <option value="{{$ledger_group['id']}}">{{$ledger_group['title']}}</option>    
                          @endforeach
                      </select>
                  </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="opening_balanace" class="form-label">Opening Balanace</label>
                    <input type="text" id="opening_balanace" name="opening_balanace" class="form-control" required />
                </div>
            </div>

            <div class="col-lg-6">
                  <div class="form-group">
                      <label for="ledger_group" class="form-label">Transaction Type</label>
                      <select id="ledger_transaction_type" name="ledger_transaction_type" class="form-control" required >
                          <option value="">Select Ledger Group</option>
                          <option value="credit">Credit</option>
                          <option value="debit">Debit</option>
                      </select>
                  </div>
            </div>
            
            <div class="col-lg-6">
                  <div class="form-group">
                      <label for="type" class="form-label">Ledger type</label>
                      <select id="type" name="type" class="form-control" required >
                          <option value="">Select Ledger type</option>
                          @foreach($ledgerTypes as $key => $ledgerType)
                              <option value="{{$ledgerType['id']}}">{{$ledgerType['title']}}</option>    
                          @endforeach
                      </select>
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

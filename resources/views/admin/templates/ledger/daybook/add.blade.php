<div class="modal fade" id="add_row_modal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title">Add Data</h4>
    </div>
    <form id="add_form" action="{{route('admin.ledger.daybook.store')}}" method="post" name="add_form" >
    {{csrf_field()}}
    <div class="modal-body">
       <div class="row">
            
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Date</label>
                    <input type="date" id="date" name="date"  class="form-control" required />
                </div>
            </div>

             <div class="col-lg-6">
                  <div class="form-group">
                      <label for="ledger_group" class="form-label">Description</label>
                      <select id="description" name="description" class="form-control" required >
                          <option value="">Select Description</option>
                            <option value="Cash Deposit">Cash Deposit</option>
                            <option value="Cheque Withdrawal">Cheque Withdrawal</option> 
                            <option value="Fund Transfer">Fund Transfer</option> 
                            <option value="Interest Credit">Interest Credit</option> 
                               
                      </select>
                  </div>
            </div>
            

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="opening_balanace" class="form-label">Transaction Type</label>
                    <select id="transaction_type" name="transaction_type" class="form-control" required >
                        <option value="">Select Transaction Type</option>
                          <option value="Cash">Cash</option>
                          <option value="Cheque">Cheque</option> 
                          <option value="Fund Transfer">Fund Transfer</option> 
                          <option value="Interest">Interest</option> 
                             
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="debit_amount" class="form-label">Debit Amount</label>
                    <input type="number" id="debit_amount" name="debit_amount" class="form-control"  />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="credit_amount" class="form-label">Credit Amount</label>
                    <input type="number" id="credit_amount" name="credit_amount" class="form-control" />
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="mb-3">
                    <label for="balanace" class="form-label">Balance</label>
                    <input type="number" id="balance" name="balance" class="form-control" required />
                </div>
            </div> --}}
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

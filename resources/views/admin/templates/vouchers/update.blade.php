<div class="modal fade" id="update_row_modal">
<div class="modal-dialog modal-lg">
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
            
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="title" class="form-label">Vouchers Title</label>
                    <input type="update_text" id="update_title" name="update_title" class="form-control" required />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="voucher_number" class="form-label">Vouchers Number</label>
                    <input type="text" id="update_voucher_number" name="update_voucher_number" class="form-control" required />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="voucher_date" class="form-label">Vouchers Date</label>
                    <input type="date" id="update_voucher_date" name="update_voucher_date" class="form-control" required />
                </div>
            </div>

        </div>
        <div class="row"><div class="col-lg-12"><h4>Vouchers Details</h4><hr></div></div>
        <div class="row">
          <div class="col-lg-12">
            <table class="table">
              <thead>
                <tr>
                    <th>Debit account </th>
                    <th>Closeing Balanace</th>
                    <th>Amount</th>
                </tr>
              </thead>
                <tbody>
                 <tr role="row">
                    <td>
                      <input type="hidden" id="update_debit_vouchers_id" name="update_vouchers_id[]" value="debit" class="form-control "/>
                      <input type="hidden" id="update_debit_transaction_type" name="update_transaction_type[]" value="debit" class="form-control "/>
                      <select id="update_debit_account_id" name="update_ledger_account_id[]" class="form-control selectpicker" required >
                          <option value="">Select Ledger Group</option>
                          @foreach($ledgers as $key => $ledger)
                              <option value="{{$ledger['id']}}">{{$ledger['title']}}</option>    
                          @endforeach
                      </select>
                    </td>
                    <td><input type="text" id="update_debit_account_close_balance" name="update_ledger_account_close_balance[]" class="form-control"/></td>
                    <td><input type="text" id="update_debit_account_amount" name="update_ledger_account_amount[]" class="form-control" /></td>
                </tr>
                </tbody>
            </table>
          </div>
        </div>
        <?php $rand = rand();  ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table">
              <thead>
                <tr>
                    <th>Credit account </th>
                    <th>Closeing Balanace</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
              </thead>
                <tbody  id="update_row_ajax">
                 
                </tbody>
            </table>
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

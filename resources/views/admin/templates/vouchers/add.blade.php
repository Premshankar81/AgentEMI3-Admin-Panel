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
       <div class="row">

            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="voucher_number" class="form-label">Vouchers Number</label>
                    <input type="text" id="voucher_number" name="voucher_number" class="form-control" value="{{@$new_vouchers_no['voucher_no']}}" required />
                    <input type="hidden" id="unique_number" name="unique_number" value="{{@$new_vouchers_no['unique_no']}}"  />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="voucher_date" class="form-label">Vouchers Date</label>
                    <input type="date" id="voucher_date" name="voucher_date" class="form-control" value="<?php echo date('Y-m-d')?>" required />
                </div>
            </div>

        </div>
        <div class="row"><div class="col-lg-12"><h4>Vouchers Details</h4><hr></div></div>
         <?php $rand = rand();  ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table">
              <thead>
                <tr>
                    <th>Debit account </th>
                    <th>Amount</th>
                </tr>
              </thead>
                <tbody>
                 <tr role="row">
                    <td>
                      <select id="ledger_account_id_<?= $rand ?>" name="debit_ledger_account_id" class="form-control selectpicker" required onchange="get_closing_balanace(<?= $rand ?>)">
                          <option value="">Select Ledger </option>
                          @foreach($ledgers as $key => $ledger)
                              <option data-closing_balance="{{$ledger['closing_balance']}}" value="{{$ledger['id']}}">{{$ledger['title']}}</option>    
                          @endforeach
                      </select>
                      <span class="text-danger" id="ledger_account_close_balance_ui_<?=$rand?>"></span>
                      <input type="hidden" id="ledger_account_close_balance_<?=$rand?>" name="debit_ledger_account_close_balance" class="form-control"/>
                    </td>
                    <td><input type="text" id="debit_ledger_account_amount" name="debit_ledger_account_amount" class="form-control debit_amount_class" /></td>
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
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
              </thead>
                <tbody  id="add_row_ajax">
                 <tr role="row">
                    <td>
                    <select id="ledger_account_id_<?=$rand?>" name="credit_ledger_account_id[]" class="form-control selectpicker" required onchange="get_closing_balanace(<?= $rand ?>)">
                          <option value="">Select Ledger </option>
                          @foreach($ledgers as $key => $credit_ledger)
                              <option data-closing_balance="{{$credit_ledger['closing_balance']}}"  value="{{$credit_ledger['id']}}">{{$credit_ledger['title']}}</option>    
                          @endforeach
                      </select>
                      <span class="text-danger" id="ledger_account_close_balance_ui_<?=$rand?>"></span>
                      <input type="hidden" id="ledger_account_close_balance_<?=$rand?>" name="credit_ledger_account_close_balance[]" class="form-control"/>
                    </td>
                    <td><input type="text" id="ledger_account_amount" name="credit_ledger_account_amount[]" class="form-control credit_amount_class" /></td>
                    <td><button type="button" class=" margin-r-10 float-right btn btn-primary" onclick="add_more_rows()" ><i class="las la-plus-circle"></i>+</button></td>
                </tr>
                </tbody>
            </table>
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

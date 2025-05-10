<?php $rand = rand(); ?>
<tr role="row">
    <td>
    <input type="hidden" id="update_transaction_type" name="update_new_transaction_type[]" value="credit" class="form-control"/>
    <select id="update_ledger_account_id_<?=$rand?>" name="update_new_ledger_account_id[]" class="form-control selectpicker" required >
          <option value="">Select Ledger Group</option>
          @foreach($ledgers as $key => $ledger)
              <option value="{{$ledger['id']}}">{{$ledger['title']}}</option>    
          @endforeach
      </select>
    </td>
    <td><input type="text" id="update_ledger_account_close_balance" name="update_new_ledger_account_close_balance[]" class="form-control"/></td>
    <td><input type="text" id="update_ledger_account_amount" name="update_new_ledger_account_amount[]" class="form-control" /></td>
    <td><button type="button" class="margin-r-10 float-right btn btn-primary" onclick="update_more_rows()" ><i class="las la-plus-circle"></i>+</button></td>
</tr>
@foreach ($Credit_row as $key => $value)
<?php $rand = rand(); ?>
<tr role="row" id="row_<?= $value['id'] ?>">
    <td>
    <input type="hidden" id="update_vouchers_id" name="update_vouchers_id[]" class="form-control" value="{{$value['id']}}"/>
    <input type="hidden" id="update_transaction_type" name="update_transaction_type[]" value="credit" class="form-control"/>
    <select id="update_ledger_account_id_<?=$rand?>" name="update_ledger_account_id[]" class="form-control selectpicker" required >
    <option value="">Select Ledger Group</option>
          @foreach($ledgers as $key => $ledger)
              <option <?php if($value['ledger_account_id'] == $ledger['id']) { echo 'selected'; } ?> value="{{$ledger['id']}}">{{$ledger['title']}}</option>    
          @endforeach
      </select>
    </td>
    <td><input type="text" id="update_ledger_account_close_balance" name="update_ledger_account_close_balance[]" class="form-control" value="{{$value['ledger_account_close_balance']}}" /></td>
    <td><input type="text" id="update_ledger_account_amount" name="update_ledger_account_amount[]" class="form-control" value="{{$value['ledger_account_amount']}}"/></td>
    <td><button type="button" class="margin-r-10 float-right btn btn-danger" onclick="delete_credit_row({{$value['id']}})" ><i class="las la-plus-circle"></i>-</button>

@endforeach
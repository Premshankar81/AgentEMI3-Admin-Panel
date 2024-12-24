<table class="table table-hover">
    <tbody>
        <tr>
            <td>Account Type</td>
            <td>Saving Account</td>
        </tr>
        <tr>
            <td>Account No</td>
            <td>{{@$row->account->account_no}}</td>
        </tr>
        <tr>
            <td>Account Holder</td>
            <td>{{@$row->customer->name}}</td>
        </tr>
        <tr>
            <td>
                Narration
            </td>
            <td>
                {{$row->remark}}
            </td>

        </tr>
        <tr>
            <td>
                Date of transaction
            </td>
            <td>
                {{Helper::getFromDate($row->transation_date)}}
            </td>
        </tr>
        <tr>
            <td>
                Deposit
            </td>
            <td>
                {{$row->amount}}
                    <table class="table">
                    </table>
            </td>
        </tr>
        <tr>
            <td>
                Withdraw
            </td>
            <td>
                0.00
            </td>
        </tr>
        <tr>
            <td>
                Payment Mode
            </td>
            <td>
                <?= ucfirst($row->payment_mode); ?>
            </td>
        </tr>
                                    <tr>
            <td>
                Ledger Account
            </td>
            <td>
                {{@$row->ledger->title}}
            </td>
        </tr>
        <tr>
            <td>
                Created by
            </td>
            <td>
                Manoj Gurjar
            </td>
        </tr>
        <tr>
            <td>
                Created date
            </td>
            <td>
               {{Helper::getFromDate($row->created_at)}}
            </td>
        </tr>
        <tr>
             <td>
                Collection Status
            </td>
            <td>
                
                <input type="hidden" name="tran_amount" value="{{$row->amount}}">
                <select class="form-control" id="agent_payment_status" name="agent_payment_status">
                    <option selected="selected" value="pending">Pending</option>
                    <option value="completed">Completed</option> 
                    
                </select>
            </td>
        </tr>

    </tbody>
</table>
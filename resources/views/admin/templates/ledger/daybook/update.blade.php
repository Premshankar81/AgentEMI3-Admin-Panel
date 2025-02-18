<div class="modal fade" id="update_row_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Update Data</h4>
        </div>
        <form id="update_form" method="post" name="update_form" >
        {{csrf_field()}}
        <div class="modal-body">
           <div class="row">
                
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Date</label>
                        <input type="date" id="edit_date" name="edit_date"  class="form-control" required />
                    </div>
                </div>
    
                 <div class="col-lg-6">
                      <div class="form-group">
                          <label for="ledger_group" class="form-label">Description</label>
                          <select id="edit_description" name="edit_description" class="form-control" required >
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
                        <select id="edit_transaction_type" name="edit_transaction_type" class="form-control" required >
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
                        <label for="edit_debit_amount" class="form-label">Debit Amount</label>
                        <input type="number" id="edit_debit_amount" name="edit_debit_amount" class="form-control"  />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="credit_amount" class="form-label">Credit Amount</label>
                        <input type="number" id="edit_credit_amount" name="edit_credit_amount" class="form-control" />
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
          <input type="submit" value="Update" class="btn btn-success"/>
        </div>
        </form>
      </div>
    </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button');
    const editForm = document.getElementById('update_form');
           // Base URL for the form action
    const baseUrl = "{{ url('admin/ledger-daybook-update') }}";
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id'); // Get the row ID
            // Update the form's action URL with the correct ID
            editForm.setAttribute('action', `${baseUrl}/${id}`);
            // Make an AJAX request to fetch data based on the ID
            fetch(`{{ route('admin.ledger.daybook.get.entry', ':id') }}`.replace(':id', id))
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate modal fields with fetched data
                    document.querySelector('#edit_date').value = data.date;
                    document.querySelector('#edit_description').value = data.description;
                    document.querySelector('#edit_transaction_type').value = data.transaction_type;
                    document.querySelector('#edit_debit_amount').value = data.debit_amount || '';
                    document.querySelector('#edit_credit_amount').value = data.credit_amount || '';

                    // Show modal
                    $('#update_row_modal').modal('show');
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    });
});


</script>
    
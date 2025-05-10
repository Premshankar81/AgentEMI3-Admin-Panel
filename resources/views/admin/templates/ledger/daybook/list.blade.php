<section class="content-header">
      <h1> Dashboard <small>{{$data['page_title']}}</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> Home </a>
        </li>
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li class="active">{{$data['page_title']}}</li>
      </ol>
    </section>
    <style type="text/css">
    
    </style>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header" style="width:100%">
              <h3 class="box-title">{{$data['page_title']}} List 

                <a class="float-right btn btn-warning " href="{{route('admin.ledger.daybook.export')}}"><i
                   class="mdi mdi-file-export "></i> Export</a>  
                  <button type="button" class="margin-r-10 float-right btn btn-primary " data-toggle="modal" data-target="#add_row_modal"><i
                   class="las la-plus-circle "></i> Add New</button> 
              </h3>
            </div>

            <div class="box-body">
              <table  class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Transaction Type</th>
                        <th>Debit (₹)</th>
                        <th>Credit (₹)</th>
                        <th>Balance (₹)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="TableRecordList">
                    @foreach ($data['daybook'] as $key => $entry)
                        <tr>
                            <td>{{ $key + 1 }}</td> <!-- Serial Number -->
                            <td>{{ \Carbon\Carbon::parse($entry['date'])->format('d-m-Y') }}</td> <!-- Formatted Date -->
                            <td>{{ $entry['description'] }}</td> <!-- Description -->
                            <td>{{ $entry['transaction_type'] ?: '-' }}</td> <!-- Transaction Type -->
                            <td>{{ $entry['debit_amount'] ? '₹ ' . number_format($entry['debit_amount'], 2) : '-' }}</td> <!-- Debit Amount -->
                            <td>{{ $entry['credit_amount'] ? '₹ ' . number_format($entry['credit_amount'], 2) : '-' }}</td> <!-- Credit Amount -->
                            <td>{{ '₹ ' . number_format($entry['balance'], 2) }}</td> <!-- Balance -->
                            <td>
                              <!-- Allow action buttons only for the last row -->
                              @if ($loop->last)
                                  <button data-toggle="modal" data-target="#update_row_modal" class="btn btn-sm btn-primary edit-button" data-id="{{ $entry['id'] }}">Edit</button>
                                  <form action="#', $entry['id']) }}" method="POST" style="display: inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                  </form>
                              @else
                                  <span class="text-muted">No actions</span>
                              @endif
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            </div>
          </div>
        </div>
      </div>
    </section>

    
@extends('admin.layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contactList as $contactData)
                    <tr>
                      <td class="contactName">{{ $contactData->name }}</td>
                      <td class="contactEmail">{{ $contactData->email }}</td>
                      <td class="contactSubject">{{ $contactData->subject }}</td>
                      <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" id="contactDetailModal" data-id="{{ $contactData->id }}">
                        View
                      </button></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Contact Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="modalContactName"></span></p>
                <p><strong>Phone:</strong> <span id="modalContactEmail"></span></p>
                <p><strong>Message:</strong> <span id="modalContactSubject"></span></p>
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
      <script>
       $(document).ready(function() {
    $('#example1').on('click', '.btn-default', function() {
        // Get the contact details from the row
        var row = $(this).closest('tr');
        var contactName = row.find('.contactName').text();
        var contactEmail = row.find('.contactEmail').text();
        var contactSubject = row.find('.contactSubject').text();

        // Populate the modal with the contact details
        $('#modalContactName').text(contactName);
        $('#modalContactEmail').text(contactEmail);
        $('#modalContactSubject').text(contactSubject);
    });
});
        </script>
        
@endsection
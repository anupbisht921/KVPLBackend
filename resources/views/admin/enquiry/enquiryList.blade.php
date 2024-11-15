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
                  <table id="enquiryTabl" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Course Mode</th>
                      <th>Course</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($enquiryData as $enquiry)
                    <tr>
                      <td class="personName">{{ $enquiry->name }}</td>
                      <td class="personEmail">{{ $enquiry->email }}</td>
                      <td class="courseMode">{{ $enquiry->course_mode }}</td>
                      <td class="courseName">
                        {{ $courseLists[$enquiry->course_id] ?? 'No Course Selected' }}
                    </td>
                      
                      <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" id="enquiryDetailModal" data-id="{{ $enquiry->id }}">
                        View
                      </button></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Course Mode</th>
                      <th>Course</th>
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
              <h4 class="modal-title">Enquiry Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="modalContactName"></span></p>
                <p><strong>Email:</strong> <span id="modalpersonEmail"></span></p>
                <p><strong>Course Mode:</strong> <span id="modalcourseMode"></span></p>
                <p><strong>Course Name:</strong> <span id="modalcourseName"></span></p>
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
    $('#enquiryTabl').on('click', '.btn-default', function() {
        // Get the contact details from the row
        var row = $(this).closest('tr');
        var contactName = row.find('.personName').text();
        var personEmail = row.find('.personEmail').text();
        var courseMode = row.find('.courseMode').text(); 
        var courseName = row.find('.courseName').text(); 

        // Populate the modal with the contact details
        $('#modalContactName').text(contactName);
        $('#modalpersonEmail').text(personEmail);
        $('#modalcourseMode').text(courseMode);
        $('#modalcourseName').text(courseName);
    });
});
        </script>
        
@endsection
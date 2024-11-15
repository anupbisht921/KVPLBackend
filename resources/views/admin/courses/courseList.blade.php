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
          @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
          <div class="row">
            <div class="col-12">
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Course Name</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @foreach ($courseData as $list)                        
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $list->name }}</td>
                        <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{ route('admin.editCourse',$list->id) }}">
                              <i class="fas fa-pencil-alt"></i>Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('admin.deleteCourse', $list->id) }}">
                              <i class="fas fa-trash"></i>Delete
                          </a>
                      </td>
                      </tr>
                      @php $i++; @endphp
                      @endforeach         
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Course Name</th>
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
@endsection
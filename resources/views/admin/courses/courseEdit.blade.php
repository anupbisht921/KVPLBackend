@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Course</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{  route('admin.updateCourse',$courseData->id) }}" method="post">
            @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            {{-- @php dd($courseData->name); @endphp --}}
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Course Name</label>
                <input type="text" id="inputName" class="form-control" name="courseName" value = "{{ $courseData->name }}">
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select" name="status">
                  <option selected disabled>Select one</option>
                    <option value="1" {{ $courseData->isActive == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $courseData->isActive == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
              </div>
            </div>
        
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Update Course" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
 
@endsection
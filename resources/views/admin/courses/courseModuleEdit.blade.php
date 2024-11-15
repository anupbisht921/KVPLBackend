@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Module Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Course Module</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('admin.updateCourseModule',$courseModule->id) }}" method="post">
            @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              {{-- <h3 class="card-title">General</h3> --}}

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            
            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">Select Course</label>
                <select id="inputStatus" class="form-control custom-select" name="courseId">
                  <option selected disabled>Select one</option>
                    @foreach ($courseLists as $id => $name)
                        <option value="{{ $id }}" {{ $courseModule->course_id == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Course Short Desc</label>
                <input type="text" id="inputName" class="form-control" name="courseTitle" value="{{ $courseModule->courseTitle}}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Course Description</label>
                <textarea id="editor" name="courseDesc" rows="15" cols="80">{{ $courseModule->courseDesc }}</textarea>
              </div>
            </div>
        
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Update Course Module" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
</script>
@endsection
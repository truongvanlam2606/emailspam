@extends('admin.layouts.layout')
@section('title', 'Create Email')
@section('title-breadcrumb', 'Create Email')
@section('content')

<div class="section">

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.import-email.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input name="file" type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
            </div>

            <div class="form-group">
                <label>Select</label>
                <select class="form-control" name="email_template_id">
                    @foreach ($emailTemplates as $emailTemplate)
                        <option value="{{$emailTemplate->id}}">{{$emailTemplate->name}}</option>
                    @endforeach
                  </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>

@endsection


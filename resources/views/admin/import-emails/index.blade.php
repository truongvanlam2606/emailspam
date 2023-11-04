@extends('admin.layouts.layout')
@section('title', 'Exam')
@section('title-breadcrumb', 'Exam')

@section('content')

<div class="section">
    <div class="pr-5 text-right">
        <a class="btn btn-sm btn-primary" href="{{route('admin.import-email.create')}}"> Create </a>
    </div>
    <div class="row pt-3">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Emails Job</h3>
            </div>

            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="width: 20px">Id</th>
                        <th style="width: 150px">path</th>
                        <th>status</th>
                        <th>number faild</th>
                        <th>number success</th>
                    </tr>
                    </thead>
                <tbody>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script>

        jQuery(function($) {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route("admin.import-email.datatables") !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'path_file', name: 'path_file' },
                    { data: 'status', name: 'status' },
                    { data: 'number_faild', name: 'number_faild' },
                    { data: 'number_success', name: 'number_success' },
                ]
            });
        });
    </script>

@endpush


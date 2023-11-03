@extends('admin.layouts.layout')
@section('title', 'Questions')
@section('title-breadcrumb', 'Questions')

@section('content')

<div class="section">
    <div class="pr-5 text-right">
        <a class="btn btn-sm btn-primary" href="{{route('admin.email-template.create')}}"> Create </a>
    </div>
    <div class="row pt-3">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Emails</h3>
            </div>

            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="width: 20px">Id</th>
                        <th style="width: 150px">name</th>
                        <th style="width: 200px">Action</th>
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
                ajax: '{!! route("admin.email-template.datatables") !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>

@endpush


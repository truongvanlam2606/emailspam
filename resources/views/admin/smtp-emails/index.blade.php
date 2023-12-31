@extends('admin.layouts.layout')
@section('title', 'SMTP Email')
@section('title-breadcrumb', 'SMTP Email')

@section('content')

<div class="section">
    <div class="pr-5 text-right">
        <a class="btn btn-sm btn-primary" href="{{route('admin.smtp-email.create')}}"> Create </a>
    </div>
    <div class="row pt-3">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">SMTP Emails</h3>
            </div>

            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="width: 20px">Id</th>
                        <th style="width: 150px">Mail User Name</th>
                        <th style="width: 150px">Mail Password</th>
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
                ajax: '{!! route("admin.smtp-email.datatables") !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'mail_username', name: 'mail_username' },
                    { data: 'mail_password', name: 'mail_password' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>

@endpush


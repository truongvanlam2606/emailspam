@extends('admin.layouts.layout')
@section('title', 'Exam')
@section('title-breadcrumb', 'Exam')

@section('content')

<div class="section">
    <div class="pr-5 text-right">
    </div>
    <div class="row pt-3">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Emails sended</h3>
            </div>

            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="width: 20px">Id</th>
                        <th style="width: 150px">email</th>
                        <th>status</th>
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
                ajax: '{!! route("admin.email-sended.datatables") !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status' },
                ]
            });
        });
    </script>

@endpush


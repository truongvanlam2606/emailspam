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
                        <th>Gửi thất bại</th>
                        <th>Gửi thành công</th>
                        <th>Số lần thử lại</th>
                        <th>Message Lỗi</th>
                        <th>Hành động</th>
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
                    { data: 'retry', name: 'retry' },
                    { data: 'message', name: 'message' },
                    { data: 'action', name: 'action' },
                ]
            });
        });

        jQuery( document ).ready(function() {
            $(document).on('click', '.actionRetry', function(e) {
                e.preventDefault();
                var idForm = 'retry-' + $(this).attr('data-id');
                console.log(idForm);
                if (confirm('Are you sure ?')) {
                    var form = document.getElementById(idForm);
                    form.submit();
                } else {
                    return false;
                }
            });
        });

    </script>

@endpush


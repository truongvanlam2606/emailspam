@extends('admin.layouts.layout')
@section('title', 'Edit Question')
@section('title-breadcrumb', 'Edit SMTP email')

@section('content')

<div class="section">
    <add-smtp-email :data="{{$smtpEmail}}"></add-smtp-email>
</div>

@endsection


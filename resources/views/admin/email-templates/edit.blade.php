@extends('admin.layouts.layout')
@section('title', 'Edit Question')
@section('title-breadcrumb', 'Edit Question')

@section('content')

<div class="section">
    <add-question :data="{{$emailTemplate}}"></add-question>
</div>

@endsection


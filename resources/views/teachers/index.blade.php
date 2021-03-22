@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Teachers</h1>
    <h1 class="pull-right">
        <a data-toggle="modal" data-target="#teacher-add-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px">Add New</a>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            @include('teachers.table')
            <form method="POST" action="{{route('teachers.store')}}" enctype="multipart/form-data">
                @csrf
                @include('teachers.fields')
            </form>
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection

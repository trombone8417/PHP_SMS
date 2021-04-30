@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Class Assignings</h1>
        <div class="btn btn-group">
            <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o" style="color: white"></i>&nbsp;&nbsp;PDF</button>
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu" id="export-menu">
                <li id="export-to-pdf">
                    <a href="{{url('pdf-download-class-assign')}}" class="btn btn">Download PDF </a>
                </li>
                <li role="separator" class="divider"></li>
                <li id="import-to-pdf">
                    <a href="" class="btn btn">Import PDF</a>
                </li>
            </ul>
        </div>
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#classschedule-show" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('class_assignings.table')
                    @include('class_assignings.show_fields')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


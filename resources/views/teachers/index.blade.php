@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Teachers</h1>
    {{-- PDF --}}
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
    {{-- Excel --}}
    <div class="btn btn-group">
        <button type="button" class="btn btn-success"><i class="fa fa-file-excel-o" style="color: white"></i>&nbsp;&nbsp;Excel</button>
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu" id="export-menu">
            <li id="export-to-pdf">
                <a href="{{url('excel-export-teachers_xlsx')}}" class="btn btn">Export Xlsx </a>
            </li>
            <li id="export-to-pdf">
                <a href="{{url('excel-export-teachers_csv')}}" class="btn btn">Export Csv </a>
            </li>
            <li id="export-to-pdf">
                <a href="{{url('excel-export-teachers_xls')}}" class="btn btn">Export Xls </a>
            </li>
            <li role="separator" class="divider"></li>
            <li id="import-to-pdf">
                <a href="" class="btn btn">Import Excel</a>
            </li>
        </ul>
    </div>
    {{-- Word --}}
    <div class="btn btn-group">
        <button type="button" class="btn btn-primary"><i class="fa fa-file-word-o" style="color: white"></i>&nbsp;&nbsp;WORD</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu" id="export-menu">
            <li id="export-to-pdf">
                <a href="{{url('pdf-download-class-assign')}}" class="btn btn">Download WORD </a>
            </li>
            <li role="separator" class="divider"></li>
            <li id="import-to-pdf">
                <a href="" class="btn btn">Import WORD</a>
            </li>
        </ul>
    </div>
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

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Admissions</h1>
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#admission-add-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admissions.table')
                    <form method="POST" action="{{route('admissions.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('admissions.fields')
                    </form>
                    
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


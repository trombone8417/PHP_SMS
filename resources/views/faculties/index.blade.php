@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Faculties</h1>
        <h1 class="pull-right">
           <a  data-toggle="modal" data-target="#fields-add-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('faculties.table')
                    {!! Form::open(['route' => 'faculties.store']) !!}

                        @include('faculties.fields')

                    {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


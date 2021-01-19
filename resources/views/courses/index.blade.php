@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Courses</h1>
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#course-add-modal"  class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px"><i class="fa fa-plus-circle">&nbsp;Add New Course</i></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('courses.table')
                    {!! Form::open(['route' => 'courses.store']) !!}

                        @include('courses.fields')

                    {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


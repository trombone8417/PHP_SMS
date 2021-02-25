@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Class Schedule
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($classSchedule, ['route' => ['classSchedules.update', $classSchedule->id], 'method' => 'patch']) !!}

                        @include('class_schedules.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
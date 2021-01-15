@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <i class="fa fa-registered">&nbsp;Role</i>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($role, ['route' => ['roles.update', $role->role_id], 'method' => 'patch']) !!}

                   <div class="form-group col-md-6">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div> </div>
               <div>
                    {!! Form::submit('Update Role', ['class' => 'btn btn-info']) !!}
                </div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

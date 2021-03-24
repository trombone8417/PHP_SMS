@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Teacher
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                    @include('teachers.show_fields')
            </div>
        </div>
    </div>
@endsection

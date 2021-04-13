@extends('layouts.app')

@section('content')
<style>
    .student-image,
    .image>input[type="button"] {
        width: 100px;
        height: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .image>input[type="file"] {
        display: none;
    }
</style>
    <section class="content-header">
        <h1>
            Admission
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
                    {{-- <div class="row"> --}}
                   {!! Form::model($admission, ['route' => ['admissions.update', $admission->student_id], 'method' => 'patch']) !!}

                   <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Student
                        </h3>
                    </div>
                    <div class="panel-body">

                        <input type="hidden" value="{{Auth::id()}}" name="user_id" id="user_id" required>
                        <input type="hidden" name="dateregistered" id="dateregistered" value="{{date('Y-m-d')}}">
                        <div class="row">
                            {{-- <div class="form-group col-sm-3">
                                <label>Roll No</label>
                                <input type="text" name="roll_no" id="roll_no" class="form-control" autocomplete="off" placeholder="Roll No">
                            </div> --}}
                            <!-- First Name Field -->
                            <div class="form-group col-sm-3">
                                <label>First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" autocomplete="off" value="{{$admission->first_name}}" >
                            </div>
                            <!-- Last Name Field -->
                            <div class="form-group col-sm-3">
                                <label>Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" autocomplete="off" placeholder="Last Name" value="{{$admission->last_name}}">
                            </div>
                            <!-- Image Field -->
                            <div class="form-group col-sm-3 image">
                                {!! Html::image('student_images/'.$admission->image, null, ['class' => 'student-image','id' =>
                                'showImage']) !!}
                                <input type="file" name="images" id="image" accept="image/x-png, image/png, image/jpg, image/jpeg">
                                <input type="button" name="browse_file" id="browse_file" class="form-control text-capitalize btn-browse" class="btn btn-outline-danger" value="Choose">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Email Field -->
                            <div class="form-group col-sm-3">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control"  value="{{$admission->email}}" placeholder="Email">
                            </div>
                            <!-- Dob Field -->
                            <div class="form-group col-sm-3">
                                <label>Date of Birth</label>
                                <input type="text" name="dob" id="dob" class="form-control"  value="{{$admission->dob}}" placeholder="Date of Birth" autocomplete="off">
                            </div>

                            @push('scripts')
                            <script type="text/javascript">
                                $('#dob').datetimepicker({
                                    format: 'YYYY-MM-DD HH:mm:ss',
                                    useCurrent: false
                                })
                            </script>
                            @endpush
                            <!-- Phone Field -->
                            <div class="form-group col-sm-3">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control"  value="{{$admission->phone}}" placeholder="Phone">
                            </div>
                            <!-- Gender Field -->
                            <div class="form-group col-sm-3">
                                <label>Gender : </label><br>
                                <label>
                                    <input type="radio" name="gender" id="gender" value="0" {{$admission->gender==0?'checked':''}}>
                                    Male
                                </label>
                                <label><input type="radio" name="gender" id="gender" value="1" {{$admission->gender==1?'checked':''}}>
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Nationality Field -->
                            <div class="form-group col-sm-3">
                                <label>Nationality</label>
                                <input type="text" name="nationality" id="nationality" class="form-control" value="{{$admission->nationality}}"  placeholder="Nationality">
                            </div>

                            <!-- Passport Field -->
                            <div class="form-group col-sm-3">
                                <label>Passport</label>
                                <input type="text" name="passport" id="passport" class="form-control"  value="{{$admission->passport}}" placeholder="Passport">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Department</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="0" selected="true" disabled="true">Choose Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->department_id}}" {{$department->department_id==$admission->department_id?'selected':''}}>{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Faculty</label>
                                <select name="faculty_id" id="faculty_id" class="form-control">
                                    <option value="0" selected="true" disabled="true">Choose Faculty</option>
                                    @foreach ($faculties as $faculty)
                                    <option value="{{$faculty->faculty_id}}" {{$faculty->faculty_id==$admission->faculty_id?'selected':''}}>{{$faculty->faculty_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label>Batch</label>
                                <select name="batch_id" id="batch_id" class="form-control">
                                    <option value="0" selected="true" disabled="true">Choose Batch</option>
                                    @foreach ($batches as $batch)
                                    <option value="{{$batch->batch_id}}" {{$batch->batch_id==$admission->batch_id?'selected':''}}>{{$batch->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Status Field -->
                            <div class="form-group col-sm-3">
                                <label>Status : </label><br>
                                <label>
                                    <input type="radio" name="status" id="status" value="0" required checked {{$admission->status==0?'checked':''}}>
                                    Single
                                </label>
                                <label>
                                    <input type="radio" name="status" id="status" value="1" required {{$admission->status==1?'checked':''}}>
                                    Married
                                </label>
                            </div>
                        </div>
                        @push('scripts')
                        <script type="text/javascript">
                            $('#dateregistered').datetimepicker({
                                format: 'YYYY-MM-DD HH:mm:ss',
                                useCurrent: false
                            })
                        </script>
                        @endpush
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Family
                        </h3>
                    </div>
                    <div class="panel-body">
                        <!-- Father Name Field -->
                        <div class="form-group col-sm-4">
                            <label>Father Name</label>
                            <input type="text" name="father_name" id="father_name" class="form-control" autocomplete="off" value="{{$admission->father_name}}"  placeholder="Father Name">
                        </div>

                        <!-- Father Phone Field -->
                        <div class="form-group col-sm-4">
                            <label>Father Phone</label>
                            <input type="text" name="father_phone" id="father_phone" class="form-control" autocomplete="off" value="{{$admission->father_phone}}"  placeholder="Father Phone">
                        </div>

                        <!-- Mother Name Field -->
                        <div class="form-group col-sm-4">
                            <label>Mother Name</label>
                            <input type="text" name="mother_name" id="mother_name" class="form-control" autocomplete="off" value="{{$admission->mother_name}}"  placeholder="Mother Name">
                        </div>

                        <!-- Address Field -->
                        <div class="form-group col-sm-6">
                            <label>Address</label>
                            <textarea type="text" name="address" id="address" cols="40" rows="2" class="form-control" placeholder="Address">{{$admission->address}}</textarea>
                        </div>

                        <!-- Current Address Field -->
                        <div class="form-group col-sm-6">
                            <label>Current Address</label>
                            <textarea type="text" name="current_address" id="current_address" cols="40" rows="2" class="form-control" placeholder="Current Address">{{$admission->current_address}}</textarea>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <a href="{{ route('admissions.index') }}" class="btn btn-default">Back</a>
                    <!-- Submit Field -->
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
                   {!! Form::close() !!}
               {{-- </div> --}}
           </div>
       </div>
   </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('#dob').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    })
    $('#dateregistered').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: false
    })
    $('#browse_file').on('click', function() {
        $('#image').click();
    })
    $('#image').on('change', function(e) {
        showFile(this, '#showImage');
    })

    function showFile(fileInput, img, showName) {
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(img).attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
        $(showName).text(fileInput.files[0].name)
    }
</script>
@endpush

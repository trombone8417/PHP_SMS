@extends('layouts.frontLayout.app')

@section('content')
{{-- <section class="content-header">
        <h1>
            Student
        </h1>
    </section> --}}
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <!-- Content Wrapper. Contains page content -->
            {{-- <div class="content-wrapper"> --}}
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    User Profile
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">User profile</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle"
                                    src="{{asset('student_images/'.$students->image)}}" alt="User profile picture">

                                <h3 class="profile-username text-center">{{$students->first_name}}
                                    {{$students->last_name}}</h3>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="pull-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="pull-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="pull-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">About Me</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                </p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Teacher TimeTable</a></li>
                                <li><a href="#timeline" data-toggle="tab">Full Detail</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    {{-- 學生課表 --}}
                                    <section class="content-header">
                                        <h1 class="pull-left">Teacher TimeTable</h1>
                                        <br>
                                    </section>
                                    <div class="content">
                                        <div class="clearfix"></div>

                                        @include('flash::message')
                                        @include('adminlte-templates::common.errors')
                                        <div class="clearfix"></div>
                                        <div class="box box-primary">
                                            <div class="box-body"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    {{-- 學生詳細資料 --}}
                                    <section class="content-header">
                                        <h1 class="pull-left">Full Detail</h1>
                                        <br>
                                    </section>
                                    <div class="content">
                                        <div class="clearfix"></div>

                                        @include('flash::message')
                                        @include('adminlte-templates::common.errors')
                                        <div class="clearfix"></div>
                                        <div class="box box-primary">
                                            <div class="box-body"><br>

                                                <form class="form-horizontal">

                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-3 control-label">Full
                                                            Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="inputName" id="inputName"
                                                                class="form-control"
                                                                value="{{ $students->first_name }} {{ $students->last_name }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail"
                                                            class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="inputEmail" id="inputEmail"
                                                                class="form-control" value="{{ $students->email }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">

                                                            @if($students->gender == 0)
                                                            <span>Male </span>
                                                            @else
                                                            <span>Female </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Status</label>
                                                        <div class="col-sm-9">

                                                            @if($students->status == 0)
                                                            <span>Single </span>
                                                            @else
                                                            <span>Married </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputDob" class="col-sm-3 control-label">Date of
                                                            Birth</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="inputDob" id="inputDob"
                                                                class="form-control" value="{{ $students->dob }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPhone" class="col-sm-3 control-label">Phone
                                                            No.</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="inputPhone" id="inputPhone"
                                                                class="form-control" value="{{ $students->phone }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassport"
                                                            class="col-sm-3 control-label">Passport
                                                            No.</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="inputPassport" id="inputPassport"
                                                                class="form-control" value="{{ $students->passport }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputAddress"
                                                            class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="inputAddress" id="inputAddress"
                                                                class="form-control"
                                                                disabled>{{$students->address}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNationality"
                                                            class="col-sm-3 control-label">Nationality</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="inputNationality"
                                                                id="inputNationality" class="form-control"
                                                                value="{{ $students->nationality }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputRegisteredDate"
                                                            class="col-sm-3 control-label">Registered
                                                            Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="inputRegisteredDate"
                                                                id="inputRegisteredDate" class="form-control"
                                                                value="{{date("Y-m-d",strtotime($students->dateregistered))}}"
                                                                disabled>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                {{-- 更換密碼 --}}
                                <div class="tab-pane" id="settings">
                                    <section class="content-header">
                                        <h1 class="pull-left">Change Password</h1>
                                        <br>
                                    </section>
                                    <div class="content">
                                        <div class="clearfix"></div>

                                        @include('flash::message')
                                        @include('adminlte-templates::common.errors')
                                        <div class="clearfix"></div>
                                        <div class="box box-primary">
                                            <div class="box-body"><br>
                                                <form action="{{url('/student-update-password')}}" class="form-horizontal" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" name="email" id="" value="{{$students->email}}">
                                                        <label for="oldPassword" class="col-sm-3 control-label">Old
                                                            Password</label>

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="oldPassword"
                                                                id="oldPassword" placeholder="Old Password">
                                                                <i class="input-icon" id="messageError"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newPassword" class="col-sm-3 control-label">New
                                                            Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="newPassword"
                                                                id="newPassword" placeholder="New Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-info">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
            {{-- </div> --}}
            <!-- /.content-wrapper -->
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#oldPassword").keyup(function(){
            var oldPassword=$("#oldPassword").val();

            $.ajax({
                type: 'get',
                url: '/varify-password',
                data:{oldPassword:oldPassword},
                success: function(response){
                    if (response == "false") {
                        $("#messageError").html("<font color='red'>Password Incorrect</font>")

                    } else if(response == "true") {
                        $("#messageError").html("<font color='green'>Correct Password</font>")
                    }
                }
            });
        })
    })
</script>
@endpush

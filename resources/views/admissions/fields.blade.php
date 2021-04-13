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
{{-- modal 彈出視窗 header(頭) --}}
<div class="modal fade bd-example-modal-lg" id="admission-add-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Admission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal 彈出視窗 header(尾) --}}
                <!-- Roll No Field -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Student
                        </h3>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" name="username" id="username" value="{{$rand_username_password}}">
                        <input type="hidden" name="password" id="password" value="{{$rand_username_password}}">
                        <input type="hidden" name="roll_no" id="roll_no" value="{{$roll_id}}">
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
                                <input type="text" name="first_name" id="first_name" class="form-control" autocomplete="off" placeholder="First Name">
                            </div>
                            <!-- Last Name Field -->
                            <div class="form-group col-sm-3">
                                <label>Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" autocomplete="off" placeholder="Last Name">
                            </div>
                            <!-- Image Field -->
                            <div class="form-group col-sm-3 image">
                                {!! Html::image('student_images/profile.jpg', null, ['class' => 'student-image','id' =>
                                'showImage']) !!}
                                <input type="file" name="images" id="image" accept="image/x-png, image/png, image/jpg, image/jpeg">
                                <input type="button" name="browse_file" id="browse_file" class="form-control text-capitalize btn-browse" class="btn btn-outline-danger" value="Choose">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Email Field -->
                            <div class="form-group col-sm-3">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <!-- Dob Field -->
                            <div class="form-group col-sm-3">
                                <label>Date of Birth</label>
                                <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth" autocomplete="off">
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
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                            </div>
                            <!-- Gender Field -->
                            <div class="form-group col-sm-3">
                                <label>Gender : </label><br>
                                <label><input type="radio" name="gender" id="gender" value="0">Male</label>
                                <label><input type="radio" name="gender" id="gender" value="1">Female</label>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Nationality Field -->
                            <div class="form-group col-sm-3">
                                <label>Nationality</label>
                                <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality">
                            </div>

                            <!-- Passport Field -->
                            <div class="form-group col-sm-3">
                                <label>Passport</label>
                                <input type="text" name="passport" id="passport" class="form-control" placeholder="Passport">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Department</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="0" selected="true" disabled="true">Choose Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Faculty</label>
                                <select name="faculty_id" id="faculty_id" class="form-control">
                                    <option value="0" selected="true" disabled="true">Choose Faculty</option>
                                    @foreach ($faculties as $faculty)
                                    <option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
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
                                    <option value="{{$batch->batch_id}}">{{$batch->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Status Field -->
                            <div class="form-group col-sm-3">
                                <label>Status : </label><br>
                                <label><input type="radio" name="status" id="status" value="0" required checked>Single</label>
                                <label><input type="radio" name="status" id="status" value="1" required>Married</label>
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
                            <input type="text" name="father_name" id="father_name" class="form-control" autocomplete="off" placeholder="Father Name">
                        </div>

                        <!-- Father Phone Field -->
                        <div class="form-group col-sm-4">
                            <label>Father Phone</label>
                            <input type="text" name="father_phone" id="father_phone" class="form-control" autocomplete="off" placeholder="Father Phone">
                        </div>

                        <!-- Mother Name Field -->
                        <div class="form-group col-sm-4">
                            <label>Mother Name</label>
                            <input type="text" name="mother_name" id="mother_name" class="form-control" autocomplete="off" placeholder="Mother Name">
                        </div>

                        <!-- Address Field -->
                        <div class="form-group col-sm-6">
                            <label>Address</label>
                            <textarea type="text" name="address" id="address" cols="40" rows="2" class="form-control" placeholder="Address"></textarea>
                        </div>

                        <!-- Current Address Field -->
                        <div class="form-group col-sm-6">
                            <label>Current Address</label>
                            <textarea type="text" name="current_address" id="current_address" cols="40" rows="2" class="form-control" placeholder="Current Address"></textarea>
                        </div>

                    </div>
                </div>
                {{-- modal 彈出視窗 footer(頭) --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <!-- Submit Field -->
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
{{-- modal 彈出視窗 footer(尾) --}}


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

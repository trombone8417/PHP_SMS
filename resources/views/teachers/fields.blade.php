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
<div class="modal fade" id="teacher-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal 彈出視窗 header(尾) --}}
                <input type="hidden" value="{{Auth::id()}}" name="user_id" id="user_id" required>
                <input type="hidden" name="dateregistered" id="dateregistered" value="{{date('Y-m-d')}}">

                <!-- First Name Field -->
                <div class="form-group col-sm-6">
                    <label>First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" autocomplete="off"
                        placeholder="First Name">
                </div>

                <!-- Last Name Field -->
                <div class="form-group col-sm-6">
                    <label>Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" autocomplete="off"
                        placeholder="Last Name">
                </div>

                <!-- Gender Field -->
                <div class="form-group col-sm-6">
                    <label>Last Name : </label><br>
                    <label><input type="radio" name="gender" id="gender" value="0">Male</label>
                    <label><input type="radio" name="gender" id="gender" value="1">Female</label>
                </div>

                <!-- Status Field -->
                <div class="form-group col-sm-6">
                    <label>Status : </label><br>
                    <label><input type="radio" name="status" id="status" value="0" required checked>Single</label>
                    <label><input type="radio" name="status" id="status" value="1" required>Married</label>

                </div>

                <!-- Email Field -->
                <div class="form-group col-sm-6">
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                </div>

                <!-- Dob Field -->
                <div class="form-group col-sm-6">
                    <label>Date of Birth</label>
                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth">
                </div>

                <!-- Phone Field -->
                <div class="form-group col-sm-6">
                    <label>Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                </div>

                <!-- Nationality Field -->
                <div class="form-group col-sm-6">
                    <label>Nationality</label>
                    <input type="text" name="nationality" id="nationality" class="form-control"
                        placeholder="Nationality">
                </div>
                <!-- Address Field -->
                <div class="form-group col-sm-6">
                    <label>Address</label>
                    <textarea type="text" name="address" id="address" cols="40" rows="2" class="form-control"
                        placeholder="Address"></textarea>
                </div>


                <!-- Passport Field -->
                <div class="form-group col-sm-6">

                    <label>Passport</label>
                    <input type="text" name="passport" id="passport" class="form-control" placeholder="Passport">
                </div>


                <!-- Image Field -->
                <div class="form-group col-sm-6 image">

                    {!! Html::image('student_images/profile.jpg', null, ['class' => 'student-image','id' =>
                    'showImage']) !!}
                    <input type="file" name="image" id="image" accept="image/x-png, image/png, image/jpg, image/jpeg">
                    <input type="button" name="browse_file" id="browse_file"
                        class="form-control text-capitalize btn-browse" class="btn btn-outline-danger" value="Choose">
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
    $('#browse_file').on('click',function(){
        $('#image').click();
    })
    $('#image').on('change',function(e){
        showFile(this,'#showImage');
    })
    function showFile(fileInput, img,showName){
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $(img).attr('src',e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
        $(showName).text(fileInput.files[0].name)
    }
</script>
@endpush

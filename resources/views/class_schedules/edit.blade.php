<!-- Modal -->
<div class="modal fade" id="class_schedules-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Class Schedules Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <!-- Start Date Field -->
                <div class="form-group col-sm-6">
                    <label>Start Date</label>
                    <input type="text" name="start_date" id="start_date1" class="form-control" autocomplete="off"
                        placeholder="請按這裡">
                </div>

                @push('scripts')
                <script type="text/javascript">
                    $('#start_date1').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: false
                    })
                </script>
                @endpush
                <!-- End Date Field -->
                <div class="form-group col-sm-6">
                    <label>End Date</label>
                    <input type="text" name="end_date" id="end_date1" class="form-control" autocomplete="off"
                        placeholder="請按這裡">
                </div>

                @push('scripts')
                <script type="text/javascript">
                    $('#end_date1').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: false
                    })
                    $('#course_id1').on('change',function(e){
                        console.log(e)
                        var course_id = e.target.value;
                        console.log (course_id);
                        $('#level_id').empty();
                        $.get('dynamicLevel?course_id='+course_id,function(data){
                            console.log(data);
                            $.each(data,function(index,lev){
                                $('#level_id').append('<option value="'+lev.level_id+'">'+lev.level+'</option>');
                            });
                        });
                    });
                    $(document).on('click','#Edit', function(data){
                        var id = $(this).data('id');
                        console.log(id)
                        $.get("{{route('edit')}}",{id:id},function(data){
                            $("#class_id").val(data.class_id);
                            $("#course_id1").val(data.course_id);
                            $("#shift_id").val(data.shift_id);
                            $("#time_id").val(data.time_id);
                            $("#classroom_id").val(data.classroom_id);
                            $("#batch_id").val(data.batch_id);
                            $("#semester_id").val(data.semester_id);
                            $("#start_date1").val(data.start_date);
                            $("#end_date1").val(data.end_date);
                            $("#id").val(data.id);
                            $("#status").val(data.status);
                            $("#level_id").val(data.level_id);
                            console.log(data)
                            // Jquery execute onchange event on onload
                            $("select#course_id1").change();
                        });
                    })
                </script>
                @endpush
                <!-- Course Id Field -->
                <div class="form-group col-sm-6">
                    <select name="course_id" id="course_id1" class="form-control">
                        <option value="">Select Course</option>
                        @foreach ($course as $cour)
                        <option value="{{$cour->course_id}}">{{$cour->course_name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Class Id Field -->
                <div class="form-group col-sm-6">
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">Select Class</option>
                        @foreach ($class as $cla)
                        <option value="{{$cla->class_id}}">{{$cla->class_name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Level Id Field -->
                <div class="form-group col-sm-6">
                    <select name="level_id" id="level_id" class="form-control">
                        <option value="">Select Level</option>
                        {{-- @foreach ($level as $lv)

                        <option value="{{$lv->level_id}}">{{$lv->level}}</option>
                        @endforeach --}}
                    </select>
                </div>

                <!-- Shift Id Field -->
                <div class="form-group col-sm-6">
                    <select name="shift_id" id="shift_id" class="form-control">
                        <option value="">Select Shift</option>
                        @foreach ($shift as $shi)
                        <option value="{{$shi->shift_id}}">{{$shi->shift}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Classroom Id Field -->
                <div class="form-group col-sm-6">
                    <select name="classroom_id" id="classroom_id" class="form-control">
                        <option value="">Select Classroom</option>
                        @foreach ($classroom as $room)
                        <option value="{{$room->classroom_id}}">{{$room->classroom_name}}__{{$room->classroom_code}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Batch Id Field -->
                <div class="form-group col-sm-6">
                    <select name="batch_id" id="batch_id" class="form-control">
                        <option value="">Select Batch</option>
                        @foreach ($batch as $bat)
                        <option value="{{$bat->batch_id}}">{{$bat->year}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Day Id Field -->
                <div class="form-group col-sm-6">
                    <select name="day_id" id="day_id" class="form-control">
                        <option value="">Select Day</option>
                        @foreach ($day as $d)
                        <option value="{{$d->day_id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Time Id Field -->
                <div class="form-group col-sm-6">
                    <select name="time_id" id="time_id" class="form-control">
                        <option value="">Select Time</option>
                        @foreach ($time as $ti)
                        <option value="{{$ti->time_id}}">{{$ti->time}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Semester Id Field -->
                <div class="form-group col-sm-6">
                    <select name="semester_id" id="semester_id" class="form-control">
                        <option value="">Select Semester</option>
                        @foreach ($semester as $sem)
                        <option value="{{$sem->semester_id}}">{{$sem->semester_name}}__{{$sem->semester_code}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('status', 'Status:') !!}
                    <label>
                        {!! Form::hidden('status', 0) !!}
                        {!! Form::checkbox('status', '1', null) !!}
                    </label>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>

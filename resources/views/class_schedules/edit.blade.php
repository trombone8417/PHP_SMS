<!-- Modal -->
<div class="modal fade" id="class_schedules-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Class Schedules Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('classSchedules.update','Scheduleid')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="Scheduleid" id="Scheduleid">
                    <!-- Start Date Field -->
                    <div class="form-group col-sm-6">
                        <label>Start Date</label>
                        <input type="text" name="start_date" id="start_date1" class="form-control" autocomplete="off" placeholder="請按這裡">
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
                        <input type="text" name="end_date" id="end_date1" class="form-control" autocomplete="off" placeholder="請按這裡">
                    </div>

                    @push('scripts')
                    <script type="text/javascript">
                        $('#end_date1').datetimepicker({
                            format: 'YYYY-MM-DD',
                            useCurrent: false
                        })
                        $('#course_id1').on('change', function(e) {
                            console.log(e)
                            var course_id1 = e.target.value;
                            console.log(course_id1);
                            $('#level_id1').empty();
                            $.get('dynamicLevel?course_id=' + course_id1, function(data) {
                                console.log(data);
                                $.each(data, function(index, lev) {
                                    $('#level_id1').append('<option value="' + lev.level_id + '">' +
                                        lev.level + '</option>');
                                });
                            });
                        });
                        $(document).on('click', '#Edit', function(data) {
                            var Scheduleid = $(this).data('id');

                            $.get("{{route('edit')}}", {
                                Scheduleid: Scheduleid
                            }, function(data) {
                                $("#class_id1").val(data.class_id);
                                $("#course_id1").val(data.course_id);
                                $("#shift_id1").val(data.shift_id);
                                $("#time_id1").val(data.time_id);
                                $("#classroom_id1").val(data.classroom_id);
                                $("#batch_id1").val(data.batch_id);
                                $("#semester_id1").val(data.semester_id);
                                $("#start_date1").val(data.start_date);
                                $("#end_date1").val(data.end_date);
                                $("#Scheduleid").val(Scheduleid);
                                $("#day_id1").val(data.day_id);
                                //$("#status1").val(data.status);
                                if (data.status==1) {

                                    $('.status1').prop('checked',true);
                                }else{
                                    $('.status1').prop('checked',false);
                                }
                                $("#level_id1").val(data.level_id);

                                // Jquery execute onchange event on onload
                                $("select#course_id1").change();
                            });


                        })
                        $('#class_schedules-view-modal').on('show.bs.modal', function(event) {
                            var button = $(event.relatedTarget)
                            var class_id = button.data('class_id')
                            var course_id = button.data('course_id')
                            var shift_id = button.data('shift_id')
                            var time_id = button.data('time_id')

                            var classroom_id = button.data('classroom_id')
                            var batch_id = button.data('batch_id')
                            var semester_id = button.data('semester_id')
                            var start_date = button.data('start_date')
                            var end_date = button.data('end_date')
                            var day_id = button.data('day_id')
                            var status = button.data('status')
                            var level_id = button.data('level_id')
                            var Scheduleid = button.data('Scheduleid')
                            console.log("end_date"+end_date)

                            var modal = $(this)

                            modal.find('.modal-title').text('VIEW semester INFORMATION');
                            modal.find('.modal-body #class_id2').val(class_id);
                            modal.find('.modal-body #course_id2').val(course_id);
                            modal.find('.modal-body #shift_id2').val(shift_id);
                            modal.find('.modal-body #time_id2').val(time_id);
                            modal.find('.modal-body #classroom_id2').val(classroom_id);
                            modal.find('.modal-body #batch_id2').val(batch_id);
                            modal.find('.modal-body #semester_id2').val(semester_id);
                            modal.find('.modal-body #start_date2').val(start_date);
                            modal.find('.modal-body #end_date2').val(end_date);
                            modal.find('.modal-body #day_id2').val(day_id);
                                if (status==1) {
                                    modal.find('.modal-body #status2').prop('checked',true);
                                }else
                                {
                                    modal.find('.modal-body #status2').prop('checked',false);
                                }
                            modal.find('.modal-body #level_id2').val(level_id);
                            modal.find('.modal-body #Scheduleid2').val(Scheduleid);
                        });

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
                        <select name="class_id" id="class_id1" class="form-control">
                            <option value="">Select Class</option>
                            @foreach ($class as $cla)
                            <option value="{{$cla->class_id}}">{{$cla->class_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Level Id Field -->
                    <div class="form-group col-sm-6">
                        <select name="level_id" id="level_id1" class="form-control">
                            <option value="">Select Level</option>
                            {{-- @foreach ($level as $lv)

                        <option value="{{$lv->level_id}}">{{$lv->level}}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <!-- Shift Id Field -->
                    <div class="form-group col-sm-6">
                        <select name="shift_id" id="shift_id1" class="form-control">
                            <option value="">Select Shift</option>
                            @foreach ($shift as $shi)
                            <option value="{{$shi->shift_id}}">{{$shi->shift}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Classroom Id Field -->
                    <div class="form-group col-sm-6">
                        <select name="classroom_id" id="classroom_id1" class="form-control">
                            <option value="">Select Classroom</option>
                            @foreach ($classroom as $room)
                            <option value="{{$room->classroom_id}}">{{$room->classroom_name}}__{{$room->classroom_code}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Batch Id Field -->
                    <div class="form-group col-sm-6">
                        <select name="batch_id" id="batch_id1" class="form-control">
                            <option value="">Select Year</option>
                            @foreach ($batch as $bat)
                            <option value="{{$bat->batch_id}}">{{$bat->year}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Day Id Field -->
                    <div class="form-group col-sm-6">
                        <select name="day_id" id="day_id1" class="form-control">
                            <option value="">Select Day</option>
                            @foreach ($day as $d)
                            <option value="{{$d->day_id}}">{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Time Id Field -->
                    <div class="form-group col-sm-6">
                        <select name="time_id" id="time_id1" class="form-control">
                            <option value="">Select Time</option>
                            @foreach ($time as $ti)
                            <option value="{{$ti->time_id}}">{{$ti->time}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Semester Id Field -->
                    <div class="form-group col-sm-6">
                        <select name="semester_id" id="semester_id1" class="form-control">
                            <option value="">Select Semester</option>
                            @foreach ($semester as $sem)
                            <option value="{{$sem->semester_id}}">{{$sem->semester_name}}__{{$sem->semester_code}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>status</label>
                        <input type="hidden" name="status" class="status1" value="0">
                        <input type="checkbox" name="status" class="status1" id="status1" value="1"/>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>

        </div>
    </div>
</div>
</form>
@include('class_schedules.show_fields')

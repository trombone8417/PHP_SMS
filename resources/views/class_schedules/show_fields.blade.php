<!-- Modal -->
<div class="modal fade" id="class_schedules-view-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Class Schedules View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="Scheduleid" id="Scheduleid">
                <!-- Start Date Field -->
                <div class="form-group col-sm-6">
                    <label>Start Date</label>
                    <input type="text" name="start_date" id="start_date2" class="form-control"  disabled>
                </div>


                <!-- End Date Field -->
                <div class="form-group col-sm-6">
                    <label>End Date</label>
                    <input type="text" name="end_date" id="end_date2" class="form-control"  disabled>
                </div>
                <!-- Course Id Field -->
                <div class="form-group col-sm-6">
                    <label>Course</label>
                    <input type="text" name="course_id" id="course_id2" class="form-control" disabled>
                </div>

                <!-- Class Id Field -->
                <div class="form-group col-sm-6">
                    <label>Class</label>
                    <input type="text" type="text" name="class_id" id="class_id2" class="form-control" disabled>
                </div>

                <!-- Level Id Field -->
                <div class="form-group col-sm-6">
                    <label>Level</label>
                    <input type="text" name="level_id" id="level_id2" class="form-control" disabled>
                </div>

                <!-- Shift Id Field -->
                <div class="form-group col-sm-6">
                    <label>Shift</label>
                    <input type="text" name="shift_id" id="shift_id2" class="form-control" disabled>
                </div>

                <!-- Classroom Id Field -->
                <div class="form-group col-sm-6">
                    <label>Classroom</label>
                    <input type="text" name="classroom_id" id="classroom_id2" class="form-control" disabled>
                </div>

                <!-- Batch Id Field -->
                <div class="form-group col-sm-6">
                    <label>Year</label>
                    <input type="text" name="batch_id" id="batch_id2" class="form-control" disabled>
                </div>

                <!-- Day Id Field -->
                <div class="form-group col-sm-6">
                    <label>Day</label>
                    <input type="text" name="day_id" id="day_id2" class="form-control" disabled>
                </div>

                <!-- Time Id Field -->
                <div class="form-group col-sm-6">
                    <label>Time</label>
                    <input type="text" name="time_id" id="time_id2" class="form-control" disabled>
                </div>

                <!-- Semester Id Field -->
                <div class="form-group col-sm-6">
                    <label>Semester</label>
                    <input type="text" name="semester_id" id="semester_id2" class="form-control" disabled>
                </div>

                <div class="form-group col-sm-6">
                    <label>status</label>
                    <input type="hidden" name="status" value="0"  disabled>
                    <input type="checkbox" name="status" id="status2" value="1"  disabled/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-sm" data-dismiss="modal">close</button>
            </div>

        </div>
    </div>
</div>

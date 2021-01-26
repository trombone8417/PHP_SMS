<!-- Modal -->
<div class="modal fade" id="semester-add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-sm-6">
                    {!! Form::label('semester_name', 'Semester Name:') !!}
                    {!! Form::text('semester_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Semester Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('semester_code', 'Semester Code:') !!}
                    {!! Form::text('semester_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Semester Duration Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('semester_duration', 'Semester Duration:') !!}
                    {!! Form::text('semester_duration', null, ['class' => 'form-control','maxlength' => 255,'maxlength'
                    => 255]) !!}
                </div>

                <!-- Semester Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('semester_description', 'Semester Description:') !!}
                    {!! Form::textarea('semester_description', null, ['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="fields-add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Faculty Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_name', 'Faculty Name:') !!}
                    {!! Form::text('faculty_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Faculty Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_code', 'Faculty Code:') !!}
                    {!! Form::text('faculty_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Faculty Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('faculty_description', 'Faculty Description:') !!}
                    {!! Form::textarea('faculty_description', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Faculty Status Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_status', 'Faculty Status:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('faculty_status', 0) !!}
                        {!! Form::checkbox('faculty_status', '1', null) !!}
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

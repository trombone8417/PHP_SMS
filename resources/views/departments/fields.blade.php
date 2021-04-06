<!-- Modal -->
<div class="modal fade" id="departments-add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Faculty Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_id', 'Faculty Id:') !!}
                    <select name="faculty_id" id="faculty_id" class="form-control">
                        <option value="0" selected="true" disabled="true">Choose Faculty</option>
                        @foreach ($faculties as $key=>$faculty)
                        <option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Department Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('department_name', 'Department Name:') !!}
                    {!! Form::text('department_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Department Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('department_code', 'Department Code:') !!}
                    {!! Form::number('department_code', null, ['class' => 'form-control']) !!}
                </div>


                <!-- Department Description Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('department_description', 'Department Description:') !!}
                    {!! Form::textarea('department_description', null, ['class' => 'form-control','cols'=>40,'rows'=>2])
                    !!}
                </div>
                <!-- Department Status Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('department_status', 'Department Status:') !!}
                    <label>
                        {!! Form::hidden('department_status', 0) !!}
                        {!! Form::checkbox('department_status', '1', null) !!}
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

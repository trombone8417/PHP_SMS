{{-- modal 彈出視窗 header(頭) --}}
<div class="modal fade" id="classroom-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Classroom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal 彈出視窗 header(尾) --}}
                <!-- Classroom Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('classroom_name', 'Classroom Name:') !!}
                    {!! Form::text('classroom_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Classroom Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('classroom_code', 'Classroom Code:') !!}
                    {!! Form::number('classroom_code', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Classroom Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('classroom_description', 'Classroom Description:') !!}
                    {!! Form::textarea('classroom_description', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Classroom Status Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('classroom_status', 'Classroom Status:') !!}
                    <label>
                        {!! Form::hidden('classroom_status', 0) !!}
                        {!! Form::checkbox('classroom_status', '1', null) !!}
                    </label>
                </div>


                <!-- Submit Field -->
                <div class="form-group col-sm-12">


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
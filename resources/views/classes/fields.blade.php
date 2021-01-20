{{-- modal 彈出視窗 header(頭) --}}
<div class="modal fade" id="class-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal 彈出視窗 header(尾) --}}
                <!-- Class Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('class_name', 'Class Name:') !!}
                    {!! Form::text('class_name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' =>
                    255]) !!}
                </div>

                <!-- Class Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('class_code', 'Class Code:') !!}
                    {!! Form::text('class_code', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' =>
                    255]) !!}
                </div>

                {{-- modal 彈出視窗 footer(頭) --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <!-- Submit Field -->
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{{-- modal 彈出視窗 footer(尾) --}}

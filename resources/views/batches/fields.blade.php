{{-- modal 彈出視窗 header(前) --}}
<div class="modal fade" id="batch-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <!-- Batch Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('year', 'Batch Year:') !!}
                    {!! Form::text('year', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255])
                    !!}
                </div>

                {{-- modal 彈出視窗 footer(前) --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <!-- Submit Field -->
                {!! Form::submit('Create Batch', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{{-- modal 彈出視窗 footer(尾) --}}

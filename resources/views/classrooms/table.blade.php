<div class="table-responsive">
    <table class="table" id="classrooms-table">
        <thead>
            <tr>
                <th>Classroom Name</th>
                <th>Classroom Code</th>
                <th>Classroom Description</th>
                <th>Classroom Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classrooms as $classroom)
            <tr>
                <td>{{ $classroom->classroom_name }}</td>
                <td>{{ $classroom->classroom_code }}</td>
                <td>{{ $classroom->classroom_description }}</td>
                <td>
                    @if ($classroom->classroom_status == 1)
                    <i class="fa fa-check-square-o"></i>
                    @else
                    <i class="fa fa-square-o"></i>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['classrooms.destroy', $classroom->classroom_id], 'method' => 'delete'])
                    !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#classroom-view-modal"
                            data-classroom_status="{{ $classroom->classroom_status }}"
                            data-classroom_code="{{ $classroom->classroom_code }}"
                            data-classroom_description="{{ $classroom->classroom_description }}"
                            data-classroom_name="{{ $classroom->classroom_name }}"
                            data-created_at="{{ $classroom->created_at }}"
                            data-updated_at="{{ $classroom->updated_at }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('classrooms.edit', [$classroom->classroom_id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- modal 彈出視窗 header(頭) --}}
<div class="modal fade" id="classroom-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input type="hidden" name="classroom_id" id="classroom_id">
                <div class="form-group">
                    {!! Form::label('classroom_name', 'Classroom Name:') !!}
                    <input type="text" name="classroom_name" id="classroom_name" disabled="disabled">
                </div>

                <!-- Classroom Code Field -->
                <div class="form-group">
                    {!! Form::label('classroom_code', 'Classroom Code:') !!}
                    <input type="text" name="classroom_code" id="classroom_code" disabled="disabled">
                </div>

                <!-- Classroom Description Field -->
                <div class="form-group">
                    {!! Form::label('classroom_description', 'Classroom Description:') !!}
                    <input type="text" name="classroom_description" id="classroom_description" disabled="disabled">
                </div>

                <!-- Classroom Status Field -->
                <div class="form-group">
                    {!! Form::label('classroom_status', 'Classroom Status:') !!}
                    <input type="text" name="classroom_status" id="classroom_status" disabled="disabled">
                </div>
                <div class="form-group">
                    {!! Form::label('created_at', 'Created At:') !!}
                    <input type="text" name="created_at" id="created_at" disabled="disabled">
                </div>
                <div class="form-group">
                    {!! Form::label('updated_at', 'Updated At:') !!}
                    <input type="text" name="updated_at" id="updated_at" disabled="disabled">
                </div>

                {{-- modal 彈出視窗 footer(頭) --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- modal 彈出視窗 footer(尾) --}}
@push('scripts')
<script type="text/javascript">
    $('#classroom-view-modal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var classroom_name = button.data('classroom_name')
            var classroom_code = button.data('classroom_code')
            var classroom_description = button.data('classroom_description')
            var classroom_status = button.data('classroom_status')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var classroom_id = button.data('classroom_id')

            var modal = $(this)

            modal.find('.modal-title').text('VIEW CLASSROOM INFORMATION');
            modal.find('.modal-body #classroom_name').val(classroom_name);
            modal.find('.modal-body #classroom_code').val(classroom_code);
            modal.find('.modal-body #classroom_description').val(classroom_description);
            modal.find('.modal-body #classroom_status').val(classroom_status);
            modal.find('.modal-body #created_at').val(created_at);
            modal.find('.modal-body #updated_at').val(updated_at);
            modal.find('.modal-body #classroom_id').val(classroom_id);
        });

</script>
@endpush
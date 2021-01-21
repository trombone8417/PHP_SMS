<div class="table-responsive">
    <table class="table" id="levels-table">
        <thead>
            <tr>
                <th>Level</th>
                <th>Course Id</th>
                <th>Level Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($levels as $level)
            <tr>
                <td>{{ $level->level }}</td>
                <td>{{ $level->course_id }}</td>
                <td>{{ $level->level_description }}</td>
                <td>
                    {!! Form::open(['route' => ['levels.destroy', $level->level_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#level-view-modal" data-level="{{ $level->level }}"
                            data-course_id="{{ $level->course_id }}"
                            data-level_description="{{ $level->level_description }}"
                            data-created_at="{{ $level->created_at }}" data-updated_at="{{ $level->updated_at }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('levels.edit', [$level->level_id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
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
<div class="modal fade" id="level-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal 彈出視窗 header(尾) --}}
                <!-- Batch Field -->
                <input type="hidden" name="level_id" id="level_id">
                <div class="form-group">
                    {!! Form::label('level', 'Level:') !!}
                    <input type="text" name="level" id="level" disabled="disabled">
                </div>
                <div class="form-group">
                    {!! Form::label('course_id', 'Course ID:') !!}
                    <input type="text" name="course_id" id="course_id" disabled="disabled">
                </div>
                <div class="form-group">
                    {!! Form::label('level_description', 'Level Description:') !!}
                    <input type="text" name="level_description" id="level_description" disabled="disabled">
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
    $('#level-view-modal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var level = button.data('level')
            var course_id = button.data('course_id')
            var level_description = button.data('level_description')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var level_id = button.data('level_id')

            var modal = $(this)

            modal.find('.modal-title').text('VIEW LEVEL INFORMATION');
            modal.find('.modal-body #level').val(level);
            modal.find('.modal-body #course_id').val(course_id);
            modal.find('.modal-body #level_description').val(level_description);
            modal.find('.modal-body #created_at').val(created_at);
            modal.find('.modal-body #updated_at').val(updated_at);
            modal.find('.modal-body #level_id').val(level_id);
        });

</script>
@endpush

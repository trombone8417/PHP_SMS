<div class="table-responsive">
    <table class="table" id="days-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($days as $day)
            <tr>
                <td>{{ $day->name }}</td>
                <td>
                    {!! Form::open(['route' => ['days.destroy', $day->day_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal"
                            data-target="#day-view-modal"
                            data-name="{{ $day->name }}"
                            data-created_at="{{ $day->created_at }}"
                            data-updated_at="{{ $day->updated_at }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('days.edit', [$day->day_id]) }}" class='btn btn-default btn-xs'><i
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
<div class="modal fade" id="day-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input type="hidden" name="day_id" id="day_id">
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    <input type="text" name="name" id="name" disabled="disabled">
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
    $('#day-view-modal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var name = button.data('name')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var day_id = button.data('day_id')

            var modal = $(this)

            modal.find('.modal-title').text('VIEW BATCH INFORMATION');
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #created_at').val(created_at);
            modal.find('.modal-body #updated_at').val(updated_at);
            modal.find('.modal-body #day_id').val(day_id);
        });

</script>
@endpush

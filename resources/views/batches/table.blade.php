<div class="table-responsive">
    <table class="table" id="batches-table">
        <thead>
            <tr>
                <th>Batch</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($batches as $batch)
                <tr>
                    <td>{{ $batch->year }}</td>
                    <td>
                        {!! Form::open(['route' => ['batches.destroy', $batch->batch_id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a data-toggle="modal" data-target="#batch-view-modal"
                                data-batch_id="{{ $batch->batch_id }}" data-year="{{ $batch->year }}"
                                data-created_at="{{ $batch->created_at }}" data-updated_at="{{ $batch->updated_at }}"
                                class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-eye-open"></i>&nbsp;檢視</a>
                            <a href="{{ route('batches.edit', [$batch->batch_id]) }}" class='btn btn-info btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i>&nbsp;編輯</a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class'
                            => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- modal 彈出視窗 header(頭) --}}
<div class="modal fade" id="batch-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input type="hidden" name="batch_id" id="batch_id">
                <div class="form-group">
                    {!! Form::label('year', 'Batch year:') !!}
                    <input type="text" name="year" id="year_bs" disabled="disabled">
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
                {!! Form::submit('Create Role', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{{-- modal 彈出視窗 footer(尾) --}}
@push('scripts')
    <script type="text/javascript">
        $('#batch-view-modal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var year = button.data('year')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var batch_id = button.data('batch_id')

            var modal = $(this)

            modal.find('.modal-title').text('VIEW BATCH INFORMATION');
            modal.find('.modal-body #year_bs').val(year);
            modal.find('.modal-body #created_at').val(created_at);
            modal.find('.modal-body #updated_at').val(updated_at);
            modal.find('.modal-body #batch_id').val(batch_id);
        });

    </script>
@endpush

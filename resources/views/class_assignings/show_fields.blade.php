<div class="modal fade" id="classschedule-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal 彈出視窗 header(尾) --}}

                <div class="table-responsive">
                    <table class="table" id="classAssignings-table">
                        <thead>
                        </thead>

                        <tr>
                            <input type="hidden" name="" id="show-id">
                            <td><b id="first_name"></b> <b id="last_name"></b></td>
                            <td><b id="semester_name"></b></td>
                            <td><b id="course_name"></b></td>
                            <td>
                                <b id="level"></b> |
                                <b id="time"></b> |
                                <b id="name"></b> |
                                <b id="class_name"></b> |
                                <b id="shift"></b> |
                                <b id="batch"></b> |
                                <b id="classroom_name"></b> |
                                <b id="created_at"></b> |
                            </td>
                        </tr>

                    </table>
                </div>


                {{-- modal 彈出視窗 footer(前) --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                {!! Form::submit('Generate Class Assign', array('class' => 'btn btn-success')) !!}
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).on('click','.show-modal',function () {
        $('.modal-title').text('Contact Details');
        $('.form-horizontal').show();
        $('#show-id').text($(this).data('id'));
        $('#first_name').text($(this).data('fname'));
        $('#last_name').text($(this).data('lname'));
        $('#course_name').text($(this).data('course_name'));
        $('#semester_name').text($(this).data('semester_name'));
        $('#level').text($(this).data('level'));
        $('#classroom_name').text($(this).data('classroom_name'));
        $('#class_name').text($(this).data('class_name'));
        $('#batch').text($(this).data('batch'));
        $('#shift').text($(this).data('shift'));
        $('#time').text($(this).data('time'));
        $('#name').text($(this).data('name'));
        $('#class_name').text($(this).data('class_name'));
        $('#created_at').text($(this).data('created_at'));
        $('#classschedule-details').modal('show');
    })
</script>
@endpush


<div class="input-group col-md-12 input_files_warp">
    <input type="hidden" name="class_assign_id" id="">
    <select name="teacher_id" id="teacher_id" class="form-control" style="width: 50%; margin-top: 10px; float: right;">
        <option value="0" selected="true" disabled="true">Select Teacher</option>
        @foreach ($teacher as $teach)
        <option value="{{$teach->teacher_id}}">
            {{$teach->first_name}}
            {{$teach->last_name}}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('week') ? 'has-error' : ''}}">
    <label for="week" class="control-label">{{ 'Week' }}</label>
    <input class="form-control" name="week" type="text" id="week" value="{{ isset($pc_point->week) ? $pc_point->week : ''}}" >
    {!! $errors->first('week', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pc_point') ? 'has-error' : ''}}">
    <label for="pc_point" class="control-label">{{ 'Pc Point' }}</label>
    <input class="form-control" name="pc_point" type="number" id="pc_point" value="{{ isset($pc_point->pc_point) ? $pc_point->pc_point : ''}}" >
    {!! $errors->first('pc_point', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('new_code') ? 'has-error' : ''}}">
    <label for="new_code" class="control-label">{{ 'New Code' }}</label>
    <input class="form-control" name="new_code" type="number" id="new_code" value="{{ isset($pc_point->new_code) ? $pc_point->new_code : ''}}" >
    {!! $errors->first('new_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($pc_point->user_id) ? $pc_point->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($pc_point->group_id) ? $pc_point->group_id : ''}}" >
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

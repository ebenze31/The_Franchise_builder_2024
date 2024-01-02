<div class="form-group {{ $errors->has('id_Activities') ? 'has-error' : ''}}">
    <label for="id_Activities" class="control-label">{{ 'Id Activities' }}</label>
    <input class="form-control" name="id_Activities" type="text" id="id_Activities" value="{{ isset($activities_log->id_Activities) ? $activities_log->id_Activities : ''}}" >
    {!! $errors->first('id_Activities', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($activities_log->user_id) ? $activities_log->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

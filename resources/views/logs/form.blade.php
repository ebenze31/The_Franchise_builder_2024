<div class="form-group {{ $errors->has('log_content') ? 'has-error' : ''}}">
    <label for="log_content" class="control-label">{{ 'Log Content' }}</label>
    <input class="form-control" name="log_content" type="text" id="log_content" value="{{ isset($log->log_content) ? $log->log_content : ''}}" >
    {!! $errors->first('log_content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($log->user_id) ? $log->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <input class="form-control" name="role" type="text" id="role" value="{{ isset($log->role) ? $log->role : ''}}" >
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

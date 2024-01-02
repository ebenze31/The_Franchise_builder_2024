<div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    <label for="question" class="control-label">{{ 'Question' }}</label>
    <input class="form-control" name="question" type="text" id="question" value="{{ isset($contact_staff->question) ? $contact_staff->question : ''}}" >
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('reading') ? 'has-error' : ''}}">
    <label for="reading" class="control-label">{{ 'Reading' }}</label>
    <input class="form-control" name="reading" type="text" id="reading" value="{{ isset($contact_staff->reading) ? $contact_staff->reading : ''}}" >
    {!! $errors->first('reading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($contact_staff->user_id) ? $contact_staff->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ isset($contact_staff->staff_id) ? $contact_staff->staff_id : ''}}" >
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

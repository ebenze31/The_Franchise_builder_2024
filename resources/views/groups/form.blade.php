<div class="form-group {{ $errors->has('name_group') ? 'has-error' : ''}}">
    <label for="name_group" class="control-label">{{ 'Name Group' }}</label>
    <input class="form-control" name="name_group" type="text" id="name_group" value="{{ isset($group->name_group) ? $group->name_group : ''}}" >
    {!! $errors->first('name_group', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('member') ? 'has-error' : ''}}">
    <label for="member" class="control-label">{{ 'Member' }}</label>
    <input class="form-control" name="member" type="text" id="member" value="{{ isset($group->member) ? $group->member : ''}}" >
    {!! $errors->first('member', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('host') ? 'has-error' : ''}}">
    <label for="host" class="control-label">{{ 'Host' }}</label>
    <input class="form-control" name="host" type="text" id="host" value="{{ isset($group->host) ? $group->host : ''}}" >
    {!! $errors->first('host', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <input class="form-control" name="logo" type="file" id="logo" value="{{ isset($group->logo) ? $group->logo : ''}}" >
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group_line_id') ? 'has-error' : ''}}">
    <label for="group_line_id" class="control-label">{{ 'Group Line Id' }}</label>
    <input class="form-control" name="group_line_id" type="text" id="group_line_id" value="{{ isset($group->group_line_id) ? $group->group_line_id : ''}}" >
    {!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key_invite') ? 'has-error' : ''}}">
    <label for="key_invite" class="control-label">{{ 'Key Invite' }}</label>
    <input class="form-control" name="key_invite" type="text" id="key_invite" value="{{ isset($group->key_invite) ? $group->key_invite : ''}}" >
    {!! $errors->first('key_invite', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($group->status) ? $group->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rank_last_week') ? 'has-error' : ''}}">
    <label for="rank_last_week" class="control-label">{{ 'Rank Last Week' }}</label>
    <input class="form-control" name="rank_last_week" type="text" id="rank_last_week" value="{{ isset($group->rank_last_week) ? $group->rank_last_week : ''}}" >
    {!! $errors->first('rank_last_week', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('request_join') ? 'has-error' : ''}}">
    <label for="request_join" class="control-label">{{ 'Request Join' }}</label>
    <input class="form-control" name="request_join" type="text" id="request_join" value="{{ isset($group->request_join) ? $group->request_join : ''}}" >
    {!! $errors->first('request_join', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

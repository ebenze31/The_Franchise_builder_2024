<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($cancel_player->user_id) ? $cancel_player->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('shirt_size') ? 'has-error' : ''}}">
    <label for="shirt_size" class="control-label">{{ 'Shirt Size' }}</label>
    <input class="form-control" name="shirt_size" type="text" id="shirt_size" value="{{ isset($cancel_player->shirt_size) ? $cancel_player->shirt_size : ''}}" >
    {!! $errors->first('shirt_size', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_get_shirt') ? 'has-error' : ''}}">
    <label for="time_get_shirt" class="control-label">{{ 'Time Get Shirt' }}</label>
    <input class="form-control" name="time_get_shirt" type="datetime-local" id="time_get_shirt" value="{{ isset($cancel_player->time_get_shirt) ? $cancel_player->time_get_shirt : ''}}" >
    {!! $errors->first('time_get_shirt', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_joined') ? 'has-error' : ''}}">
    <label for="time_joined" class="control-label">{{ 'Time Joined' }}</label>
    <input class="form-control" name="time_joined" type="datetime-local" id="time_joined" value="{{ isset($cancel_player->time_joined) ? $cancel_player->time_joined : ''}}" >
    {!! $errors->first('time_joined', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('return_shirt') ? 'has-error' : ''}}">
    <label for="return_shirt" class="control-label">{{ 'Return Shirt' }}</label>
    <input class="form-control" name="return_shirt" type="text" id="return_shirt" value="{{ isset($cancel_player->return_shirt) ? $cancel_player->return_shirt : ''}}" >
    {!! $errors->first('return_shirt', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

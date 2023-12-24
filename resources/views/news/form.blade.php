<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <input class="form-control" name="detail" type="text" id="detail" value="{{ isset($news->detail) ? $news->detail : ''}}" >
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_content') ? 'has-error' : ''}}">
    <label for="photo_content" class="control-label">{{ 'Photo Content' }}</label>
    <input class="form-control" name="photo_content" type="file" id="photo_content" value="{{ isset($news->photo_content) ? $news->photo_content : ''}}" >
    {!! $errors->first('photo_content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_cover') ? 'has-error' : ''}}">
    <label for="photo_cover" class="control-label">{{ 'Photo Cover' }}</label>
    <input class="form-control" name="photo_cover" type="file" id="photo_cover" value="{{ isset($news->photo_cover) ? $news->photo_cover : ''}}" >
    {!! $errors->first('photo_cover', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($news->link) ? $news->link : ''}}" >
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ Auth::user()->id}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<div class="form-group">
  <label for="name">Name: </label>
  <input class="form-control" type="text" name="name" value="{{ @$jobType->name }}">
</div>
<div class="form-group">
  <label for="desc">Description: </label>
  <textarea class="form-control" type="text" name="desc">{{ @$jobType->desc }}</textarea>
</div>
<div class="form-group">
  <label for="status">Status: </label>
  <input class="form-control" type="text" name="status" value="{{ @$jobType->status }}">
</div>
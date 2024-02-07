<div class="form-group">
  <label for="job_type_id">Type: </label>
  <select name="job_type_id" class="form-control">
    <option disabled {{ @$job->job_type_id ? '' : 'selected' }}>Please select this.</option>
    @foreach ($types as $id => $type)
      <option value="{{$id}}" {{ @$job->job_type_id == $id ? 'selected' : '' }}>
        {{$type}}
      </option> 
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="name">Name: </label>
  <input class="form-control" type="text" name="name" value="{{ @$job->name }}">
</div>
<div class="form-group">
  <label for="status">Status: </label>
  <select name="status" class="form-control">
    <option value="active" {{ @$job->status =='active' ? 'selected' : '' }}>Active</option>
    <option value="nonactive" {{ @$job->status =='nonactive' ? 'selected' : '' }}>Non Active</option>
  </select>
</div>
<div class="form-group">
  <label for="desc">Description: </label>
  <textarea class="form-control" type="text" name="desc">{{ @$job->desc }}</textarea>
</div>
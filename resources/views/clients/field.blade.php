<div class="form-group">
  <label for="name">Name: </label>
  <input class="form-control" type="text" name="name" value="{{ @$client->name }}">
</div>
<div class="form-group">
  <label for="email">Email: </label>
  <input class="form-control" type="email" name="email" value="{{ @$client->email }}">
</div>
<div class="form-group">
  <label for="phone">Phone: </label>
  <input class="form-control" type="text" name="phone" value="{{ @$client->phone }}">
</div>
<div class="form-group">
  <label for="address">Address: </label>
  <textarea class="form-control" type="text" name="address">{{ @$client->address }}</textarea>
</div>
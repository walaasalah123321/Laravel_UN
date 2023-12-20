<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    @include("include.nav")
<div class="container">
  <h2>Add new car data</h2>
  <form action="{{route('updataCar')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT");

    <div class="form-group">
      <label for="title">Title:</label>
      <input type="hidden" name="id" value="{{$field->id}}">
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$field->title}}">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea class="form-control" name="description" id="" cols="60" rows="3">{{$field->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
      
      @error('image')
        {{ $message }}
      @enderror
      <br>
      <img src="{{ asset('assets/images/'.$field->image)}}" alt="car" style="width:200px;">
    
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($field->published) > Published me</label>
    </div>
    <button type="submit" class="btn btn-default">updata</button>
  </form>
</div>



</body>
</html>
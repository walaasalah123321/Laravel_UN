
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
{{--   
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <h3 style="background-color: red"> {{$error}}</h3>
    @endforeach
    @endif --}}
  <h2>Add new Post </h2>
  <form action="{{route('Post.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control"  id="title" placeholder="Enter title" name="title" value="{{old('title')}}">
    </div>
    @error("title")
      <h4 style="color: red">* title is required</h4>
    @enderror
  
    <div class="form-group">
        <label for="author">author:</label>
        <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" value="{{old('author')}}">
    </div>
    @error("author")
    <h4 style="color: red">* Auther is required</h4>
  @enderror
    <div class="form-group">
      <label for="description">description:</label>
      <textarea class="form-control" name="description" id="" cols="60" rows="3">{{old('description')}}</textarea>
    </div>
    @error("description")
    <h4 style="color: red">* description is required</h4>
  @enderror
    <div class="checkbox">
      <label><input type="checkbox" name="published"> Published me</label>
    </div>
    <button type="submit" class="btn btn-default">Insert</button>
  </form>
</div>

</body>
</html>
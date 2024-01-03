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
  {{-- @if($errors->any())
  @foreach ( $errors->all(); as $error)
    <h3 style="background-color:red"> {{ $error }}</h3>
  @endforeach
  @endif --}}

  <h2>Add new car data</h2>
  <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{old('title')}}">
    </div>
    @error("title")
    <h4 style="color: red">{{$message}}</h4>
    @enderror
    <div class="form-group">
      <label for="description">description:</label>
      <textarea class="form-control" name="description" id="" cols="60" rows="3">{{old('description')}}</textarea>
    </div>
    @error("description")
    <h4 style="color: red">{{$message}}</h4>
    @enderror
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
      @error('image')
        {{ $message }}
      @enderror
    </div>
    <div class="form-group">
      <label for="image">category name:</label>
    <select name="Category_id" id="" >
        <option value="">Select Category</option>
        @foreach ($allcategory as $category)
        <option value="{{$category->id}}"  @selected($category->id == old('Category_id'))>{{$category->cat_name}}</option>

        @endforeach
    </select>  
    @error('Category_id')
    {{ $message }}
    @enderror
    </div> 
    
    <div class="checkbox">
      <label><input type="checkbox" name="published"  @checked(old('published'))> Published me</label>
    </div>
    <button type="submit" class="btn btn-default">Insert</button>
  </form>
</div>

</body>
</html>
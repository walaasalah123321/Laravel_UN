<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include("include.nav")

<div class="container">
  <h2>Trashed Car</h2>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p>             --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Published</th>
        <td>Delete</td>
        <td>Restore</td>

      </tr>
    </thead>
    <tbody>
        @foreach ( $trashedCar as   $trashedCar)
            <tr>
            <td>{{$trashedCar->title}}</td>
            <td>{{$trashedCar->description}}</td>
            
            <td>{{ ($trashedCar->published)?"YES":"NO"}}</td>
            {{-- <td>
                @if($trashedCar->published)
                {{"YES"}}
                @else {{"NO"}}
                @endif
                </td> --}}
            <td><a  href="{{route('forceDelet',[$trashedCar->id])}}" data-confirm-delete="true" >Force Delete</a></td>
            <td><a  href="{{route('RestoreCar',[$trashedCar->id])}}" >Restore</a></td>

          
          </tr> 
        @endforeach
      
      
    </tbody>
  </table>
</div>

</body>
</html>

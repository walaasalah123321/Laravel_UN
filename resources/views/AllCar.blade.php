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
  <h2>Car List</h2>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p>             --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Published</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $allcar as   $allcar)
            <tr>
            <td>{{$allcar->title}}</td>
            <td>{{$allcar->description}}</td>
            
            <td>{{ ($allcar->published)?"YES":"NO"}}</td>
            {{-- <td>
                @if($allcar->published)
                {{"YES"}}
                @else {{"NO"}}
                @endif
                </td> --}}
          </tr> 
        @endforeach
      
      
    </tbody>
  </table>
</div>

</body>
</html>

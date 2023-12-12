<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('allCar')}}">Home</a></li>
        <li><a href="{{route('addcar')}}">insert car</a></li>
        <li><a href="{{route('Post.add')}}">insert Post</a></li>
        <li><a href="{{route('Post.AllPost')}}">all Posts</a></li>
      </ul>
    </div>
    @include('sweetalert::alert')

  </nav>
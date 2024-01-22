<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>

      <ul class="nav navbar-nav">
        <li  class="{{request()->routeIS('allCar')?'active':''}}"><a href="{{route('allCar')}}">Home</a></li>
        <li  class="{{request()->routeIS('addcar')?'active':''}}"><a href="{{route('addcar')}}">insert car</a></li>
        <li class="{{request()->routeIS('Post.add')?'active':''}}"><a href="{{route('Post.add')}}">insert Post</a></li>
        <li class="{{request()->routeIS('Post.AllPost')?'active':''}}"><a href="{{route('Post.AllPost')}}">all Posts</a></li>
        <li class="{{request()->routeIS('trashed')?'active':''}}"><a href="{{route('trashed')}}">trashedCar</a></li>
        <li class="{{request()->routeIS('Post.trashed')?'active':''}}"><a href="{{route('Post.trashed')}}">trashedPost</a></li>
        
              <li >
                  <a rel="alternate" href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
              </li>
              <li >
                <a rel="alternate" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">عربي</a>
            </li>
      

      </ul>
    </div>
    @include('sweetalert::alert')

  </nav>
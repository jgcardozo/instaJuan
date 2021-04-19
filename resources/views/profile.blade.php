
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profiles </title>



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  
    </head>
    <body >
        <div class="container">
            <div class="row">
                <div class="col-12 my-3 pt-3 shadow">

                  

                        <img src="{{$user->image->url}}" class="float-left rounded-circle mr-2">
                        <h1 >{{$user->name}}</h1>
                        <h3 >{{$user->email}}</h3>
                 



                    <p>
                        <b>Instagram</b> {{$user->profile->instragram}}<br>
                 
                        <b>Github</b> {{$user->profile->github}}<br>
                  
                        <b>Web</b> {{$user->profile->web}}<br>
                    </p>


                    <p>
                        <b>País</b> {{$user->location->country}}<br>
                        <b>Nivel</b>@if($user->level)  
                                        <a class="badge bg-primary" href="{{ route('level', $user->level->id) }}">
                                            {{$user->level->name}} 
                                        </a> 
                                    @else - - - @endif<br>
                    </p>

                    <hr>


                    <p>
                        <b>Grupos</b>
                        @forelse ($user->groups as $g)
                        <span class="badge bg-primary">{{$g->name}}</span>
                        @empty
                            <em>No tiene grupo</em>
                        @endforelse
                   
                    </p>

                    <hr>


                    <h3>Posts</h3>
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-6">
                            <div class="card mb-3">

                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $post->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->name}}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{$post->category->name}}
                                                {{$post->comments_count}}
                                                {{Str::plural('comentario', $post->comments_count)}}
                                            </h6>
                                        </div>
                                    </div>     
                                </div>    

                            </div>
                        </div>

                        @endforeach
                    </div>


                    <h3>Videos</h3>
                    <div class="row">
                        @foreach($videos as $viddeo)
                        <div class="col-6">
                            <div class="card mb-3">

                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $viddeo->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$viddeo->name}}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{$viddeo->category->name}}
                                                {{$viddeo->comments_count}}
                                                {{Str::plural('comentario', $viddeo->comments_count)}}
                                            </h6>
                                        </div>
                                    </div>     
                                </div>    

                            </div>
                        </div>

                        @endforeach
                    </div>




                </div>
            </div>
        </div>
    </body>
</html>




<div class="col-sm-4">
    <div class="card"> 
        <img class="card-img-top" src="https://picsum.photos/id/237/200/300" alt="Image Title">
        <div class="card-body">
            <h4 class="card-title">{{$profile->name}}</h4>
            <p class="card-text">{{Str::limit($profile->bio,10)}}</p>
            <a href="{{route('profiles.show',$profile)}}" class="btn btn-primary">profile</a>
        </div>
    </div>
</div>
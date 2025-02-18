<div class="col-sm-4">
    <div class="card">
        <img class="card-img-top" src="https://picsum.photos/seed/picsum/200/300" alt="Image Title">
        <div class="card-body">
            <h4 class="card-title">{{ $profile->name }}</h4>
            <p class="card-text">{{ Str::limit($profile->bio, 10) }}</p>
            <a href="{{ route('profiles.show', $profile->id) }}" class="stretched-link"></a>
        </div>
        <div class="card-footer border-top px-3 py-3 bg-light" style="z-index: 9;">
            <form method="post" action="{{ route('profiles.destroy', $profile->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary">edit</a>
            <form method="get" action="{{ route('profiles.edit', $profile->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">modefier</button>
            </form>
        </div>
    </div>
</div>
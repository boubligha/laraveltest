<x-master title="Create Profile">
    <form method="POST" action="{{ route('profiles.update',$profile->id) }}" >
        @csrf <!-- Protection CSRF -->
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{old('name',$profile->name)}}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"  value="{{old('email',$profile->email)}}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="text" class="form-control" id="password" name="password"  value="{{old('password',$profile->password)}}">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">confirmation Mot de passe</label>
            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation"  value="{{old('password_confirmation',$profile->password)}}">
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3" >{{old('bio',$profile->bio)}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">modefier</button>
    </form>
</x-master>

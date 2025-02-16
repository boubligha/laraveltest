<x-master title="Login">
    <form method="POST" action="{{ route('login.login') }}">
        @csrf 

        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login" value="admin" required value="{{ old('login') }}">
            @error('login')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required value="{{ old('password') }}">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</x-master>

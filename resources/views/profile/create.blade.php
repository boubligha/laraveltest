<x-master title="create Profile">
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">mot de pass </label>
            <input type="passwd" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">bio</label>
            <input type="text" class="form-control" id="bio" name="bio">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-master>
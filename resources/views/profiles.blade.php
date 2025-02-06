<x-master title="profiles">
    <h1>Profiles</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Bio</th>
        </tr>
        @foreach ($profiles as $profile)
            <tr>
                <td>{{$profile->id}}</td>
                <td>{{$profile->name}}</td>
                <td>{{$profile->email}}</td>
                <td>{{ Str::limit($profile->bio)}}</td>
            </tr>
        @endforeach
    </table>
</x-master>

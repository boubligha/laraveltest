<x-master title="profiles">
    <h1>Profiles</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Bio</th>
            <th>action</th>
        </tr>
        @foreach ($profiles as $profile)
            <tr>
                <td>{{$profile->id}}</td>
                <td>{{$profile->name}}</td>
                <td>{{$profile->email}}</td>
                <td>{{ Str::limit($profile->bio)}}</td>
                <td><a class="btn btn-primary" href="{{ route('profiles.show', ['id' => $profile->id]) }}">afficher plus</a>
                </td>
            </tr>
        @endforeach
        {{$profiles->links()}}
    </table>

</x-master>

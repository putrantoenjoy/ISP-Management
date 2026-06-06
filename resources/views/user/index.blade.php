user
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Tanggal Dibuat</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->created_at->format('d-m-Y') }}</td>
    </tr>
    @endforeach
</table>
<a href="{{ route('user.create') }}">User</a>
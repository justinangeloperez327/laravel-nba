<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Number</th>
            <th>Position</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Date of Birth</th>
            <th>Nationality</th>
            <th>Years of Experience</th>
            <th>College</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rosters as $roster)
            <td>{{ $roster->id }}</td>
            <td>{{ $roster->name }}</td>
            <td>{{ $roster->number }}</td>
            <td>{{ $roster->pos }}</td>
            <td>{{ $roster->height }}</td>
            <td>{{ $roster->weight }}</td>
            <td>{{ $roster->dob }}</td>
            <td>{{ $roster->nationality }}</td>
            <td>{{ $roster->years_exp }}</td>
            <td>{{ $roster->college}}</td>
        @endforeach
    </tbody>
</table>

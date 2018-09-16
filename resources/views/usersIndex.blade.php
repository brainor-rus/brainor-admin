@if(count($users)>0)
    <ul>
        @foreach($users as $user)
        <li>
            <span>{{ $user['name'] }}</span>
            <span>{{ $user['email'] }}</span>
        </li>
        @endforeach
    </ul>
@endif
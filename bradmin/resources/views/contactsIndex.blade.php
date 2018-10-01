@if(count($contacts)>0)
    <ul>
        @foreach($contacts as $contact)
            <li>
                <span>{{ $contact['name']}}</span><br>
                <span>{{ $contact['address']}}</span><br>
                @foreach($contact['tels'] as $tel)
                    <span>{{ $tel}}</span>
                @endforeach
                <br>
                <span>{{ $contact['email']}}</span><br>
            </li>
        @endforeach
    </ul>
@endif
<table class="table">
    <thead>
    <tr>
        @foreach($columns as $column)
            <th scope="col">{{ $column->getLabel() }}</th>
        @endforeach
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach($fields as $field)
            <tr>
                @foreach($columns as $column)
                    <td scope="col">{!! $field[$column->getName()] !!}</td>
                @endforeach
                <td class="text-right">
                    <a href="{{ Request::url() . '/' . $field['brRowId'] . '/edit/' }}" class="text-success">Ред.</a>
                    <a href="{{ Request::url() . '/' . $field['brRowId'] . '/delete/' }}" class="text-danger">Удал.</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links( "pagination::bootstrap-4") }}
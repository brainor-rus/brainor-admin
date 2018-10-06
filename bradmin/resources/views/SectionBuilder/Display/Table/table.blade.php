<div class="row pb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ Request::url() }}/create" class="btn btn-primary">Создать</a>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
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
                    <td scope="col">
                        @if(!$field[$column->getName()] instanceof Countable)
                            {!! $field[$column->getName()] !!}
                        @else
                            @php
                                $path = explode('.', $column->getName());
                                $name = end($path);
                            @endphp
                            @foreach($field[$column->getName()] as $value)
                                <span class="badge badge-info text-white">{!! $value->{$name} !!}</span>
                            @endforeach
                        @endif
                    </td>
                @endforeach
                <td class="text-right">
                    <a href="{{ Request::url() . '/' . $field['brRowId'] . '/edit/' }}" class="text-success">Ред.</a>
                    <button class="delete-btn" data-delete-link="{{ Request::url() . '/' . $field['brRowId'] . '/delete/' }}" class="text-danger">Удал.</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

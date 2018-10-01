@if($banks->count()>0)
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">БИК</th>
            <th scope="col">Создан</th>
            <th scope="col">Обновлен</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
            @foreach($banks as $bank)
                <tr>
                    <td scope="row">{{$bank->id}}</td>
                    <td>{{$bank->name}}</td>
                    <td>{{$bank->bik}}</td>
                    <td>{{$bank->created_at}}</td>
                    <td>{{$bank->updated_at}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif
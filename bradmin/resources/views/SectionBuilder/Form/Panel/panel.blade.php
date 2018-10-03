<form
        action={{ $action == 'edit' ? "/bradmin/" . $sectionName . "/" . $id . "/edit-action" : "/bradmin/" . $sectionName . "/create-action"}}
        method="post">


    <div class="row">
        @foreach($columns as $column)
            <div class="{{ $column->getClass() }}">
                @foreach($column->getFields() as $field)
                    @php
                        $value = $model->{ $field->getName() } ?? null;
                        if($value instanceof Countable)
                        {
                            $value = $value->pluck('id')->toArray();
                        }
                    @endphp
                    {!! $field->render($value) !!}
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="row pt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <a href="/bradmin/{{ $sectionName }}" class="btn btn-secondary">Отмена</a>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 03.10.2018
 * Time: 12:38
 */

namespace Bradmin\SectionBuilder\Form\FormAction;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Http\Request;

class FormAction
{
    public static function save(Model $model, Request $request)
    {
        foreach ($model->getAttributes() as $name => $attribute) {
            $model->{$name} = $request->{$name} ?? null;
        }
        $model->save();
    }

    public static function saveBelongsToRelations(Model $model, Request $request)
    {
        foreach ($model->getRelations() as $name => $relation) {
            if ($model->{$name}() instanceof BelongsTo && $request->has($name)) {
//                $request->{$name}->save();
                $model->{$name}()->associate($request->{$name});
            }
        }
    }

    public static function saveBelongsToManyRelations(Model $model, Request $request)
    {
        foreach ($model->getRelations() as $name => $relation) {
            if ($model->{$name}() instanceof BelongsToMany && $request->has($name)) {
//                $request->{$name}->save();
                $model->{$name}()->sync($request->{$name});
            }
        }
    }

    public static function saveHasOneRelations(Model $model, Request $request)
    {
        foreach ($model->getRelations() as $name => $relation) {
            if ($model->{$name}() instanceof HasOneOrMany && $request->has($name) && isset($request->{$name})) {
                if (is_array($request->{$name}) || $request->{$name} instanceof \Traversable) {
                    $model->{$name}()->saveMany($request->{$name});
                } else {
                    $related = $model->{$name}()->getModel();
                    $model->{$name}()->save($related::findOrFail($request->{$name}));
                }
            }
        }
    }
}
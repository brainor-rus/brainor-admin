<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 02.10.2018
 * Time: 13:04
 */

namespace Bradmin\SectionBuilder\Form\Panel;


use Illuminate\Support\Facades\View;

class PanelForm
{
    private $columns;

    public function __construct($columns)
    {
        $this->setColumns($columns);
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param mixed $columns
     */
    public function setColumns($columns): void
    {
        $this->columns = $columns;
    }

    public function render($modelPath, $sectionName, $id = null)
    {
        $columns = $this->getColumns();
        $model = new $modelPath();
        $action = 'create';

        if(isset($id))
        {
            $model = $model->where('id', $id)->first();
            if(!isset($model))
            {
                abort(404);
            }
            $action = 'edit';
        }

        $response = View::make('bradmin::SectionBuilder/Form/Panel/panel')
            ->with(compact('model', 'columns', 'sectionName', 'action', 'id'));

        return $response;
    }
}
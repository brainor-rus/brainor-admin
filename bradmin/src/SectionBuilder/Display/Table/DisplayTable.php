<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 01.10.2018
 * Time: 13:12
 */

namespace Bradmin\SectionBuilder\Display\Table;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DisplayTable
{
    private $pagination, $columns;

    public function __construct($columns, $pagination)
    {
        $this->setPagination($pagination);
        $this->setColumns($columns);
    }

    public function render($sectionName)
    {
        $data = DB::table($sectionName)->paginate($this->getPagination());
        $columns = $this->getColumns();
        $fields = array();


        foreach ($data as $key => $row)
        {
            foreach ($columns as $column)
            {
                $fields[$key][$column->getName()] = $column->render($row->{$column->getName()});
            }
            $fields[$key]['brRowId'] = $row->id;
        }

        return View::make('bradmin::SectionBuilder/Display/Table/table')->with(compact('data', 'columns', 'fields'));
    }

    /**
     * @param mixed $pagination
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
        return $this;
    }

    /**
     * @param mixed $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @return mixed
     */
    public function getPagination()
    {
        return $this->pagination;
    }
}
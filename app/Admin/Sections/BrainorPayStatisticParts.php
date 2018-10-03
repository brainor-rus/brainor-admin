<?php

namespace App\Admin\Sections;

use App\BrainorPayBank;
use App\BrainorPayStatistic;
use App\User;
use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Form\BaseForm\Form;
use Bradmin\SectionBuilder\Form\Panel\Columns\BaseColumn\FormColumn;
use Bradmin\SectionBuilder\Form\Panel\Fields\BaseField\FormField;

class BrainorPayStatisticParts extends Section
{
    public static function onDisplay(){
        $display = Display::table([
            Column::text('id', '#'),
            Column::text('brainorPayStatistic.id', 'Статистика'),
            Column::text('connection_id', 'connection_id'),
            Column::text('connection_type', 'connection_type'),
            Column::text('amount', 'Сумма'),
            Column::text('created_at', 'Дата добавления'),
            Column::text('updated_at', 'Дата обновления'),
        ])->setPagination(10);

        return $display;
    }

    public static function onCreate()
    {
        return self::onEdit();
    }

    public static function onEdit()
    {
        $form = Form::panel([
            FormColumn::column([
                FormField::select('pay_statistic_id', 'Статистика')
                    ->setModelForOptions(BrainorPayStatistic::class)
                    ->setDisplay('id')
                ->setRequired(true),
                FormField::input('connection_type', 'connection_type'),
                FormField::input('amount', 'Сумма'),
            ])
        ]);

        return $form;
    }
}
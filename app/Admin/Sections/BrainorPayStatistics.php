<?php

namespace App\Admin\Sections;

use App\BrainorPayBank;
use App\User;
use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Form\BaseForm\Form;
use Bradmin\SectionBuilder\Form\Panel\Columns\BaseColumn\FormColumn;
use Bradmin\SectionBuilder\Form\Panel\Fields\BaseField\FormField;

class BrainorPayStatistics extends Section
{
    public static function onDisplay(){
        $display = Display::table([
            Column::text('id', '#'),
            Column::text('user.name', 'Пользователь'),
            Column::text('connection_id', 'connection_id'),
            Column::text('connection_type', 'connection_type'),
            Column::text('amount', 'Сумма'),
            Column::text('commission', 'Коммиссия'),
            Column::text('brainorPayBank.name', 'Банк'),
            Column::text('bank_status_id', 'bank_status_id'),
            Column::text('bank_status_mes', 'bank_status_mes'),
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
                FormField::select('user_id', 'Пользователь')
                    ->setModelForOptions(BrainorPayBank::class)
                    ->setDisplay('name'),
                FormField::input('connection_id', 'connection_id'),
                FormField::input('connection_type', 'connection_type'),
                FormField::input('amount', 'Сумма'),
            ]),
            FormColumn::column([
                FormField::input('commission', 'Коммиссия'),
                FormField::select('bank_id', 'Банк')
                    ->setModelForOptions(BrainorPayBank::class)
                    ->setDisplay('name')
                    ->setRequired(true),
                FormField::input('bank_status_id', 'bank_status_id'),
                FormField::input('bank_status_mes', 'bank_status_mes'),
            ])
        ]);

        return $form;
    }
}
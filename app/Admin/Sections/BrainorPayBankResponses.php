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

class BrainorPayBankResponses extends Section
{
    public static function onDisplay(){
        $display = Display::table([
            Column::text('id', '#'),
            Column::text('brainorPayBank.name', 'Банк'),
            Column::text('code', 'Код'),
            Column::text('text', 'Текст'),
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
                FormField::select('bank_id', 'Банк')
                    ->setModelForOptions(BrainorPayBank::class)
                    ->setDisplay('name')
                    ->setRequired(true),
                FormField::input('code', 'Код')->setRequired(true),
                FormField::input('text', 'Текст')->setRequired(true),
            ]),
        ]);

        return $form;
    }
}
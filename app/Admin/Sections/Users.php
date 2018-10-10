<?php

namespace App\Admin\Sections;

use App\Contact;
use App\Role;
use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Display\Table\DisplayTable;
use Bradmin\SectionBuilder\Form\BaseForm\Form;
use Bradmin\SectionBuilder\Form\Panel\Columns\BaseColumn\FormColumn;
use Bradmin\SectionBuilder\Form\Panel\Fields\BaseField\FormField;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class Users extends Section
{
    protected $title = 'Пользователи';
    protected $model = '\App\User';

    public static function onDisplay(Request $request){

        $display = Display::table([
            Column::text('name', 'Имя'),
            Column::text('email', 'Email'),
            Column::text('created_at', 'Дата добавления'),
//            Column::text('contact.value', 'Контакт'),
            Column::text('roles.name', 'Роли'),
            Column::text('contact.value', 'Контакт'),
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
                FormField::input('name', 'Имя')->setRequired(true),
                FormField::multiselect('roles', 'Роли')
                    ->setModelForOptions(Role::class)
                    ->setDisplay('name'),
                FormField::hidden('password')->setValue('asdf'),
            ]),
            FormColumn::column([
                FormField::input('email', 'Email')->setRequired(true)
                    ->setPlaceholder('Email пользователя'),
                FormField::select('contact', 'Контакт')
                    ->setModelForOptions(Contact::class)
                    ->setDisplay('value'),
                FormField::custom('<b>Кастомное поле</b>')
            ], 'col-4'),
        ]);

        return $form;
    }

    public function isDeletable()
    {
        return true;
    }
}
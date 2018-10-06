<?php

namespace Bradmin\Controllers;

use Bradmin\SectionBuilder\Form\FormAction\FormAction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use Bradmin\Section;
use Bradmin\Navigation\NavigationManager;

class BrAdminController extends Controller
{

    public function getIndex()
    {
        return view('bradmin::spa');
    }

    public function getDashboard()
    {
        return response()->json([
                'html' => View::make('bradmin::dashboard')->render(),
                'meta' => [
                    'title' => 'Главная'
                ]
            ]
        );
    }

    public function getSidebarMenu(\Illuminate\Contracts\Foundation\Application  $app)
    {
        $navigation = NavigationManager::returnNavigation($app);

        return response()->json($navigation);
    }

    public function getDisplay(Section $section, $sectionName)
    {
        $display = $section->fireDisplay($sectionName);
        $sectionModelSettings = $section->getSectionSettings($sectionName);

        $results = $display->render($sectionModelSettings['model'] ?? config('bradmin.base_models_path') . studly_case(strtolower(str_singular($sectionName))));

        $html = $results['view'];
        $pagination = [
            'total' => $results['data']->total(),
            'per_page' => $results['data']->perPage(),
            'current_page' => $results['data']->currentPage(),
            'last_page' => $results['data']->lastPage(),
            'from' => $results['data']->firstItem(),
            'to' => $results['data']->lastItem()
        ];
        $meta = [
            'title' => $sectionModelSettings['title']
        ];


        return $this->render($html,$pagination,$meta);
    }

    public function getCreate(Section $section, $sectionName)
    {
        $display = $section->fireCreate($sectionName);
        $sectionModelSettings = $section->getSectionSettings($sectionName);

        $html = $display->render($sectionModelSettings['model'] ?? config('bradmin.base_models_path') . studly_case(strtolower(str_singular($sectionName))), $sectionName);
        $meta = [
            'title' => $sectionModelSettings['title'] . '| Новая запись'
        ];

        return $this->render($html, '', $meta);
    }

    public function createAction(Section $section, $sectionName, Request $request)
    {
        $sectionModelSettings = $section->getSectionSettings($sectionName);
        $modelPath = $sectionModelSettings['model'] ?? config('bradmin.base_models_path') . studly_case(strtolower(str_singular($sectionName)));

        $model = new $modelPath;
        $attrFields = Schema::getColumnListing($model->getTable());
        $relationFields = array_diff_key($request->all(), array_flip($attrFields));

        $model = $model::create($request->all());
        $model = $model->where('id', $model->id)
            ->when(isset($relationFields), function ($query) use ($relationFields) {
                $query->with(array_keys($relationFields));
            })
            ->first();

//        FormAction::save($model, $request);
        FormAction::saveBelongsToRelations($model, $request);
        FormAction::saveBelongsToManyRelations($model, $request);
        FormAction::saveHasOneRelations($model, $request);

        return redirect()->back();
    }

    public function getEdit(Section $section, $sectionName, $id)
    {
        $display = $section->fireEdit($sectionName);
        $sectionModelSettings = $section->getSectionSettings($sectionName);

        $html = $display->render($sectionModelSettings['model'] ?? config('bradmin.base_models_path') . studly_case(strtolower(str_singular($sectionName))), $sectionName, $id);
        $meta = [
            'title' => $sectionModelSettings['title'] . '| Редактирование'
        ];

        return $this->render($html, '', $meta);
    }

    public function editAction(Section $section, $sectionName, Request $request, $id)
    {
        $sectionModelSettings = $section->getSectionSettings($sectionName);
        $modelPath = $sectionModelSettings['model'] ?? config('bradmin.base_models_path') . studly_case(strtolower(str_singular($sectionName)));

        $model = new $modelPath;
        $attrFields = Schema::getColumnListing($model->getTable());
        $relationFields = array_diff_key($request->all(), array_flip($attrFields));

        $model = $model->where('id', $id)
            ->when(isset($relationFields), function ($query) use ($relationFields) {
                $query->with(array_keys($relationFields));
            })
            ->first();

        FormAction::save($model, $request);
        FormAction::saveBelongsToRelations($model, $request);
        FormAction::saveBelongsToManyRelations($model, $request);
        FormAction::saveHasOneRelations($model, $request);

//        $modelPath::where('id', $id)->update($request->all());

        return redirect()->back();
    }

    public function postEdit()
    {

    }


    public function deleteDelete(Section $section, $sectionName, $id)
    {
        $class = $section->fireDelete($sectionName);

        return $this->render($class);
    }

    public function render($html, $pagination=null, $meta=null)
    {
        return response()->json([
                'html' => View::make('bradmin::content.general')->with(compact('html'))->render(),
                'data' => [
                    'pagination' => $pagination ?? '',
                    ],
                'meta' => $meta ?? ''
            ]
        );
    }
}

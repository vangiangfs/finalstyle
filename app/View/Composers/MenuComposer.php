<?php
namespace App\View\Composers;

use App\Models\Cms\MenusCmsModel;
use Illuminate\View\View;

class MenuComposer
{
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus = MenusCmsModel::get()->keyBy('id');
        foreach($menus as $key=>$val){
            if(!$val->parent_id)
                continue;
            $menus[$val->parent_id]->number_children++;
        }
        $view->with('menus', $menus);
    }
}
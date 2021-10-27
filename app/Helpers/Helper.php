<?php
namespace App\Helpers;

class Helper{
    public static function menus_cms($menus, $parent_id = 0){
        if($parent_id)
            $html = '<ul class="nav nav-treeview">';
        else
            $html = '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
        foreach($menus as $key=>$menu){
            if($menu->parent_id == $parent_id){
                $link = '#';
                if($menu->module)
                    $link = '/'.env('APP_CMS_PATH').'/'.$menu->module;

                $html .= '
                <li class="nav-item">
                    <a href="'.$link.'" class="nav-link">
                        <i class="'.$menu->icon.' nav-icon"></i>
                        <p>'.$menu->title.($menu->number_children?'<i class="right fas fa-angle-left"></i>':'').'</p>
                    </a>';
                unset($menus[$key]);
                if($menu->number_children)
                    $html .= self::menus_cms($menus, $menu->id);
                $html .= '</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }

    public static function list($listfield, $data){
    }
}
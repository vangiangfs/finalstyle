<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CMSController;
use Illuminate\Http\Request;
use App\Models\Cms\UsersModel;

class UsersController extends CMSController
{
    public $listfield = [
        array('label' => 'Username', 'field' => 'username'),
    ];

    public function __construct()
    {
        $this->model = UsersModel::class;
    }

    public function index(Request $request)
    {
        $data = $this->model::all();
        return view('cms.users.list', [
            'title' => 'Danh sách quản trị viên',
            'data' => $data,
            'listfield' => $this->listfield
        ]);
    }
}

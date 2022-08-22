<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = Permission::where('parent_id', 0)->get();

        return view('admin.role.add', compact('permissionsParent'));
    }
}

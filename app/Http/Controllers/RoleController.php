<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Log;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        if ($key = request()->key) {
            $roles = Role::where('name', 'like', '%'.$key.'%')->get();
        }

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = Permission::where('parent_id', 0)->get();

        return view('admin.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->attach($request->permissions_id);

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $permissionsParent = Permission::where('parent_id', 0)->get();
        $role = Role::find($id);
        $permissionsChecked = $role->permissions;

        return view('admin.role.edit', compact('permissionsParent', 'role', 'permissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        Role::find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role = Role::find($id);
        $role->permissions()->sync($request->permissions_id);

        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
        try {
            Role::find($id)->delete();

            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            Log::error('message: '.$e->getMessage().' line: '.$e->getLine());

            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}

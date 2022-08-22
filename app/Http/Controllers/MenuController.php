<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Menu;
use App\View\Components\MenuRecusive;
use Illuminate\Http\Request;
use Log;

class MenuController extends Controller
{
    private $menuRecusive;

    public function __construct(menuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->paginate(5);

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();

        return view('admin.menus.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
        ]);

        return redirect()->route('menus.index');
    }

    public function edit($id, Request $request)
    {
        $menuFollowEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowEdit->parent_id);

        return view('admin.menus.edit', compact('optionSelect', 'menuFollowEdit'));
    }

    public function update($id, Request $request)
    {
        $menuFollowEdit = $this->menu->find($id);
        $menuFollowEdit->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
        ]);

        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        try {
            Menu::find($id)->delete();

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

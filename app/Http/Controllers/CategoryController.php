<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\View\Components\Recusive;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Log;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.category.add', compact('htmlOption'));
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);

        return $recusive->categoryRecusive($parentId);
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        try {
            // category in product
            if (Category::find($id)->products->count() <= 0) {
                Category::find($id)->delete();

                return response()->json([
                    'code' => 200,
                    'message' => 'success',
                ], 200);
            }
        } catch (\Exception $e) {
            Log::error('message: '.$e->getMessage().' line: '.$e->getLine());

            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}

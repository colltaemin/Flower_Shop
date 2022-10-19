<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use App\View\Components\Recusive;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $products = Product::query()
            ->when(request('key'), function (Builder $query, $search): void {
                $query
                    ->whereFulltext('name', $search)
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhereFulltext('content', $search)
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhereHas('category', function (Builder $query) use ($search): void {
                    $query
                        ->where('name', $search)
                        ->orWhere('name', 'like', "%{$search}%")
                    ;
                })
                ;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(8)
        ;

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);

        return $recusive->categoryRecusive($parentId);
    }

    public function store(ProductPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];

            $dataUploadFeatureImage = $this->uploadImage($request, 'feature_image_path', 'product');
            if (! empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $product = $this->product->create($dataProductCreate);
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->uploadImageMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_name' => $dataProductImageDetail['file_name'],
                        'image_path' => $dataProductImageDetail['file_path'],
                    ]);
                }
            }
            if (! empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);

        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->uploadImage($request, 'feature_image_path', 'product');
            if (! empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $product = $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->uploadImageMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_name' => $dataProductImageDetail['file_name'],
                        'image_path' => $dataProductImageDetail['file_path'],
                    ]);
                }
            }
            if (! empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('message: '.$e->getMessage().' line: '.$e->getLine());
        }
    }

    public function delete($id)
    {
        try {
            Product::find($id)->delete();

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

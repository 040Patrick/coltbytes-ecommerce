<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\SyncProductCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Create category
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Category::create($data);

        return back()->with(['category' => 'New category successfully created.']);
    }

    /**
     * Assign or remove category
     */
    public function sync(SyncProductCategoryRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();
        
        $product->categories()->sync($data['categories'] ?? []);

        return back()->with(['category' => empty($data) ? 'Category successfully removed.' : "New category successfully add to product #{$product->id}."]);
    }

    /**
     * Delete category 
     */
    public function destroy(Category $category): RedirectResponse
    {   
        // Policy here 
        $category->delete();

        return back()->with(['category' => "Category #{$category->id} successfully deleted."]);
    }
}

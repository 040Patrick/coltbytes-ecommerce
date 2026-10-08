<?php
declare(strict_types=1);
namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request, Product $product)
    {
        $data = $request->validated();

        dd($data);
        Auth::user()->reviews()->create([
            'product_id' => $product->id,
            'rating' => $data['rating'],
            'comment' => $data['comment']
        ]);

        return back()->with(['review' => 'Your review has been updated']);
    }
}

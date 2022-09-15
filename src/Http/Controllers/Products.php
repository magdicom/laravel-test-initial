<?php
namespace Magdicom\TestInitial\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Magdicom\TestInitial\Actions\ApplyDiscount;
use Magdicom\TestInitial\Actions\HasDiscount;

class Products extends Controller
{

    public function __invoke(Request $request)
    {
        $dataSet = File::get(__DIR__ . '/../../../resources/dataset.json');
        $dataSet = json_decode($dataSet, true);

        # Parse our data as collection
        $products = collect($dataSet['products']);

        # Loop into products to check and apply discounts
        $products = $products->map(function ($item, $key) {

            # Apply Discount
            $item['price'] = [
                'original' => $item['price'],
                'final' => app(ApplyDiscount::class)($item),
                'discount_percentage' => app(HasDiscount::class)($item) ?
                    app(HasDiscount::class)($item) . '%' : null,
                'currency' => config('testinitial.currency')
            ];

            return $item;

        });

        # Filter by category
        if ($request->filled('category')){
            $products = $products->where('category', $request->get('category'));
        }

        # Filter by price: get when price equal or more than `print_from`
        if ($request->filled('price_from')){
            $products = $products->where('price.original', '>=', $request->get('price_from'));
        }

        # Filter by price: get when price equal or less than `price_to`
        if ($request->filled('price_to')){
            $products = $products->where('price.original', '<=', $request->get('price_to'));
        }

        # Return filtered products
        return $products->all();
    }
}
<?php
namespace Magdicom\TestInitial\Actions;

class ApplyDiscount
{

    /**
     * Apply Price Discount
     * @param $product
     * @return int
     */
    public function __invoke($product): int
    {
        # Get Discount Percentage
        $percentage = app(HasDiscount::class)($product);

        # Apply discount if applicable
        if (!is_null($percentage))
        {
            return round($product['price'] * ((100 - $percentage) / 100), 2);
        }

        # Or return original price
        return $product['price'];
    }

}

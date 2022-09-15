<?php

namespace Magdicom\TestInitial\Actions;

class HasDiscount
{
    /**
     * Get discount percentage if applicable
     * @param $product
     * @return int|null
     */
    public function __invoke($product): int|null
    {
        # Apply category discount
        if (!is_null(config('testinitial.category_discount.' . $product['category'])))
        {
            return (int) config('testinitial.category_discount.' . $product['category']);
        }

        # Apply SKU discount
        if (!is_null(config('testinitial.sku_discount.' . $product['sku'])))
        {
            return (int) config('testinitial.sku_discount.' . $product['sku']);
        }

        return null;
    }
}
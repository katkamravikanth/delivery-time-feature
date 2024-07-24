<?php

namespace App\Service;

use App\Entity\Order;

class DeliveryTimeCalculator
{
    /**
     * Calculate the estimated delivery time for an order.
     *
     * @param Order $order The order for which to calculate the delivery time.
     * @return string The estimated delivery time as a string.
     */
    public function calculateDeliveryTime(Order $order): string
    {
        $products = $order->getProducts(); // Retrieve products from the order
        $shippingMethod = $order->getShippingMethod(); // Retrieve shipping method from the order
        $customerLocation = $order->getCustomerLocation(); // Retrieve customer location from the order

        // Initialize the maximum lead time for out-of-stock products
        $maxLeadTime = 0;

        // Determine the maximum lead time among all products in the order
        foreach ($products as $product) {
            if (!$product->isInStock()) {
                // If product is not in stock, update the maximum lead time if necessary
                $maxLeadTime = max($maxLeadTime, $product->getLeadTime());
            }
        }

        // Get the base delivery time from the shipping method
        $shippingTime = $shippingMethod->getDeliveryTime();

        // Calculate the location adjustment (e.g., +1 day for locations outside major cities)
        $locationTime = $this->getLocationAdjustment($customerLocation);

        // Calculate the total estimated delivery time
        $totalDeliveryTime = $maxLeadTime + $shippingTime + $locationTime;

        // Return the estimated delivery time as a formatted string
        return sprintf('Delivery in %d business days', $totalDeliveryTime);
    }

    /**
     * Calculate the location adjustment based on the customer's location.
     *
     * @param string $location The customer's location.
     * @return int The adjustment to the delivery time in days.
     */
    private function getLocationAdjustment(string $location): int
    {
        // Simplified logic: add 1 day for locations outside major cities
        return $location === 'outside_major_city' ? 1 : 0;
    }
}
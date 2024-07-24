<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; // Ensure the correct Route class is imported
use App\Entity\Order;
use App\Repository\OrderRepository;
use App\Service\DeliveryTimeCalculator;

class OrderController extends AbstractController
{
    private OrderRepository $orderRepository;
    private DeliveryTimeCalculator $deliveryTimeCalculator;

    // Constructor to inject the DeliveryTimeCalculator service
    public function __construct(OrderRepository $orderRepository, DeliveryTimeCalculator $deliveryTimeCalculator)
    {
        $this->orderRepository = $orderRepository;
        $this->deliveryTimeCalculator = $deliveryTimeCalculator;
    }

    // Define the route for this controller action
    #[Route('/order/{id}/estimate', name: 'order_estimate')]
    // Controller action to display the estimated delivery time
    public function index(Request $request, Order $order): Response
    {
        // Calculate delivery time using the service
        $deliveryTime = $this->deliveryTimeCalculator->calculateDeliveryTime($order);

        // Return the estimated delivery time as a response
        return new Response($deliveryTime);
    }
}
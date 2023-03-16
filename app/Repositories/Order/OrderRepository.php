<?php


namespace App\Repositories\Order;

use App\Models\Product;
use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface {
    public function getModel()
    {
        return Order::class;
    }
}
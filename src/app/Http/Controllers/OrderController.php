<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\Tariff;


class OrderController extends Controller
{
    public function store(OrderStoreRequest $request)
    {
        $data = $request->validated();

        $tariff = Tariff::find($data['tariff']);

        $first_day = 64; //100 000
        //Convert bit mask to decimal
        $mask = (int) base_convert($tariff->day_mask, 2, 10);

        if (($mask & $first_day >> $data['day']) == 0) {
            return response()->json(['day' => 'Selected invalid day of week'], 422);
        }

        $client = Client::firstOrCreate([
            'phone' => $data['phone'],
        ], [
            'name' => $data['name'],
        ]);

        $order = new Order([
            'day_of_week' => $data['day'],
            'address' => $data['address']
        ]);

        $order->tariff()->associate($tariff);
        $order->client()->associate($client);
        $order->save();

        return response()->json(['error' => false], 200);
    }
}

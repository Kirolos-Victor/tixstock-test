<?php

namespace App\Services;

use App\Http\Resources\TicketResource;
use App\Models\TicketList;
use Illuminate\Http\JsonResponse;

class TicketOrderService
{
    public function execute($list_id, $orderQuantity): JsonResponse
    {
        $ticketList = TicketList::where('id', $list_id)->first();
        if ($ticketList == null) {
            return response()->json('Ticket list does not exist', 404);
        }
        if ($ticketList->quantity_available < $orderQuantity) {
            return response()->json('Order quantity must be less than the available quantity', 406);
        }
        $ticketList->update([
            'quantity_available' => ($ticketList->quantity_available - $orderQuantity),
        ]);
        return response()->json(['message' => 'Order created', 'data' => new TicketResource($ticketList)], 201);
    }
}

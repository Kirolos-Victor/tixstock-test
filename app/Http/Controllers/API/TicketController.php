<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\TicketList;
use App\Services\TicketOrderService;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{
    public function store(StoreTicketRequest $request): JsonResponse
    {
        $ticket = TicketList::create($request->validated());
        return response()->json(new TicketResource($ticket), 201);
    }

    public function order($list_id, $orderQuantity): JsonResponse
    {
        return (new TicketOrderService())->execute($list_id, $orderQuantity);
    }
}

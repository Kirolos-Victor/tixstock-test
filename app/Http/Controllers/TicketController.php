<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\TicketList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(): View
    {
        $tickets = TicketList::all();
        return view('tickets.index', compact('tickets'));
    }

    public function search(Request $request): JsonResponse
    {
        $tickets = TicketList::where('event_name', 'LIKE', "%{$request->q}%")->get();
        return response()->json(TicketResource::collection($tickets), 200);
    }
}

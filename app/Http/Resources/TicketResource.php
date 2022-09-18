<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'list_id' => $this->id,
            'event_name' => $this->event_name,
            'currency' => $this->currency,
            'quantity_initial' => $this->quantity_initial,
            'quantity_available' => $this->quantity_available,
            'date_added' => $this->date_added,
            'status' => $this->status
        ];
    }
}

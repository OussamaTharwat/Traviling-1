<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'total_coins' => $this->total_coins,
            'Certificates' => $this->Certificates,
            'Enrolled_Courses'=>$this->Enrolled_Courses,
            'Order_History'=>$this->Order_History
        ];
    }
}

<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $att = [];
        foreach ($this->resource as $attName => $attValue) {
            $att[Str::camel($attName)] = $attValue;
        }
        return $att;
    }

    public static $wrap = null;
}

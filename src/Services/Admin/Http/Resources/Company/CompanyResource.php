<?php

namespace App\Services\Admin\Http\Resources\Company;

use App\Data\Enums\MediaCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
            'logo' => null,
            'created_at' => $this->created_at->toAtomString(),
            'updated_at' => $this->updated_at->toAtomString(),
        ];

        if ($this->whenLoaded('media')) {
            $data['logo'] = $this->getFirstMediaUrl(MediaCollection::LOGO);
        }

        return $data;
    }
}

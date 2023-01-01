<?php

namespace App\Http\Resources;

use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Resources\Json\JsonResource;

class TerrainsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "nom" => $this->nom,
            "email" => $this->email,
            "lengh" => $this->lengh,
            "region" => $this->region,
            "phone1" => $this->phone1,
            "phone2" => $this->phone2,
            "NumHoles" => $this->NumHoles,
            "par" => $this->par,
            "description" => $this->description,
            "ville" => $this->ville->nom,
            "images" => ImageResources::collection(Image::where("terrain_id", $this->id)->get()),
            "videos" => VideoResources::collection(Video::where("terrain_id", $this->id)->get()),
        ];
    }
}

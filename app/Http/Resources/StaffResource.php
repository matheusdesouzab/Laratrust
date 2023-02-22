<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Creativeorange\Gravatar\Facades\Gravatar;

class StaffResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' =>           $this->id,
            'email' =>        $this->email,
            'name' =>         $this->name ?? null,
            'avatar' =>       Gravatar::exists($this->email) ? Gravatar::get($this->email) : \Avatar::create($this->email)->toBase64()
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this->nim;
        if(substr($data, 0, 3) == '12S'){
            $email = 'iss' .substr($data, 3, 5) . '@students.del.ac.id';
        }else{
            $email = null;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'nim' => $this->nim,
            'email' => $email,
            'program_study' => $this->program_study,
            'phone_number' => $this->phone_number,
        ];
    }
}
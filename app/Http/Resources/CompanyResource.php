<?php

namespace App\Http\Resources;

use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage; 

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        if ($this->logo)
            $logo_url = Storage::disk('public')->url($this->logo);
        else
         $logo_url=null;
        #$logo_url = Storage::url('upload/companies/'.$this->logo);


        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'user_id' =>$this->user->id,
            'url' => $this->url,
            'logo' => $logo_url,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}

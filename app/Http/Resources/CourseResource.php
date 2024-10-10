<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    // Define properties
    public $status;
    public $message;
    
    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => [
                'id_course'        => $this->id_course,
                'title_course'     => $this->title_course,
                'about_course'     => $this->about_course,
                'is_premium'       => $this->is_premium,
                'level_course'     => $this->level_course,
                'price_course'     => $this->price_course,
                'teacher'          => $this->teacher,
                'duration_course'  => $this->duration_course,
                'module'           => $this->module,
                'language_course'  => $this->language_course,
                'date_start'       => $this->date_start,
                'date_end'         => $this->date_end,
            ]
        ];
    }
}

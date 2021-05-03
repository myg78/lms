<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student' => $this->student_id,
            // 'student' => new StudentResource($this->student),
            'test' => new TestBasicResource($this->test),
            'attempt_number' => $this->attempt_number,
            'submission_status' => $this->submission_status,
            'start_date' => date('Y-m-d\TH:i:s\Z', strtotime($this->start_date)),
            'submission_date' => date('Y-m-d\TH:i:s\Z', strtotime($this->submission_date)),
            'grading_status' => $this->grading_status,
            'graded_date' => $this->graded_date,
            'graded_by' => $this->graded_by,
            'grade_value' => $this->grade_value,
            'grade_max_value' => $this->grade_max_value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}


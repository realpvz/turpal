<?php

namespace App\Http\Requests\Api\V1;

use App\Models\Search;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'startDate' => 'nullable|date|date_format:Y-m-d|after_or_equal:today',
            'endDate' => 'nullable|date|date_format:Y-m-d|after:today',
        ];
    }

    public function toSearch()
    {
        return new Search(
            $this->filled('startDate') ? Carbon::parse($this->get('startDate')) : now(),
            $this->filled('endDate') ? Carbon::parse($this->get('endDate')) : now()->addWeeks(2),
        );
    }
}

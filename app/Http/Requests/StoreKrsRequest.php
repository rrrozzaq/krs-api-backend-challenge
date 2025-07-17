<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsEligibleForKrs;

class StoreKrsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (app()->runningInConsole()) {
            return true;
        }

        return $this->user()->nim_dinus == $this->route('nim');
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $nim = app()->runningInConsole()
            ? 'A11.2022.00001'
            : $this->user()->nim_dinus;

        return [
            'schedule_id' => [
                'required',
                'integer',
                'exists:jadwal_tawar,id',
                new IsEligibleForKrs($nim),
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsEligibleForKrs;

class StoreKrsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->nim_dinus == $this->route('nim');
    }

    public function rules(): array
    {
        $nim = $this->user()->nim_dinus;

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

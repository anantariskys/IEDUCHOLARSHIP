<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'provinsi' => [ 'string', 'max:255'],
            'kota' => [ 'string', 'max:255'],
            'kecamatan' => [ 'string', 'max:255'],
            'alamat_lengkap' => [ 'string'],
            'alamat_domisili' => [ 'string'],
            'nomor_telepon' => [ 'string', 'max:15'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ];
    }
}

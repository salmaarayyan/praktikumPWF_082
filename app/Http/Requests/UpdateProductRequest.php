<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isAdmin = (bool) optional($this->user())->isAdmin();

        return [
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'qty' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'user_id' => [
                Rule::requiredIf($isAdmin),
                'nullable',
                'exists:users,id',
            ],
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'name.string' => 'Nama produk harus berupa teks.',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',

            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',

            'qty.required' => 'Jumlah produk wajib diisi.',
            'qty.integer' => 'Jumlah produk harus berupa angka bulat.',
            'qty.min' => 'Jumlah produk tidak boleh kurang dari 0.',

            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka yang valid.',
            'price.min' => 'Harga produk tidak boleh kurang dari 0.',

            'user_id.required' => 'Pemilik produk wajib dipilih untuk admin.',
            'user_id.exists' => 'Pemilik produk tidak valid.',
        ];
    }
}

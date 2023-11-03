<?php

namespace App\Http\Requests\Api\SettingNotification;

use App\Enums\TypeSettingNotification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingNotificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'by_phone' => 'nullable|boolean',
            'type_notifi_by_phone' => [
                'nullable',
                Rule::in([
                    TypeSettingNotification::DAILY,
                    TypeSettingNotification::WEEK,
                    TypeSettingNotification::MONTH,
                ])
            ],
            'number_phone' => 'nullable|max:12',
            'by_email' => 'nullable|boolean',
            'type_notifi_by_email' => [
                'nullable',
                Rule::in([
                    TypeSettingNotification::DAILY,
                    TypeSettingNotification::WEEK,
                    TypeSettingNotification::MONTH,
                ])
            ],
            'email' => 'nullable|email'
        ];
    }
}

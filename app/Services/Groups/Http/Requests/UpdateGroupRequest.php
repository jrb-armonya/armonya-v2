<?php

namespace App\Services\Groups\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
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
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'color' => 'max:7',
            'user_id' => 'numeric',
            'users' =>  function ($attribute, $values, $parameters) {
                if($values == null) {
                    return true;
                }
                if(! is_array($values)) {
                    return false;
                }
            
                foreach($values as $v) {
                    if(! is_numeric($v)) {
                        return false;
                    }
                }
            
                return true;
            },
        ];
    }
}

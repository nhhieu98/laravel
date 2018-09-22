<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required',
            'screen' => 'required',
            'cpu' => 'required',
            'os' => 'required',
            'camera_truoc' => 'required',
            'camera_sau' => 'required',
            'pin' => 'required',
            'sim' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Không được để trống.',
            'cpu.required' => 'Không được để trống.',
            'screen.required' => 'Không được để trống.',
            'os.required' => 'Không được để trống.',
            'camera_truoc.required' => 'Không được để trống.',
            'camera_sau.required' => 'Không được để trống.',
            'sim.required' => 'Không được để trống.',
            'pin.required' => 'Không được để trống.',
        ];
            
    }
}

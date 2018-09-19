<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolUpdateRequest extends FormRequest
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

  //         'numero_vol4' => '',
    //       'depart_vol4' => '',
      //     'destination_vol4' => '',
        //   'jour_vol4' => '',

           'type_vol' => 'bail|required|in:DP,DPRG',
           'heure_depart_vol' => 'bail|required|date_format:g:i',
           'heure_arrive_vol' => 'bail|required|date_format:g:i',
           'vol_c_number' => 'bail|required|integer|min:0|max:9999',
           'vol_y_number' => 'bail|required|integer|min:0|max:9999'

        ];
    }
}

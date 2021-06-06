<?php
//April 3, 2021, 7:59 pm
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogowaniasFormRequest extends FormRequest {

    public $my_rules = ['player_id'=>'required|numeric',
'dodano'=>'required',
'user_id'=>'|numeric',
];
    public $messages = ['player_id.required'=>'Nie podano :attribute',
'dodano.required'=>'Nie podano :attribute',
];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
       
      return $this->my_rules;
        
    }

    public function messages() {
       
        return $this->messages;
        
    }

}

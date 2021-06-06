<?php
//April 2, 2021, 10:37 pm
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest {

    public $my_rules = ['login_user'=>'required|min:1|max:30',
'wzrost'=>'required|numeric',
'canLogin'=>'|numeric',
'born'=>'required|date',
];
    public $messages = ['login_user.required'=>'Nie podano :attribute',
'login_user.min'=>'Za krótki :attribute. Podaj maksymalnie :min znaków',
'login_user.max'=>'Za długi :attribute. Podaj maksymalnie :max znaków',
'wzrost.required'=>'Nie podano :attribute',
'born.required'=>'Nie podano :attribute',
'born.date'=>'Nie prawidłowa data w  :attribute',
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

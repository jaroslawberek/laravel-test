<?php
//April 2, 2021, 11:47 pm
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayersFormRequest extends FormRequest {

    public $my_rules = ['avatar'=>'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
'login'=>'required|min:1|max:30',
'wzrost'=>'required|numeric',
'canLogin'=>'|numeric',
'born'=>'required|date',
'sex'=>'required|in:m,k',
'position'=>'|in:b,o,p,n',
];
    public $messages = ['avatar.date'=>'Nie prawidłowy format pliku',
'login.required'=>'Nie podano :attribute',
'login.min'=>'Za krótki :attribute. Podaj maksymalnie :min znaków',
'login.max'=>'Za długi :attribute. Podaj maksymalnie :max znaków',
'wzrost.required'=>'Nie podano :attribute',
'born.required'=>'Nie podano :attribute',
'born.date'=>'Nie prawidłowa data w  :attribute',
'sex.required'=>'Nie podano :attribute',
'sex.in'=>'Nie prawidłowo w  :attribute',
'position.in'=>'Nie prawidłowo w  :attribute',
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

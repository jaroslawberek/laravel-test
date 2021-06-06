 <!Created CRUD: --March 25, 2021, 10:36 pm-->
@extends('layouts.frontend')
@section('content')
<script>
     $("document").ready(function(){
         var c3 = crudForm($("#crud-players-form-container"));
             c3.setSettings({
                 "ajaxFileds": "",
//                 'onValided': function (field_id, msg) {
//                     //alert(field_id + " " + msg.messages);
//                     if (msg.messages != "OK") {
//                         $("#" + field_id).addClass("field-error");
//                         $("#" + field_id+"_error").text(msg.messages)
//                     } else {
//                         $("#" + field_id).removeClass("field-error");
//                         $("#" + field_id+"_error").text("")
//                     }
//                 },
//                 'onValidedStart': function (field_id) {
//
//                 },
//                 'onValidedEnd': function (field_id) {
//
//                 },

             });
             c3.start();
         })
 </script>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>
@endif
<div id="crud-players-form-container" class="form-crud-container container" target-controller="players"> @if($update?? ""==true)
    <form id="players-form" class=" form-crud" method="POST" action="{{ route('players.update',['id'=>$player->id]?? "") }}">
         @csrf
         @method('PUT')
    @else
   <form  id="players-form" class=" form-crud" method="POST" action="{{ route('players.store') }}">
    @endif
    
        @csrf
        <div class="row d-flex justify-content-center align-content-center form-crud-row">
            <div class="col-md-6   form-crud-col">
                
<div class="form-group">                    
    <label for="player_login">login</label>
    <input type="text" name="login" class="form-control " id="player_login" aria-describedby="login" placeholder="login" value="{{ old('login',$player->login ?? "") }}">
    <small id="player_login_error" class="form-text text-muted"></small>
</div>


<div class="form-group">                    
    <label for="player_wzrost">wzrost</label>
    <input type="number" name="wzrost" class="form-control " id="player_wzrost" aria-describedby="wzrost" placeholder="wzrost" value="{{ old('wzrost',$player->wzrost ?? "") }}">
    <small id="player_wzrost_error" class="form-text text-muted"></small>
</div>


<div class="form-group">                    
    
    <input type="checkbox" name="canLogin" class=" " id="player_canLogin" aria-describedby="canLogin" placeholder="canLogin" @if(old('canLogin',$player->canLogin ?? "")==1) checked value=1 @else value=0 @endif>
      <span>canLogin</span>
    <small id="player_canLogin_help" class="form-text text-muted"></small>
</div>



<div class="form-group">
     <label for="player_description">description</label>
    <textarea  name="description" class="form-control " id="player_description" aria-describedby="Opis dodatkowy" placeholder="Opis dodatkowy">{{ old('description',$player->description ?? "") }}</textarea>
</div>

<div class="form-group">                    
    <label for="player_born">born</label>
    <input type="date" name="born" class="form-control date" id="player_born" aria-describedby="born" placeholder="born" value="{{ old('born',$player->born ?? "") }}">
    <small id="player_born_error" class="form-text text-muted"></small>
</div>


<div class="form-group">                    
<input type="radio" class="" id="player_sex" name="sex" value="m" @if(old('sex',$player->sex ?? "")=='m') checked  @endif>
<label for="player_sex">m</label><br>
<input type="radio" class="" id="player_sex" name="sex" value="k" @if(old('sex',$player->sex ?? "")=='k') checked  @endif>
<label for="player_sex">k</label><br>

</div>


<select name="position" id="players_position" class="form-control " form="players-form">
      <option value=""></option>
     <option value="b" {{ old('position',$player->position ?? "") == 'b' ? "selected" :""}}    >b</option> 
 <option value="o" {{ old('position',$player->position ?? "") == 'o' ? "selected" :""}}    >o</option> 
 <option value="p" {{ old('position',$player->position ?? "") == 'p' ? "selected" :""}}    >p</option> 
 <option value="n" {{ old('position',$player->position ?? "") == 'n' ? "selected" :""}}    >n</option> 

</select>
<small id="player_position_error" class="form-text text-muted"></small>

 
            </div>  
        </div>
        <div class="row d-flex justify-content-center align-content-center submit-content-crud">
            <input type="submit" class="btn-primary form-submit-crud" value="Zapisz">
        </div>
    </form>
</div>
@endsection
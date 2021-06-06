 <!Created CRUD: --April 2, 2021, 10:37 pm-->
@extends('layouts.frontend')
@section('content')
<script>
     $("document").ready(function(){
         var c3 = crudForm($("#crud-users-form-container"));
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
<div id="crud-users-form-container" class="form-crud-container container" target-controller="users"> @if($update?? ""==true)
    <form id="users-form" class=" form-crud" method="POST" action="{{ route('users.update',['id'=>$user->id]?? "") }}" enctype="multipart/form-data">
         @csrf
         @method('PUT')
    @else
   <form  id="users-form" class=" form-crud" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
    @endif
    
        @csrf
        <div class="row d-flex justify-content-center align-content-center form-crud-row">
            <div class="col-md-6   form-crud-col">
                
<div class="form-group">                    
    <label for="user_login_user">login_user</label>
    <input type="text" name="login_user" class="form-control " id="user_login_user" aria-describedby="login_user" placeholder="login_user" value="{{ old('login_user',$user->login_user ?? "") }}">
    <small id="user_login_user_error" class="form-text text-muted"></small>
</div>


<div class="form-group">                    
    <label for="user_wzrost">wzrost</label>
    <input type="number" name="wzrost" class="form-control " id="user_wzrost" aria-describedby="wzrost" placeholder="wzrost" value="{{ old('wzrost',$user->wzrost ?? "") }}">
    <small id="user_wzrost_error" class="form-text text-muted"></small>
</div>


<div class="form-group">                    
    
    <input type="checkbox" name="canLogin" class=" " id="user_canLogin" aria-describedby="canLogin" placeholder="canLogin" @if(old('canLogin',$user->canLogin ?? "")==1) checked value=1 @else value=0 @endif>
      <span>canLogin</span>
    <small id="user_canLogin_help" class="form-text text-muted"></small>
</div>



<div class="form-group">
     <label for="user_description">description</label>
    <textarea  name="description" class="form-control " id="user_description" aria-describedby="Opis dodatkowy" placeholder="Opis dodatkowy">{{ old('description',$user->description ?? "") }}</textarea>
</div>

<div class="form-group">                    
    <label for="user_born">born</label>
    <input type="date" name="born" class="form-control date" id="user_born" aria-describedby="born" placeholder="born" value="{{ old('born',$user->born ?? "") }}">
    <small id="user_born_error" class="form-text text-muted"></small>
</div>

 
            </div>  
        </div>
        <div class="row d-flex justify-content-center align-content-center submit-content-crud">
            <input type="submit" class="btn-primary form-submit-crud" value="Zapisz">
        </div>
    </form>
</div>
@endsection
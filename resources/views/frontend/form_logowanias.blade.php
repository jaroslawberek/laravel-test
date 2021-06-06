 <!Created CRUD: --April 3, 2021, 7:59 pm-->
@extends('layouts.frontend')
@section('content')
<script>
     $("document").ready(function(){
         var c3 = crudForm($("#crud-logowanias-form-container"));
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
         
           $("document").ready(function(){      
        addSelect2("logowania_player_id",                                                                         //  ID selecta
                    "/logowanias/getOne",                                                                           //  funkcja do szukania pojedynczego rekordu (do szablonów)
                    "/logowanias/select2_ajax",                                                                     //  funkcja do wyszukiwania
                    "login",                                                                                         //  po jakim polu ma szukac
                    "<div><span><img class='avatar' style='width: 30px' ></span><span class='login'></span></div>",   //  szablon na liscie
                    "<div><span></span><span style='color:red' class='login'></span></div>");                         //     szablon w kontrolce select
  });  $("document").ready(function(){      
        addSelect2("logowania_user_id",                                                                         //  ID selecta
                    "/logowanias/getOne",                                                                           //  funkcja do szukania pojedynczego rekordu (do szablonów)
                    "/logowanias/select2_ajax",                                                                     //  funkcja do wyszukiwania
                    "login_user",                                                                                         //  po jakim polu ma szukac
                    "<div><span><img class='avatar' style='width: 30px' ></span><span class='login_user'></span></div>",   //  szablon na liscie
                    "<div><span></span><span style='color:red' class='login_user'></span></div>");                         //     szablon w kontrolce select
  });
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
<div id="crud-logowanias-form-container" class="form-crud-container container" target-controller="logowanias"> @if($update?? ""==true)
    <form id="logowanias-form" class=" form-crud" method="POST" action="{{ route('logowanias.update',['id'=>$logowania->id]?? "") }}" enctype="multipart/form-data">
         @csrf
         @method('PUT')
    @else
   <form  id="logowanias-form" class=" form-crud" method="POST" action="{{ route('logowanias.store') }}" enctype="multipart/form-data">
    @endif
    
        @csrf
        <div class="row d-flex justify-content-center align-content-center form-crud-row">
            <div class="col-md-6   form-crud-col">
                
<div class="form-group">                    
     <label for="logowania_player_id">Player</label>
    <select  name="player_id" class="form-control " id="logowania_player_id" aria-describedby="player_id" placeholder="Player" model="players">
        @if( old('player_id') )
            <option value="{{old('player_id')}}"></option>
        @else
        @isset($player->id)
            <option value="{{$logowania->player_id}}"></option>
        @endisset
        @endif
    </select>    
     <small id="logowania_player_id_error" class="form-text text-muted"></small>
</div>



<div class="form-group">                    
    <label for="logowania_dodano">dodano</label>
    <input type="datetime" name="dodano" class="form-control date" id="logowania_dodano" aria-describedby="dodano" placeholder="dodano" value="{{ old('dodano',$logowania->dodano ?? "") }}">
    <small id="logowania_dodano_error" class="form-text text-muted"></small>
</div>


<div class="form-group">                    
     <label for="logowania_user_id">User</label>
    <select  name="user_id" class="form-control " id="logowania_user_id" aria-describedby="user_id" placeholder="User" model="users">
        @if( old('user_id') )
            <option value="{{old('user_id')}}"></option>
        @else
        @isset($player->id)
            <option value="{{$logowania->user_id}}"></option>
        @endisset
        @endif
    </select>    
     <small id="logowania_user_id_error" class="form-text text-muted"></small>
</div>


 
            </div>  
        </div>
        <div class="row d-flex justify-content-center align-content-center submit-content-crud">
            <input type="submit" class="btn-primary form-submit-crud" value="Zapisz">
        </div>
    </form>
</div>
@endsection
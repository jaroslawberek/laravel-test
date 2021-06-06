 <!Created CRUD: --March 25, 2021, 11:05 pm-->
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
    <form id="logowanias-form" class=" form-crud" method="POST" action="{{ route('logowanias.update',['id'=>$logowania->id]?? "") }}">
         @csrf
         @method('PUT')
    @else
   <form  id="logowanias-form" class=" form-crud" method="POST" action="{{ route('logowanias.store') }}">
    @endif
    
        @csrf
        <div class="row d-flex justify-content-center align-content-center form-crud-row">
            <div class="col-md-6   form-crud-col">
                
<div class="form-group">                    
    <label for="logowania_player_id">player_id</label>
    <input type="number" name="player_id" class="form-control " id="logowania_player_id" aria-describedby="player_id" placeholder="player_id" value="{{ old('player_id',$logowania->player_id ?? "") }}">
    <small id="logowania_player_id_error" class="form-text text-muted"></small>
</div>


<div class="form-group">                    
    <label for="logowania_dodano">dodano</label>
    <input type="datetime" name="dodano" class="form-control date" id="logowania_dodano" aria-describedby="dodano" placeholder="dodano" value="{{ old('dodano',$logowania->dodano ?? "") }}">
    <small id="logowania_dodano_error" class="form-text text-muted"></small>
</div>

 
            </div>  
        </div>
        <div class="row d-flex justify-content-center align-content-center submit-content-crud">
            <input type="submit" class="btn-primary form-submit-crud" value="Zapisz">
        </div>
    </form>
</div>
@endsection
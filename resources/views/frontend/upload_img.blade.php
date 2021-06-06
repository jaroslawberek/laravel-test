@extends('layouts.frontend')
@section('content')

<form method="POST" action="{{route('imageAjax')}}" id="upload-file-form" enctype="multipart/form-data">
     @csrf
     <input id="photo" type="file" name="photo" class="inputfile" />     
     <label class="user-photo-label" for="photo">
         <img id="avatar" src="{{asset('img/user-empty-icon.png')}}">
     </label>
   
   

</form>
<div id="res"></div>
@endsection
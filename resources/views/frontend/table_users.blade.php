@extends('layouts.frontend')
@section('content')
 <!Created CRUD: --April 2, 2021, 10:37 pm-->

<div id="table-search-container" class="container position-relative crud-table-container" target-controller="users" >
 
    @isset($table_search_container)
    {!!$table_search_container!!}
    @endisset
    @empty($table_search_container)
    <script>searchTableCrud(page_addres + "users?ajax_search=1", null, "body");</script>   
    @endempty  
</div>

@endsection
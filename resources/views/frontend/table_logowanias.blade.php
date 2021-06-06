@extends('layouts.frontend')
@section('content')
 <!Created CRUD: --April 3, 2021, 7:59 pm-->

<div id="table-search-container" class="container position-relative crud-table-container" target-controller="logowanias" >
 
    @isset($table_search_container)
    {!!$table_search_container!!}
    @endisset
    @empty($table_search_container)
    <script>searchTableCrud(page_addres + "logowanias?ajax_search=1", null, "body");</script>   
    @endempty  
</div>

@endsection
 <!Created CRUD: --April 2, 2021, 10:37 pm-->
   <div class="btn-group crud-table-group-buttons float-right">
       <a href="{{route('users.create')}}">
           
        <button class="btn-primary float-right">
            <span class= "fa fa-trash bt-crud-table-icon"></span>
            <span class="bt-crud-table-text">Nowy</span>
        </button>
       </a>
    </div>
<form id='users-form'>
    <input type="hidden" name="ajax_search" value="1">
     
    <table class="table table-hover table-crud">
        <thead>
            <!--Pola filtracji w NAgłowku tabeli-->
			<tr class="search-tr" >
<!--nowy-->
    <th>
        <input class="form-control" type="text" name="login_user" value="{{$search_items['login_user']??''}}" role="search-item">
    </th><!--nowy-->
    <th>
        <input class="form-control" type="text" name="wzrost" value="{{$search_items['wzrost']??''}}" role="search-item">
    </th><!--nowy-->
    <th>
        <input class="form-control" type="text" name="canLogin" value="{{$search_items['canLogin']??''}}" role="search-item">
    </th><!--nowy-->
    <th>
        <input class="form-control" type="text" name="description" value="{{$search_items['description']??''}}" role="search-item">
    </th><!--nowy-->
    <th>
        <input class="form-control" type="text" name="born" value="{{$search_items['born']??''}}" role="search-item">
    </th>
</tr>          
            <!--Pola Sortowania w nagłowkach kolumn-->
            <tr class="order-tr" >
<!--nowy-->
<td class="order-item"  order-f="login_user" >
     <span >Login_user</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='login_user') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='login_user') && ($sortField['sort'] === 'asc'))
            <span class="fa fa-sort-amount-up-alt "></span>
        @else
            <span class=""></span>
        @endif                           
    @endisset
    @empty($sortField['order_field'])
        <span class=""></span>
    @endempty                    
</td>                
 <!--nowy-->
<td class="order-item"  order-f="wzrost" >
     <span >Wzrost</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='wzrost') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='wzrost') && ($sortField['sort'] === 'asc'))
            <span class="fa fa-sort-amount-up-alt "></span>
        @else
            <span class=""></span>
        @endif                           
    @endisset
    @empty($sortField['order_field'])
        <span class=""></span>
    @endempty                    
</td>                
 <!--nowy-->
<td class="order-item"  order-f="canLogin" >
     <span >CanLogin</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='canLogin') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='canLogin') && ($sortField['sort'] === 'asc'))
            <span class="fa fa-sort-amount-up-alt "></span>
        @else
            <span class=""></span>
        @endif                           
    @endisset
    @empty($sortField['order_field'])
        <span class=""></span>
    @endempty                    
</td>                
 <!--nowy-->
<td class="order-item"  order-f="description" >
     <span >Description</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='description') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='description') && ($sortField['sort'] === 'asc'))
            <span class="fa fa-sort-amount-up-alt "></span>
        @else
            <span class=""></span>
        @endif                           
    @endisset
    @empty($sortField['order_field'])
        <span class=""></span>
    @endempty                    
</td>                
 <!--nowy-->
<td class="order-item"  order-f="born" >
     <span >Born</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='born') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='born') && ($sortField['sort'] === 'asc'))
            <span class="fa fa-sort-amount-up-alt "></span>
        @else
            <span class=""></span>
        @endif                           
    @endisset
    @empty($sortField['order_field'])
        <span class=""></span>
    @endempty                    
</td>                
 <!--nowy-->
<td class="order-item"  order-f="logowanias_count" >
     <span >Logowanias_count</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='logowanias_count') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='logowanias_count') && ($sortField['sort'] === 'asc'))
            <span class="fa fa-sort-amount-up-alt "></span>
        @else
            <span class=""></span>
        @endif                           
    @endisset
    @empty($sortField['order_field'])
        <span class=""></span>
    @endempty                    
</td>                
 
</tr> 
        </thead>
        <tbody>       
        <!--nowy-->
@forelse($users as $user)
            <tr>
                <td>{{$user->login_user}}</td>
<td>{{$user->wzrost}}</td>
<td>{{$user->canLogin}}</td>
<td>{{$user->description}}</td>
<td>{{$user->born}}</td>
<td>{{$user->logowanias_count}}</td>
                
                <td >
                    <div class="btn-group btn-group-crud-table " role="group" aria-label="">
                        <a href="#" class="btn-primary btn-crud-table" >
                            <span class= "fa fa-eye bt-crud-table-icon"></span> 
                            <span class="bt-crud-table-text"></span>
                        </a>
                        <a href="{{route('users.edit',['id'=>$user->id ?? ''])}}" class="btn-primary btn-crud-table" >
                            <span class= "fa fa-edit bt-crud-table-icon"></span> 
                            <span class="bt-crud-table-text"></span>
                        </a>
                        <a href="{{route('destroy-user',['id'=>$user->id ?? ''])}}" class="btn-primary btn-crud-table" >
                            <span class= "fa fa-trash bt-crud-table-icon"></span> 
                            <span class="bt-crud-table-text"></span>
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style='text-align: center; padding: 100px'>Brak rekordow</td>          
            </tr>
@endforelse 
                 
        </tbody>
        <tfoot>
        </tfoot>
    </table> 
    <div class="row d-flex justify-content-center align-content-center submit-content-crud">
    {{$users->links()}} 
        
    </div>
</form>
<!--</div>-->
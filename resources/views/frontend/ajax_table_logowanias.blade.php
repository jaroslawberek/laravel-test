 <!Created CRUD: --April 3, 2021, 7:59 pm-->
   <div class="btn-group crud-table-group-buttons float-right">
       <a href="{{route('logowanias.create')}}">
           
        <button class="btn-primary float-right">
            <span class= "fa fa-trash bt-crud-table-icon"></span>
            <span class="bt-crud-table-text">Nowy</span>
        </button>
       </a>
    </div>
<form id='logowanias-form'>
    <input type="hidden" name="ajax_search" value="1">
     
    <table class="table table-hover table-crud">
        <thead>
            <!--Pola filtracji w NAgłowku tabeli-->
			<tr class="search-tr" >
<!--nowy-->
    <th>
        <input class="form-control" type="text" name="login" value="{{$search_items['login']??''}}" role="search-item">
    </th><!--nowy-->
    <th>
        <input class="form-control" type="text" name="dodano" value="{{$search_items['dodano']??''}}" role="search-item">
    </th><!--nowy-->
    <th>
        <input class="form-control" type="text" name="login_user" value="{{$search_items['login_user']??''}}" role="search-item">
    </th>
</tr>          
            <!--Pola Sortowania w nagłowkach kolumn-->
            <tr class="order-tr" >
<!--nowy-->
<td class="order-item"  order-f="login" >
     <span >Player</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='login') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='login') && ($sortField['sort'] === 'asc'))
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
<td class="order-item"  order-f="dodano" >
     <span >Dodano</span>
    @isset($sortField['order_field'])
        @if (($sortField['order_field']=='dodano') && ($sortField['sort'] === 'desc'))
            <span class="fa fa-sort-amount-down-alt "></span>                  
        @elseif (($sortField['order_field']=='dodano') && ($sortField['sort'] === 'asc'))
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
<td class="order-item"  order-f="login_user" >
     <span >User</span>
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
 
</tr> 
        </thead>
        <tbody>       
        <!--nowy-->
@forelse($logowanias as $logowania)
            <tr>
                <td>{{$logowania->login}}</td>
<td>{{$logowania->dodano}}</td>
<td>{{$logowania->login_user}}</td>
                
                <td >
                    <div class="btn-group btn-group-crud-table " role="group" aria-label="">
                        <a href="#" class="btn-primary btn-crud-table" >
                            <span class= "fa fa-eye bt-crud-table-icon"></span> 
                            <span class="bt-crud-table-text"></span>
                        </a>
                        <a href="{{route('logowanias.edit',['id'=>$logowania->id ?? ''])}}" class="btn-primary btn-crud-table" >
                            <span class= "fa fa-edit bt-crud-table-icon"></span> 
                            <span class="bt-crud-table-text"></span>
                        </a>
                        <a href="{{route('destroy-logowania',['id'=>$logowania->id ?? ''])}}" class="btn-primary btn-crud-table" >
                            <span class= "fa fa-trash bt-crud-table-icon"></span> 
                            <span class="bt-crud-table-text"></span>
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style='text-align: center; padding: 100px'>Brak rekordow</td>          
            </tr>
@endforelse 
                 
        </tbody>
        <tfoot>
        </tfoot>
    </table> 
    <div class="row d-flex justify-content-center align-content-center submit-content-crud">
    {{$logowanias->links()}} 
        
    </div>
</form>
<!--</div>-->

@extends('layouts.frontend')
@section('content')
<script>

    $(document).ready(function () {
        
      var $s =  $('#select-1').select2({
          tags: true,         
          placeholder: 'Select an option',
                  templateResult : formatResult,
                  templateSelection : formatResult
          });
          
          
          
        function formatResult (result){
        //  console.log('%o', result);
                    if (result.loading)
                        return result.text;
                    var $html = $('<div><span>' +
                            '<img class="avatar" style="width: 30px" src=""></span>' +
                            '<span class="text">' + result.text + '</span></div>');
                    var tmp_val = result.text.split("-avatar:=");
                    if (tmp_val.length == 2) {
                         $html.find(".avatar").attr("src", "/img/tmp/" + tmp_val[1  ])
                        $html.find(".text").text(tmp_val[0]);
                    } else {
                        $html.find(".avatar").attr("src", "/img/tmp/" + result.avatar)
                        $html.find(".text").text(result.text);
                    }
                    return $html;
                }
                ;
      
      function formatRepoSelection (repo) {
  return repo.full_name || repo.text;
}

     var $s2 =  $('#players-select').select2({
          tags: true,
          ajax: {
                url: '/trainers/select2_ajax',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {                     
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data.result
                    };
                }
               
            },
             templateResult : formatResult,
                templateSelection : formatResult,
                minimumInputLength : 0
            
        });
       // $s.val("1").trigger("change");
//        var option = new Option("Jarek Berek-avatar:=4qzXgZ8fUsjtg50R7slsR58qj9Cl9IqkGhCzZSpY.jpeg", '1', true, true);   
//        $s2.append(option).trigger('change');
//        $s2.trigger({
//        type: 'select2:select',
//        params: {
//            data: {'id':'1', 'text':'Jarek2 Berek2', 'avatar':'4qzXgZ8fUsjtg50R7slsR58qj9Cl9IqkGhCzZSpY.jpeg'}
//        }
//    });
         $s2.on('select2:select', function (e) {
                    
                    console.log("select");
                });
    });

</script>
<div class="container">
    <form id="form1" method="GET" >

        <select id="select-1" class="form-control" name="select-1" form="form1">

            <option value=""></option>
            <option value="1" avatar="/img/user-empty-icon.png">fedf</option>
            <option value="2">Test2</option>
            <option value="3">Test3</option>
            <option value="4">Test4</option>      
            <option value="1">inny test1</option>
            <option value="2">inny test2</option>

        </select>
        <br>
        <select id="players-select" class="form-control" name="player_id"  form="form1">
 <option value="1">Jarek Berek-avatar:=4qzXgZ8fUsjtg50R7slsR58qj9Cl9IqkGhCzZSpY.jpeg</option>
        </select>
    </form>
</div>

@endsection
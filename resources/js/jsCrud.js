/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//   //     var pagPos = $(this).parent().parent().parent().children(":first").children(":last").children(":first");


var option_hide_show = true;
  function addSelect2(id_select, url_get_one="getOne", url_search="select2_ajax",search_field, formatResult_tmp=null, formatRepoSelection_tmp=null, minimumInputLength=1,  delay=250 ) {
        this.search_field = search_field;
        this.table_fk = $("#" + id_select).attr("model");
        
        function formatResult(result) {
            
            var $temp = $("<div><span></span><span class='"+search_field+"'></span></div>");
            if (result.loading) 
                 return result.text;
           
             if((formatResult_tmp!=null)&&(formatResult_tmp!="")){
               $temp =  $(formatResult_tmp);
//               alert("kuts");
           }
          
           
            if ((result.text == "") && (result.id > 0)) {
                $.ajax({
                    method: "GET",
                    url: url_get_one,
                    data: {"id": result.id, "model": table_fk}
                }).done(function (msg) {                    
                  //  $html.find(".avatar").attr("src", "/img/tmp/" + msg[0].avatar)
                    $temp.find("." + search_field).text(msg[0][search_field]);
                   // console.log("formatResult");
                    //console.log($html);
                    return $temp;
                });
            }else
           // $html.find(".avatar").attr("src", "/img/tmp/" + result.avatar)
            $temp.find("." + search_field).text(result[search_field]);
         //console.log("formatResult");
//console.log($html);
            return $temp;
        }
        function formatRepoSelection(result) {
            console.log(result);
            var $temp = $("<div><span></span><span class='"+search_field+"'></span></div>");
//            var $temp = $("<div><span></span><span class='"+search_field+"'></span></div>");
            if (result.loading)
                return result.text;
          
            if((formatRepoSelection_tmp!=null)&&(formatRepoSelection_tmp!="")){
               $temp =  $(formatRepoSelection_tmp);
            //   $temp = $($.parseHTML(formatRepoSelection_tmp));
                //alert($temp.html());
           }
          
       // console.log($temp);
            if ((result.text == "") && (result.id > 0)) {
                $.ajax({
                    method: "GET",
                    url: url_get_one,
                    data: {"id": result.id, "model": table_fk}
                }).done(function (msg) {//    
                   console.log("msg");
                   console.log(msg);
                  //  console.log(msg[0][[search_field]]);
                    $temp.find("." + search_field).text(msg[0][search_field]);
                   // console.log("formatRepoSelection!!!!!");
                    //console.log($temp);
                    return $temp;
                   
                });
            }else
               // console.log("result");
               // console.log(result);
      //     $html.find(".avatar").attr("src", "/img/tmp/" + result.avatar)
           $temp.find("." + search_field).text(result[search_field]);
           //console.log($html);
           return $temp;
        }

        $aaq = $('#' + id_select).select2({
            
            minimumInputLength: minimumInputLength,
            select_id: $(this).prop("id"),
            ajax: {
                url: url_search,
                dataType: 'json',
                delay: delay,
                data: function (params) {
                  //   console.log("data - model: " + $(this).attr("model"));
                    var query = {
                        search: params.term,
                        model: $(this).attr("model"),
                        field: search_field
                    }
                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {
                  //  console.log(data[0]);
                    return {
                        results: data[0]
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; },
            templateResult: formatResult,
            templateSelection: formatRepoSelection,

        });

//        $s2.on("select2:select", function (e) {
//          //  console.log($(e.currentTarget));
//
//        })
    
}
$("document").ready(function () {

});
function searchTableCrud(url, data, loader_content = "tbody", content_result = "#table-search-container") {

    $.ajax({
        method: "GET",
        url: url,
        data: data,
        beforeSend: function (xhr) {
//                    xhr.overrideMimeType("text/plain; charset=x-user-defined")
            $(loader_content).append("<div class='loader'><div id='loader'></div></div>")
        }
    }).done(function (msg) {
        $(content_result).html(msg);
        $(".loader").remove();
    }).fail(function () {
        console.log("error");
    }).always(function () {
        console.log("complete");
    });
}

function get_sort_data(search_data, table_search_container = "#table-search-container") {

    if (($(table_search_container).attr("order_field") != "") && ($("#table-search-container").attr("order") != "")) {
        search_data['order_field'] = $("#table-search-container").attr("order_field");
        search_data['sort'] = $("#table-search-container").attr("order");
    }
    return search_data;
}

function get_serch_data(form) {
    console.log(getFormData(form))
    return  getFormData(form);

}

var crudForm = function (ctc) {
    this.crud_table_container = ctc;
    this.settings = {
        "error_class": "field-error",
        "ajaxFileds": "login",
        'onValided': function (field_id, msg) {
            if (msg.messages != "OK") {
                $("#" + field_id).addClass("field-error");
                $("#" + field_id + "_error").text(msg.messages);
                $("#" + field_id + "_error").addClass("animated bounceInDown");
            } else {
                $("#" + field_id).removeClass("field-error");
                $("#" + field_id + "_error").text("")
                $("#" + field_id + "_error").removeClass("animated bounceInDown");
            }
        },
        'onValidedStart': function (field_id) {
            console.log("onValidedStrat: " + field_id);
        },
        'onValidedEnd': function (field_id) {
            console.log("onValidedEnd: " + field_id);
        }
    };
    return{
        setSettings = function (f) {
            $.map(f, function (v, k) {
                settings[k] = v
            })
        },
        start = function () {

            $(crud_table_container).on("blur", ".form-crud input, select, textarea", function (event) {

                if (settings['ajaxFileds'].indexOf($(this).attr("name")) >= 0) {
                    var field = $(this).prop("id");
                    var target = crud_table_container.attr("target-controller");
                    var data = {'field': $(this).attr("name"), 'value': $(this).val()}
                    $.ajax({method: "GET", url: "/" + target + "/ajaxField", data: data,
                        beforeSend: function (xhr) {
                            settings['onValidedStart'](field);
                        }
                    }).done(function (msg) {
                        settings['onValided'](field, msg);
                    }).fail(function () {
                        console.log("OnBlur error");
                    }).always(function () {
                        settings['onValidedEnd'](field);
                    });
                }

            });
        } //start
    } //return
}

let jscrud = function (ctc) {

    this.result;
    this.ajaxFields;
    this.crud_table_container = ctc;

    this.getTargetController = function (parm) {

        if ((/crud-table-container/.exec(parm.attr("class")) == "crud-table-container") &&
                (parm.attr("target-controller") != null)) {
            result = parm.attr("target-controller");
            crud_table_container = parm;
        } else {
            getTargetController(parm.parent());
        }
        return result;
    }

    // $(".btn-group-crud-table").css("display",'none');
//    if (option_hide_show == true) {
//        
//        $("#table-search-container").on("mouseenter", ".table-crud tr", function () {
//            console.log($(this).children(":last").children(":last").css("display", "block"));
//        });
//        $("#table-search-container").on("mouseleave", ".table-crud tr", function () {
//            console.log($(this).children(":last").children(":last").css("display", "none"));
//        });
//    }
//    else{
//        alert("huj");
//        $(".btn-group-crud-table").css("display","block");
//    }
//    $("#table-search-container").css("background-color: red");

    $(crud_table_container).on("mouseenter", ".order-item", function () {
        if ($(this).find(':nth-child(2)').attr("class") == "")
            $(this).find(':nth-child(2)').attr("class", "fa fa-sort");

    });
    $(crud_table_container).on("mouseleave", ".order-item", function () {
        console.log($(this).find(':nth-child(2)').attr("class"));
        if ($(this).find(':nth-child(2)').attr("class") == "fa fa-sort")
            $(this).find(':nth-child(2)').attr("class", "");


    });
    $(crud_table_container).on("click", ".order-item", function () { //click w nagłowek kolumny
        var target = getTargetController($(this));
        var search_data = get_serch_data(crud_table_container.children(":first").next());

        if ($(crud_table_container).attr("order") == "desc") {
            search_data['order_field'] = $(this).attr("order-f");
            search_data['sort'] = "asc";
            $(crud_table_container).attr("order_field", $(this).attr("order-f"));
            $(crud_table_container).attr("order", "asc");
            $(this).next().attr("class", "fa fa-sort-amount-down-alt");
        } else if ($(crud_table_container).attr("order") == "asc") {
            search_data['order_field'] = $(this).attr("order-f");
            search_data['sort'] = "desc";
            $(crud_table_container).attr("order_field", $(this).attr("order-f"));
            $(crud_table_container).attr("order", "desc");

        } else {
            search_data['order_field'] = $(this).attr("order-f");
            search_data['sort'] = "desc";
            $(crud_table_container).attr("order_field", $(this).attr("order-f"));
            $(crud_table_container).attr("order", "desc");
        }

        if ($(this).attr("order") != "")
            searchTableCrud(page_addres + target + "?page=" + $("#table-search-container").attr("page"), search_data, "tbody", crud_table_container);
    });

    $(crud_table_container).on("click", ".page-link", function (e) {  //klik w paginacje
        e.preventDefault();

        var count_items = -1;
        var target = getTargetController($(this));
        var search_data = get_serch_data(crud_table_container.children(":first").next());
        search_data = get_sort_data(search_data);
        if ($(this).attr("aria-label") == "Next »") {
            $(".page-item").each(function (index) {
                count_items++;
            });
            count_items = count_items - 1;
        } else
            count_items = $(this).html();
        $(crud_table_container).attr("page", count_items);
        searchTableCrud(page_addres + target + "?page=" + count_items, search_data, "tbody", crud_table_container);
//        searchTableCrud(page_addres + target, search_data, "tbody", crud_table_container );
    });

    $(crud_table_container).on("click", "input[type=checkbox]", function () {
//      
        var target = getTargetController($(this));
        var search_data = get_serch_data(crud_table_container.children(":first").next());
        searchTableCrud(target, search_data, "tbody", crud_table_container);
    })


    $(crud_table_container).on("change", "select", function () {

        var target = getTargetController($(this));
        if (target == false) {
            console.log("Nie znaleziono klasy: crud-table-container lub target-controller! Uzupełnij wartosci w tagach!");
            return false;
        }
        // var search_data = get_serch_data("search-" + target);
        var search_data = get_serch_data(crud_table_container.children(":first").next());
        console.log(search_data);
        searchTableCrud(page_addres + target, search_data, "tbody", crud_table_container);

    });

    $(crud_table_container).on('keypress', ".form-control", function (e) {

        if (e.which == 13) {

            if ($(this).attr("role") != "search-item")
                return false;

            var target = getTargetController($(this));
            if (target == false) {
                console.log("Nie znaleziono klasy: crud-table-container lub target-controller! Uzupełnij wartosci w tagach!");
                return false;
            }
            // var search_data = get_serch_data("search-" + target);
            var search_data = get_serch_data(crud_table_container.children(":first").next());
            searchTableCrud(page_addres + target, search_data, "tbody", crud_table_container);

        }
    });




}
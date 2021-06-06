/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var page_addres = "";
$("document").ready(function () {
  
    $("input[type=checkbox]").on("click", function () {
        //alert("huj");
        if ($(this).is(':checked')) {
            $(this).attr("value", "1")
        }
        else  {
            $(this).attr("value", "0")
        }
    });

//    console.log($("#player_description").parent());//,$("#player_description").parent().attr("height") );
    // alert($("#player_description").parent().parent().attr("class"));
    // $("#player_description").height($("#player_description").parent().parent().height());
    //$("textarea.form-control").attr("height","200px");//,$("#player_description").parent().attr("height") );

    $("#ajax_link").on("click", function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "trainers/store",
            data: {"login":"hujek"},
            beforeSend: function (xhr) {
//                    xhr.overrideMimeType("text/plain; charset=x-user-defined")
               
            }
        }).done(function (msg) {
//           msg = JSON.parse(msg);
            console.log(msg);
            $("#jakies").html(msg.message + " jego cioci mać " + msg[0].login);
           
        }).fail(function () {
            console.log("error");
        }).always(function () {
            console.log("complete");
        });
    })
  

});


Number.isInteger = Number.isInteger || function (value) {
    return typeof value === 'number' &&
            isFinite(value) &&
            Math.floor(value) === value;
};
  function setVar(var1=null, var2=null){
    if((var1!=null)&&(var1!=""))
        return var1;
    else  if((var2!=null)&&(var2!=""))
        return var2;
    else return null;
}

function isFloat(value) {
    return typeof value === 'number' &&
            value.toString().indexOf(".") > 0;
}


function isSentence(value, firstBigLettr = false, withDot = false) {

}


function isWord(value, available = "") {
    var er = /^[a-zA-Z]+$/;
    return er.test(value);
}


function isWordDigits(value, firstDigit = true) {
    var er;
    if (firstDigit == true)
        er = new RegExp("^[a-zA-Z0-9]+$");
    else
        er = new RegExp("^[^0-9][a-zA-Z0-9]+$");
    return er.test(value);
}


function isDigits(value) {

    var er = /^[0-9]+$/;
    return er.test(value);
}


function isPesel(value) {

}

function isNip(value) {

}

function isObject(val) {
    if (val === null) {
        return false;
    }
    return ((typeof val === 'function') || (typeof val === 'object'));
}


/*
 * FORMULARZE
 */
function getFormData(form) {
//     console.log("dupa");
//     console.log("dupa");

    var unindexed_array = $(form).serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });
    /*$("form input:checkbox").each(function(){
     indexed_array[this.name] = this.checked ? 1 : 0;
     });*/

    //console.log(form.prop("tagName"));
    return indexed_array;
}


// $('.basicAutoComplete').typeahead({
//            name: 'cities',
//            hint: false,
//            highlight: false, /* Enable substring highlighting */
//            minLength: 1, /* Specify minimum characters required for showing result */
//            source: function (query, process) {
//                console.log(process);
//                return $.get(base_url + "/ajaxGetCities", {query: query}, function (data) {
//                    return process(data);
//                })
//            },
//            afterSelect: function (item) {
//                console.log(item);
//            },
//
//        });
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 var activMark=null;
$("document").ready(function () {
    // alert($(document).innerHeight());
    if (window.innerHeight < 576) {
        $("#menu-collapse").css("top", $("#menu").innerHeight() + 'px');
    }
    $("#filtr").css("height", $("#carousel-inner").innerHeight() - 10 + 'px');

    //Zmiana ustawienia w filtrach buttonow on off
    $(".btn-group button").on("click", function () {
        filter_button_click($(this));
        setFiltersJSON();
    });

    $(".filtr-typ-check").on("click", function () {
        if ($(this).attr("class") == "filtr-typ-check")
            $(this).addClass("checked");
        else
            $(this).removeClass("checked");

    });


    $(window).scroll(function () {
        //console.log($(document).scrollTop());
        if ($(document).scrollTop() > 0) {
            $("#menu").css("background-color", "#121212");
            $("#search-input").css("background-color", "#121212");
        } else {
            $("#menu").css("background-color", "rgba(0, 0, 0, 0.0) ");
            $("#search-input").css("background-color", "rgba(0, 0, 0, 0.0) ");
        }
    });
    
       $("#filtr-mark-inner .img-thumbnail").on("click",function(){
        if(activMark!=null)
            activMark.removeClass('selected');
        $(this).addClass('selected');
        activMark = $(this);
       
    });

});
function filter_button_click(btn_id) {

    var btn_name = $(btn_id).attr("name");
    if ($(btn_id).attr('class') == "button-off") {

        $(btn_id).removeClass("button-off");
        $(btn_id).addClass("button-on");

        $("#" + $(btn_id).parent().attr("id") + " button").each(function () {
            if (($(this).attr('class') == "button-on") && ($(this).attr("name") != btn_name)) {
                $(this).removeClass("button-on");
                $(this).addClass("button-off");
            }
        });

    }
}

function setFiltersJSON() {
    var who, leasing_najem, cash ;
    $(".btn-group button").each(function () {

        if ($(this).attr("class") == "button-on") {
            if ($(this).parent().attr("id") == "group-for-who") {
                who = {"who":$(this).attr("name")}
            } else if ($(this).parent().attr("id") == "group-leasing-najem") {
               leasing_najem ={"leasing_najem":$(this).attr("name")};
            } else if ($(this).parent().attr("id") == "group-cash") {
                cash = {"cash": $(this).attr("name")} ;
            }
           
        }
        $.ajax({
            method: "GET",
            url: "/",
            data: who, leasing_najem, cash
        })
                .done(function (msg) {
                    alert("Data Saved: " + msg);
                });

    });

}

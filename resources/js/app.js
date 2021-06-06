$("document").ready(function () {
    $(document).on('change', '#photo', function () {
        if (document.getElementById('photo').files[0]) {
            var property = document.getElementById('photo').files[0];
            var image_name = property.name;
            var image_extension = image_name.split('.').pop().toLowerCase();
//        if (jQuery.inArray(image_extension, ['gif', 'jpg', 'jpeg', '']) == -1) {
//            alert("Invalid image file");
//            return false;
//        }       
            var form_data = new FormData($("#upload-file-form")[0]);
            form_data.append("file_ajax", property);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }});
            $.ajax({
                url: '/trainers/imageAjax',
                method: 'POST',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#msg').html('Loading......');
                },
                success: function (data) {
                    $("#avatar").attr("src", "/img/tmp/" + data.img_path);
                    console.log($("#avatar").attr("src"));
                },
                statusCode: {
                    422: function (data) {
                        alert(data.responseJSON.message);
                        $("#avatar").attr("src", "/img/tmp/user-empty-icon.png");
                    }
                }
            });
        }

    });
//    console.log(app.href);
//    console.log(app.host);
//    console.log(app.hostname);
//    console.log(app.pathname);
//    console.log(app.queryString);
//    console.log(app.origin);
    var c1 = jscrud($("#table-search-container"));
    var c2 = jscrud($("#table-logowania-search-container"));

    //var c2 = jscrud($("#table-search-container2"));
    $("#table-search-container > .btn-group-crud-table").css("display", "");
//   $("input[type=checkbox]").on("click", function () {
//     
//        if ($(this).is(':checked')) {            
//            $(this).attr("value", "1")
//        }
//    });


    $("#formclick").on("click", function () {
        var d = $("#form1").serializeArray();
        console.log(getFormData("form1"));
        console.log(d);
        console.log(d[0]['name']);
        console.log(d[0].value);
    })
    $("#click").on("click", function () {

        $.ajax({
            method: "GET",
            url: "test2",
            data: "",
            beforeSend: function (xhr) {
//                    xhr.overrideMimeType("text/plain; charset=x-user-defined")
            }
        }).done(function (msg) {
            $("#res").html(msg);
            msg = JSON.parse(msg);

//            const queryString = window.location.search;
//            const url = window.location.search;
//            const urlParams = new URLSearchParams(queryString);
//            console.log("queryString = " + queryString);
//            console.log("href: " + window.location.href);
//            console.log("host: " + window.location.host);
//            console.log("hostname: " + window.location.hostname);
//            console.log("pathname: " + window.location.pathname);
//            console.log("hash: " + window.location.hash);
            //            console.log("origin: " + window.location.origin);
//            console.log("protocol: " + window.location.protocol);

//            console.log(urlParams.get('g'));
//            console.log(urlParams.getAll('g'));
//            console.log("---");
//            var entries = urlParams.entries();
//            for (const entry of entries) {
//                console.log(`${entry[0]}: ${entry[1]}`);
//            }
//            console.log(Number.isInteger(12));
//            console.log(Number.isInteger(12.88));

//              console.log(isFloat(12));
//              console.log(isFloat(12.76));
//              console.log(isFloat("12.76"));

//              console.log(isDigits("12.76")); //false
//              console.log(isDigits("1276")); //true
//              console.log(isDigits("-1276")); //false
//              console.log(isDigits(1276)); //true
//              console.log(isDigits(-1276)); //false
//              
//                console.log(isWord("test"));
//                console.log(isWord("test "));
//                console.log(isWord(" test"));
//                console.log(isWord("test1"));
//                console.log(isWord("1test"));

//                console.log(isWordDigits("test"));
//                console.log(isWordDigits("test "));
//                console.log(isWordDigits(" test"));
//                console.log(isWordDigits("test1"));
//                console.log(isWordDigits("1test"));
//                console.log(isWordDigits("1test",false)); //z przodu ma nie byc cyfry
//              

            //console.log( Math.floor(1) === 1);
//            console.log("msg typeof  - " + typeof msg);
//            //console.log(msg[0]);          
////            console.log("Dane: " + msg["dane"]);
////            console.log("Data ur:" + msg["dane"]["Data ur"]);
////            console.log("wzrost:" + msg["dane"]["wzrost"]);
//            console.log(msg.dane.wzrost); // lub msg["dane"]["wzrost"]
//            console.log(msg.record1.rec2); // 
//            console.log(msg.record2[0].pilka); // 
//            console.log("rozmiary: drugi parametr" + msg.record2[0].rozmiary["pierwszy"] + "(type of " + typeof msg.record2[0].rozmiary["pierwszy"] + ")"); // 
//            console.log("w petli dane1:");
//            for (var item in msg.dane) {
//                console.log(msg.dane[item] + "  typeof: " + typeof msg.dane[item]);
//            }
//            console.log("w petli dane2:");
//            $.map(msg.dane,function(item,item_name){
//                console.log(item_name + " to " + item);
//            })
//             console.log("Petli na calym obiekcie");
//            $.map(msg,function(item,item_name){
//                console.log(item_name + " to " + item);
//            });
//             console.log("Petli na calym obiekcie i podobiektach");
//            $.map(msg, function (item, item_name) {
//                if (isObject(item)) {
//                    console.log("   Podobiekt: " + item_name);
//                    $.map(item, function (item2, item_name2) {
//                        console.log("       "+item_name2 + " to "+ item2 + "(typeof "+typeof item2 + ")");
//                    });
//                } else
//                    console.log(item_name + " to " + item + "(typeof "+typeof item+")");
//            })

        }).fail(function () {
            console.log("error");
        }).always(function () {
            console.log("complete");
        });

    })

});
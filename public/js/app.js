$("document").ready(function(){$(document).on("change","#photo",function(){if(document.getElementById("photo").files[0]){var e=document.getElementById("photo").files[0],o=(e.name.split(".").pop().toLowerCase(),new FormData($("#upload-file-form")[0]));o.append("file_ajax",e),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({url:"/trainers/imageAjax",method:"POST",data:o,contentType:!1,cache:!1,processData:!1,beforeSend:function(){$("#msg").html("Loading......")},success:function(e){$("#avatar").attr("src","/img/tmp/"+e.img_path),console.log($("#avatar").attr("src"))},statusCode:{422:function(e){alert(e.responseJSON.message),$("#avatar").attr("src","/img/tmp/user-empty-icon.png")}}})}});jscrud($("#table-search-container")),jscrud($("#table-logowania-search-container"));$("#table-search-container > .btn-group-crud-table").css("display",""),$("#formclick").on("click",function(){var e=$("#form1").serializeArray();console.log(getFormData("form1")),console.log(e),console.log(e[0].name),console.log(e[0].value)}),$("#click").on("click",function(){$.ajax({method:"GET",url:"test2",data:"",beforeSend:function(e){}}).done(function(e){$("#res").html(e),e=JSON.parse(e)}).fail(function(){console.log("error")}).always(function(){console.log("complete")})})});

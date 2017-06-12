$(function () {



    $("#start_btn").on("click", function(){

        console.log("ok");

        $.post(

        "output.php",

//        {"name":"ryu"},

        function(data){

             console.log(data);
        }
        
        
        
        );

    });









});

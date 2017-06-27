$(function(){



  //show_btn/////////////////////////////////////////////////////////////////////


let bt = $(".show_btn");


  bt.on("click",function(){

          $("#img").toggleClass("blur");

          if($("#img").hasClass("blur")){

                bt.html("show");


          }else {
                bt.html("hide");

          }






  });

















































});

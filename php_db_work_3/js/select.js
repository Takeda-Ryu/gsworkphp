$(function(){



let $script     = $('#script');

let star        = JSON.parse($script.attr('data-star'));



// alert(star[1]);



for (var i = 0; i < star.length; i ++) {
  star[i];

  $(`.rateYo${star[i]}`).rateYo({

  starWidth: "10px",
  readOnly: true,
  rating: star[i]

  });


  // 色変更
  $(`.rateYo${star[i]}`).rateYo({
  ratedFill: "#fff16f"
  });

  $(`.rateYo${star[i]}`).rateYo({
  numStars: 5
  });

}












});

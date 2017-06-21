$(function(){









	// $('#drag').draggable(); //ドラッグできるようになる







    // 星の大きさ変更＆クリックイベント取得
    $("#rateYo1").rateYo({
        starWidth: "25px",
        })
        .on("rateyo.set", function (e, data) {
             $("#star_rate").val(data.rating);
        }
    );
    // 色変更
    $("#rateYo1").rateYo({
        ratedFill: "#fff16f"
    });
    // 星の数を変更
    $("#rateYo1").rateYo({
        numStars: 5
    });

















});

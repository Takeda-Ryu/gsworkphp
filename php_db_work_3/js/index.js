

$(function(){









	// $('#drag').draggable(); //ドラッグできるようになる







    // 星の大きさ変更＆クリックイベント取得
    // $("#rateYo1").rateYo({
    //     starWidth: "25px",
    //     })
    //     .on("rateyo.set", function (e, data) {
    //          $("#star_rate").val(data.rating);
    //     }
    // );
    // // 色変更
    // $("#rateYo1").rateYo({
    //     ratedFill: "#fff16f"
    // });
    // // 星の数を変更
    // $("#rateYo1").rateYo({
    //     numStars: 5
    // });
		//

// naviモーダル////////////////////////////////////////////////////////////////




		let navi = $("#navi_modal");

		let bar = $('.fa-bars');

		let whole = $('.content-wrap');



		// naviモーダルを表示

		bar.on("click", function() {

			if (bar.hasClass("open")) {

				navi.fadeOut(500);
				//            openクラスを取り除く
				bar.removeClass("open");

				whole.removeClass("fog"); //ぼかし用のclassを削除する
			} else {

				navi.fadeIn(500);


				whole.addClass("fog"); //ぼかし用のclassを追加する


				bar.addClass("open");

			}
		});


		// naviモーダルを閉じる
		$("#img,.Q_title,.form_wrap").on("click", function() {

			navi.fadeOut(500);
			bar.removeClass("open");
			whole.removeClass("fog"); //ぼかし用のclassを削除する

		});
















});

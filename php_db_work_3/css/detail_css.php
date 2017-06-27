

<?php header('Content-Type: text/css; charset=utf-8'); ?>
@charset "UTF-8";




body{

	background:  radial-gradient(#fae3ff, #c8fffb);
  height: 1200px;
}

.select{
  display: inline-block;

}

.graph{

	display: inline-block;
	position: fixed;
	right: 1em;


}

#img{
	text-align: center;


}

.blur{

	filter: blur(28px);

}

img{
	display: inline-block;
	padding-top: 2em;
	width: 30%;
	height: 30%;


}

div .color1{

  width: 30px;

  height: 30px;

  background-color:#<?= $color1 ?>;



}

div .color2{

  width: 30px;

  height: 30px;

  background-color:#<?= $color2 ?>;



}

div .color3{

  width: 30px;

  height: 30px;

  background-color:#<?= $color3 ?>;



}




/*アニメーション/////////////////////////////////////////////////////////////////////////////////////////*/


/*ピョンピョン跳ねる///////////////////////////////////////////////////////////*/

.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
    animation-timing-function: linear;
    animation-iteration-count:infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
    40% {transform: translateY(-30px);}
    60% {transform: translateY(-15px);}
}

.bounce {
    animation-name: bounce;
}



form{
	color: #adadad;
	display: inline-block;
}

.hash {
	background-color: rgba(255, 255, 255, 0.44);
	text-align: center;
	margin-top: 8em;
	width: 100%;
	padding: 1em;
}

input{
	margin: 2em;
}


.data_list{
	margin-top: 5%;
	text-align: right;
}

a{

	color: #868686;
	text-decoration: none;

}

/*showボタン///////////////////////////////////////////////////////////////////*/


.show_btn{

	    background-color: rgb(233, 229, 178)ck;
			border-radius: 50%;
			border: none;
			cursor: pointer;
			outline: none;
			padding: 0.5em;
			/*appearance: none;*/
			color: white;



}










/*スター評価////////////////////////////////////////////////////////////////////*/

#rateYo1{
	display: inline-block;
  margin-top: 1em;


}

.star_rate{
  text-align: center;

}







.form_wrap {
	text-align: center;
}

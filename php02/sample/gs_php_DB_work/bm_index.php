<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックシェルフ</title>
    <link href="bm.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
  
  
  <h1>BOOK SHELF</h1>
   
   
    <div class="search">
        <form id="form1" method="post" action="bm_select.php" >
            <input id="search" type="text" name="search">
            <input id="set" type="submit" value="SEARCH">
        </form>
    </div>
    
    
    

    <!-- Head[Start] -->
    <header>

    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    
<div class="form_wrap">   
<form type="post" method="post" action="bm_insert.php">

        <p>title:<input type="text" name="title"></p>
        <p>url:<input type="text" name="url"></p>
        <p>comment:<textArea name="comment" rows="4" cols="40"></textArea></p>
        <input type="submit" value="set">
</form>
</div>    
    <!-- Main[End] -->
    
<div id="rst"></div>    


<!--
    
<script>     
	
	$("#set").on("click",function(){
		
		alert("ok");
		
		$.getJSON("bm_select.php",function(data){
		
			$("#rslt").append(data);
	});
		
	});

	



</script>
-->









<script>
$(function(){
    $('#form1').submit(function(event){
		
        event.preventDefault();//ページ遷移キャンセル
//		let tes = $('#search').val();
//		alert(tes);
        
		var f = $(this);
        $.ajax({
            url: f.prop('action'),
            type: ('POST'),
			data: {
                "search":$('#search').val()
            },
//            data: $('#search').val(),
            timeout: 10000,
            dataType: 'json'
        })
        .done(function( data ) {
                         
//		   alert(data);
		   $("#rst").prepend(data);// 通信が成功したときの処理
			
        })
        .fail(function( data ) {
            alert("fail!");// 通信が失敗したときの処理
        })
        .always(function( data ) {
            // 通信が完了したとき
			
        });
    });
});
</script>


    
  


</body>

</html>


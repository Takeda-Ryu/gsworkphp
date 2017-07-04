<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use	App\Books;
use	Illuminate\Http\Request;

/**
*	本のダッシュボード表示
*/

Route::get('/', function () {
    		    
    		    $books	=	Books::orderBy('created_at','asc')->get();
				
				
				return	view('books',	[
								'books'	=>	$books
				]);		
				
				$books	=	Books::orderBy('created_at',	'asc')->get();
				return	view('books',	[
								'books'	=>	$books
				]);
});

/**
*	新「本」を追加
*/
Route::post('/books	', function (Request $request)	{
    
    	//バリデーション
				$validator	=	Validator::make($request->all(),	[
								'item_name'	    =>	'required|min:3|max:255',
								'item_number'	=>	'required|min:1',
				]);
				//バリデーション：エラー
				if	($validator->fails())	{
								return	redirect('/')
												->withInput()
												->withErrors($validator);
				}
				
					// Eloquent モデル
			    $books =	new	Books;
				$books->item_name	=	$request->item_name;
				$books->item_number	=	$request->item_number;
				$books->item_amount	=	'1000';
				$books->published =	'2017-03-07	00:00:00';
				$books->save();				//「/」ルートにリダイレクト
				return	redirect('/');
				
});

/**
*	本を削除
*/
Route::delete('/books/{book}', function (Books	$book) {
	
	$book->delete();
	return	redirect('/'); 

});


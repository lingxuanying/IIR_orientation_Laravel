<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Movie;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/{id}', function ($id) {
    return 'userid:'.$id;
});
Route::get('/news','App\Http\Controllers\NewsController@index');
Route::get('/hello','App\Http\Controllers\NewsController@hello');
Route::get('/news/{id}','App\Http\Controllers\NewsController@show_id');
/*
Route::get('/insert',function(){
    $values = array('index' => '1','userid' => 'sunny', 'movieid' => '地獄2');
    DB::table('movie')->insert($values);
});
Route::get('/read', function(){
    $results = DB::select('select * from movie where userid = :id', ['id'=>'sunny']);
    return $results;
});
Route::get('/update',function(){
    $updated = DB::update('update movie set userid = "beautiful_sunny" where userid = ?',['sunny']);
    return $updated;
});
Route::get('/delete',function(){
    $deleted = DB::delete('delete from movie where userid = ?',['最新消息']);
    return $deleted;
});*/


Route::get('/read',function(){
    $posts = Movie::all();
    
    foreach($posts as $post){
        return $post->userid;
    };
});

Route::get ( '/import_csv', function () {
	$maxLines=1001;
    if (($handle = fopen ( public_path () . '/ratings_small_2.csv', 'r' )) !== FALSE) {
        for ($i = 0; $i < $maxLines && !feof($handle); $i++){
            $data = fgetcsv ( $handle, 1000, ',' );
            if($i != 0){
                $movie = new Movie ();
                $movie->index = $data [4];
                $movie->userid = $data [0];
                $movie->movieid = $data [1];
                $movie->rating = $data [2];
                $movie->timestamp = $data [3];
                $movie->save ();
            }
        }
        fclose ( $handle );
    }
	
	$finalData = $movie::all ();
	return view ( 'index' )->withData ( $finalData );
} );
Route::get('/show', 'App\Http\Controllers\NewsController@show_data');
Route::get('/delete_web', 'App\Http\Controllers\NewsController@delete_web');
Route::post('/delete_data', 'App\Http\Controllers\NewsController@delete_data');

Route::get('/index', 'App\Http\Controllers\NewsController@index');
Route::get('/index/{userid}', 'App\Http\Controllers\NewsController@search_web');
Route::get('/index/{userid}/{movieid}/{rating}', 'App\Http\Controllers\NewsController@update_web');
Route::post('/helloworld', 'App\Http\Controllers\NewsController@hello_world');
<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '新增一筆資料';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return '最新消息'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function hello(){
        #$movies = Rating::where('user_id', $userid)->get();
        return view('hello');
    }
    public function show_id($id){
        //第一種傳變數進view的方法
        return view('hello')->with('id',$id);
        //第二種方法
        //return view('hello',compact('id',$id));
    }
    public function show_data()
    {
        return view('show_data', [
            'movie' => Movie::all(),
        ]);
    }
    public function delete_web(Request $request){
        return view('delete_web');
    }
    public function delete_data(Request $request){
        $rating = Movie::where('userid', $request->input('userid'))->where('movieid', $request->input('movieid'));
        $rating->delete();
        return redirect()->action('App\Http\Controllers\NewsController@show_data');
    }
    public function index(){
        return view('index');
    }
    public function search_web($id){
        $rating = Movie::where('userid', $id)->get();
        return view('show_data', [
            'movie' => $rating,
        ]);
    }
    public function update_web($userid, $movieid, $rating){
        $upd = Movie::where('userid', $userid)->where('movieid', $movieid)->update(['rating'=>$rating]);
        $rating = Movie::where('userid', $userid)->where('movieid', $movieid)->where('rating', $rating)->get();
        if ($rating->count()==0) {
            return '此user, movie組合不存在';
        }
        else{
            return view('show_data', [
                'movie' => $rating,
            ]);
        }
    }
    public function hello_world(Request $request){
        $python_path=public_path () . '/hello.py';
        $movie = Movie::where('userid', $request->input('userid'))->get(['userid','movieid', 'rating', 'timestamp']);
        // Dump array with object-arrays
        $command = escapeshellcmd("python3 $python_path $movie");
        $output = shell_exec($command);

        $piece = explode(":", $output);
        #echo ($piece[count($piece)-1]);
        $pieces = explode(" ", $piece[count($piece)-1]);

        $pieces[count($pieces)-1] = substr($pieces[count($pieces)-1], 0, -1);
        #echo ($pieces[count($pieces)-2]);
        $movie1 = Movie::where('userid',$request->input('userid'))->where('movieid', $pieces[count($pieces)-2])->get();
        $movie2 = Movie::where('userid',$request->input('userid'))->where('movieid', $pieces[count($pieces)-1])->get();
        $movie = $movie1->concat($movie2);
        
        return view('show_data', [
            'movie' => $movie,
        ]);
        #return redirect()->action('App\Http\Controllers\NewsController@output_model');

    }

}

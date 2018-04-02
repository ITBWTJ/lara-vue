<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function gettime(){
        $start_time = explode(' ',microtime());
        $real_time = $start_time[1].substr($start_time[0],1);
        return $real_time;
    }

    public function test()
    {
        $start_time = $this->gettime();

        $array = array_fill(0, 1, 1);
//        $faker = (new Factory())->create();
        $count = 0;

//        Crud::first();
        foreach($array as $item) {

//                Post::create(['title' => $faker->name, 'body' => $faker->text]);
//            foreach($array as $item2) {
//                foreach($array as $item3) {
                    $count++;
//                }
//
//            }

        }
//        dd(Cache::get('posts'));
//        $posts = Post::all();
        if(Cache::has('posts')) {
            $posts = Cache::get('posts');
        } else {
            $posts = Post::all();
            Cache::put('posts', $posts, 60);
        }
//        $value = Cache::get('posts', function () {
//            return Post::all();
//        });

        $memoryBytes = memory_get_peak_usage();

        $stop_time = $this->gettime();
        $diff_time = bcsub($stop_time,$start_time,6);

        dd($count, $diff_time, ($memoryBytes / 1024 / 1024));
    }

    //results  1 000
    // #1 "0.000126" 7.8391494750977 -- "0.000131" float(0.36357116699219)
    // #2 "0.000138" 7.8391494750977 -- "0.000138" float(0.36357116699219)
    // #3 "0.000152" 7.8391494750977 -- "0.000090" float(0.36357116699219)

    //results 1 000 000
    // #1 "0.097907" 7.839485168457 -- "0.081966" float(0.36361694335938)
    // #2 "0.113655" 7.839485168457 -- "0.091232" float(0.36361694335938)
    // #3 "0.084862" 7.839485168457 -- "0.076613" float(0.36361694335938)

    //results 1000 000 000
    // #1 "102.712785" 7.8395004272461 -- "92.274279" float(0.36392211914062)

    // fetch 1 post 1000
    // #1 "1.716714" 8.8001174926758
    // #2 "1.778629" 8.8001174926758

    // fetch rand 1 post 1000
    // #1 "1.853754" 8.8012924194336
    // #2 "1.914014" 8.8012924194336

    // fetch 1000 posts 1
    // #1 "0.108554" 11.478454589844




    public function home()
    {
        return view('vueApp');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->only(['title', 'body']));

        return response()->json(['message' => 'OK', 'post' => $post], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();

        return response()->json(['message' => 'OK', 'data' => $post], 200);
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
        Post::where('id', $id)->update($request->all());

        return response()->json(['message' => 'OK'], 200);
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
}

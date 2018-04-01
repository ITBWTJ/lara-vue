<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parser;
use React\EventLoop\Factory as ReactFactory;
use Clue\React\Buzz\Browser;

class ParserController extends Controller
{
    public function parse()
    {
        $loop = ReactFactory::create();
        $client = new Browser($loop);

        $parser = new Parser($client, $loop);
        $parser->parse([
            'http://www.imdb.com/title/tt1270797/',
            'http://www.imdb.com/title/tt2527336/'
        ]);

        $loop->run();
        print_r($parser->getMovieData());
    }
}

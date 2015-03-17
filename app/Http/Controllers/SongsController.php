<?php namespace App\Http\Controllers;
use App\Song;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SongsController extends Controller {

	public function __construct(Song $song)
	{
		$this->song = $song;

	}

	//

	
	public function index()
	{
		$songs = $this->song->get();

		return view('songs.index', compact('songs'));
	}

    /**
     * Show a form to create a new song
     * @return \Illuminate\View\View
     */
    public function create(){
        return view('songs.create');

    }

    public function store(Requests\CreateSongRequest $request, Song $song){
        $song->create($request->all());
        return redirect()->route('songs_path');
    }

	public function show(Song $song)
	{

		return view('songs.show', compact('song'));

	}



	public function edit(Song $song)
	{

		return view('songs.edit', compact('song'));
	}

	public function update(Song $song, Requests\CreateSongRequest $request)
	{


		$song->fill($request->input())->save();

		return redirect('songs');
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll()
    {
        $bands = $this->getBands();
        return response()->json($bands);
    }

    public function getById($id)
    {
        $band = null;

        foreach ($this->getBands() as $_band) {
            if($_band['id'] == $id)
                $band = $_band;
        }

        return $band ? response()->json($band) : abort(code: 404);
    }

    public function getBandsByGenre($genre) 
    {
       
        $bands = [];

        foreach ($this->getBands() as $_band) {
            if($_band['genre'] == $genre) {
                $bands[] = $_band;
            }
                
        }

        return response()->json($bands);
    }

    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'id' => ['numeric'],
            'name' => ['required']
        ]);

        return response()->json($request->all());
    }

    protected function getBands()
    {
        return [
            ['id' => 1, 'name' => 'The Beatles', 'genre' => 'Rock', 'year_formed' => 1960],
            ['id' => 2, 'name' => 'Led Zeppelin', 'genre' => 'Rock', 'year_formed' => 1968],
            ['id' => 3, 'name' => 'Pink Floyd', 'genre' => 'Progressive Rock', 'year_formed' => 1965],
            ['id' => 4, 'name' => 'Queen', 'genre' => 'Rock', 'year_formed' => 1970],
            ['id' => 5, 'name' => 'Nirvana', 'genre' => 'Grunge', 'year_formed' => 1987],
            ['id' => 6, 'name' => 'Radiohead', 'genre' => 'Alternative Rock', 'year_formed' => 1985],
            ['id' => 7, 'name' => 'U2', 'genre' => 'Rock', 'year_formed' => 1976],
            ['id' => 8, 'name' => 'The Rolling Stones', 'genre' => 'Rock', 'year_formed' => 1962],
            ['id' => 9, 'name' => 'Metallica', 'genre' => 'Heavy Metal', 'year_formed' => 1981],
            ['id' => 10, 'name' => 'The Who', 'genre' => 'Rock', 'year_formed' => 1964],
        ];
    }
}

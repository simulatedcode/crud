<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArtistRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Artist $artist)
    {
        return Inertia::render('Admin/Artists/Index', [
            'artists' => Artist::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('firstname', 'like', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($artist) => [
                    'id' => $artist->id,
                    'firstname' => $artist->firstname,
                    'lastname' => $artist->lastname,
                    'is_active' => $artist->is_active,
                    'created_at' => $artist->created_at,
                    'updated_at' => $artist->updated_at,
                ]),
            'filters' => Request::only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Artists/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',

        ]);
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $bod = $request->input('bod');
        $dod = $request->input('dod');
        $is_active = $request->input('is_active');

        // prevent duplicate entries
        $artist = DB::table('artists')->where('firstname', $firstname)->where('lastname', $lastname)->first();
        if ($artist) {
            return redirect()->back()->with('error', 'Artist already exists');
        } else {
            $artist = new Artist();
            $artist->firstname = $request->input('firstname');
            $artist->lastname = $request->input('lastname');
            $artist->bod = $request->input('bod');
            $artist->dod = $request->input('dod');
            $artist->save();

            return Redirect::route('artists.index')->with('success', 'Artist created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return Inertia::render('Admin/Artists/Show', [
            'artist' => $artist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        $artist = Artist::find($artist->id);

        return inertia('Admin/Artists/Edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Artist $artist)
    {
        $artist->update([
            'firstname' => Request::input('firstname'),
            'lastname' => Request::input('lastname'),
            'is_active' => Request::input('is_active'),
            'bod' => Request::input('bod'),
            'dod' => Request::input('dod'),
        ]);

        return redirect()->route('artists.index', $artist->id)->with('update', 'Artist updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return Redirect::route('artists.index')->with('error', 'Artist deleted');
    }
}

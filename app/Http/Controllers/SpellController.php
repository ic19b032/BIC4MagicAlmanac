<?php

namespace App\Http\Controllers;

use App\Spell;
use Illuminate\Http\Request;

class SpellController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('spell.index', ['spells' => Spell::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spell.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spell = Spell::create($request->validate([
            'name' => 'required',
            'quote' => 'required',
            'description' => 'required',
            'kind_id' => 'required|exists:App\Kind,id'
        ]));

        $spell->{"message"} = "Spell successfully created!";

        return response($spell, 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Spell $spell
     * @return \Illuminate\Http\Response
     */
    public function show(Spell $spell)
    {
        return view('spell.show', compact('spell'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Spell $spell
     * @return \Illuminate\Http\Response
     */
    public function edit(Spell $spell)
    {
        return view('spell.edit', compact('spell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Spell $spell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spell $spell)
    {
        if ($spell->update($request->validate([
            'name' => 'required',
            'quote' => 'required|max:120',
            'description' => 'required',
            'kind_id' => 'required|exists:App\Kind,id'
        ])))
            return response(['message' => "Spell successfully updated!"], 200)
                ->header('Content-Type', 'application/json');
        else
            abort('500');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Spell $spell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spell $spell)
    {
        if ($spell->delete())
            return response(['message' => "Spell deleted!"], 200)
                ->header('Content-Type', 'application/json');
        else
            abort('500');
    }


    /**
     * Show form for searching.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('spell.search');
    }

    /**
     * Return search result.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
        $search = $request->validate([
            'q' => 'required'
        ])['q'];

        return Spell::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('quote', 'LIKE', "%{$search}%")
            ->orWhereHas('kind', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            })
            ->with('kind')
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response(Spell::all()->load('kind'), 200)->header('Content-Type', 'application/json');
    }
}

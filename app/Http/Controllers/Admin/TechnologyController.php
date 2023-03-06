<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Technology $technology)

    {
        return view('admin.technologies.create', ['technology' => new Technology() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60|min:1|unique:technologies,name',
            'text_color' => 'required',
            'bg_color' => 'required',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $technology = new Technology();
        $technology->fill($data);
        $technology->save();
        $technology->slug = $technology->slug . '-' . $technology->id;
        $technology->update();

        return redirect()->route('admin.technologies.index', compact('technology'))->with('message', "Technology  $technology->name has been created")->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name' => ['required','string', 'max:60', 'min:1', Rule::unique('technologies')->ignore($technology->id)],
            'text_color' => 'required',
            'bg_color' => 'required',
        ]);

        $data['slug'] = Str::slug($data['name']."-$technology->id");
        $technology->update($data);

        return redirect()->route('admin.technologies.index', compact('technology'))->with('message', "Technology  $technology->name has been edited")->with('alert-type', 'warning');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('message', "Technology  $technology->name has been deletd")->with('alert-type', 'danger');
    }
}

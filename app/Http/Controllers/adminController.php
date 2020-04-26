<?php

namespace App\Http\Controllers;

use App\bakery;
use App\category;
use Dotenv\Regex\Success;
use Illuminate\Http\Request;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = category::all();
        foreach ($category as $categor) {
            $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                ->paginate(5);
        }
        return view('admin', compact('bakery', 'category'));

        if ($request->search) {
            $category = category::all();
            foreach ($category as $categor) {
                $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->paginate(12);
            }
            return view('admin', compact('bakery', 'category'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->items) {
            $item = new bakery();
            $item->id_category = $request->id_category;
            $item->name = $request->name;
            $item->valume = $request->valume;
            $item->link = $request->link;
            $item->save();
            return redirect()->route('admin.store')->with('success', 'измененно');
        }

        if ($request->categorysy) {
            $new_category = new category();
            $new_category->name_category = $request->name_category;
            $new_category->link = $request->link;
            $new_category->save();
            return redirect()->route('admin.store')->with('success', 'измененно');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bakery = bakery::find($id);
        $category = category::find($id);
        return view('show', compact('bakery', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
            $category = category::find($id);
        
            $bakery = bakery::find($id);
        
        
        
        return view('edit', compact('bakery', 'category'));
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
        if ($request->categorys) {
            $update_category = category::find($id);
            $update_category->name_category = $request->name_category;
            $update_category->link = $request->link;
            $update_category->update();
            return redirect()->route('admin.store');
        }

        $bakery = bakery::find($id);
        $bakery->name = $request->name;
        $bakery->link = $request->link;
        $bakery->update();
        return redirect()->route('admin.store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bakery = bakery::find($id);
        $bakery->delete();
        return redirect()->route('admin.index');
    }
}

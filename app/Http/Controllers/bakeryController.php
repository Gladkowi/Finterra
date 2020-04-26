<?php

namespace App\Http\Controllers;

use App\bakery;
use App\category;
use App\Http\Requests\bakeryRequest;
use App\Http\Requests\bakeryRequestAdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bakeryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function productsCat(Request $request){
        echo $price = $request->price;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!isset($request->search) && !isset($request->sort)) {
            $category = category::all();
            foreach ($category as $categor) {
                $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                    ->paginate(8);
            }
            return view('bakery', compact('bakery', 'category'));
        }

        if ($request->search) {
            $category = category::all();
            foreach ($category as $categor) {
                $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->paginate(8);
            }
            return view('bakery', compact('bakery', 'category'));
        }

        if ($request->sort == 'val') {
            $category = category::all();
            foreach ($category as $categor) {
                $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                    ->orderBy('valume')
                    ->paginate(8);
            }
            return view('bakery', compact('bakery', 'category'));
        }

        if ($request->sort == 'val_desc') {
            $category = category::all();
            foreach ($category as $categor) {
                $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                    ->orderBy('valume', 'desc')
                    ->paginate(8);
            }
            return view('bakery', compact('bakery', 'category'));
        }

        if ($request->sort == 'name') {
            $category = category::all();
            foreach ($category as $categor) {
                $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                    ->orderBy('name')
                    ->paginate(8);
            }
            return view('bakery', compact('bakery', 'category'));
        }

        if ($request->sort == 'name_desc') {
            $category = category::all();
            foreach ($category as $categor) {
                $bakery[$categor->id] = bakery::where('id_category', 'like', $categor->id)
                    ->orderBy('name', 'desc')
                    ->paginate(8);
            }
            return view('bakery', compact('bakery', 'category'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->items)) {
            $item = new bakery();
            $item->id_category = $request->id_category;
            $item->name = $request->name;
            $item->valume = $request->valume;
            $link = $request->link;
            if (!empty($link)) {
                $item->link = $request->link;
            }
            $item->save();
            return redirect()->route('bakery.store');
        }
        if (isset($request->categorys)) {
            $new_category = new category();
            $new_category->name_category = $request->name_category;
            $link = $request->link;
            if (!empty($link)) {
                $new_category->link = $request->link;
            }
            $new_category->save();
            return redirect()->route('bakery.store');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bakery = bakery::find($id);
        return view('show', compact('bakery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showadd($id)
    {
        $category = category::find($id);
        return view('show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::all();
        $bakery = bakery::find($id);
        return view('edit', compact('bakery', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editadd($id)
    {
        $category = category::find($id);
        return view('editadd', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bakeryRequest $request, $id)
    {
        $bakery = bakery::find($id);
        $bakery->name = $request->name;
        $bakery->valume = $request->valume;
        $bakery->id_category = $request->id_category;
        $link = $request->link;
        if (!empty($link)) {
            $bakery->link = $request->link;
        }
        $bakery->update();
        return redirect()->route('bakery.store');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateadd(bakeryRequestAdd $request, $id)
    {
        $category = category::find($id);
        $category->name_category = $request->name;
        $link = $request->link;
        if (!empty($link)) {
            $category->link = $request->link;
        }
        $category->update();
        return redirect()->route('bakery.store');
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
        return redirect()->route('bakery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyadd($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->route('bakery.index');
    }
}

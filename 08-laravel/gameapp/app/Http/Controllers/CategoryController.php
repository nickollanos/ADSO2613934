<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = $request->file('image')->getClientOriginalName();

            // Define la ruta de destino
            $destinationPath = public_path('images/categories');

            // Mueve el archivo a la ruta de destino
            $photo->move($destinationPath, $photoName);
        } else {
            $photoName = 'categorie03.png';
        }
        $category = new Category;
        $category->name = $request->name;
        $category->image = $photoName;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->description = $request->description;
        
        
        $category->save();

        if($category->save()){
            return redirect('categories')->with('message', 'La categoría fue creada con éxito');
        }

        return redirect('categories')->with('message', 'No se pudo crear la categoría');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show')->with('category', $category);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($request->hasFile('image')) {
            if($request->hasFile('image')) {
                $photo =time() . '.'.$request->image->extension();
                $request->image->move(public_path('images'), $photo);
            }
        } else {
            $photo = $request->originphoto;
        }
        $category->image = $photo;
        $category->name = $request->name;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->description = $request->description;
        $category->save();

        if($category->save()){
            return redirect('categories')->with('message', 'La categoría fue actualizada con éxito');
        }

        return redirect('categories.show')->with('message', 'No se pudo actualizar la categoría');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect('categories')->with('message', 'La categoría fue eliminada con éxito');
        }

        return redirect('categories')->with('message', 'No se pudo eliminar la categoría');
    }

    public function search(Request $request)
    {
        $categories = Category::names($request->q)->paginate(3);
        return view('categories.search')->with('categories', $categories);
    }
}

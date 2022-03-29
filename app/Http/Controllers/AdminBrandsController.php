<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Keyword;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $keywords = Keyword::all();
        return view('admin.brands.create', compact('keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $brand = new Brand();
        $brand->name = $request->name;
        //$product->slug = Str::slug($product->name,'-');
        $brand->description = $request->description;
        // $product->user_id = Auth::user()->id;
        /**photo opslaan**/
        if($file = $request->file('photo_id')){
            /**wegschrijven naar de img folder**/
            $name = time(). $file->getClientOriginalName();
            $file->move('img/products/', $name);
            /**wegschrijven naar de photo table**/
            $photo = Photo::create(['file'=>$name]);
            $product['photo_id'] = $photo->id;
        }
        /** wegschrijven naar de post table **/
        $brand->save();

        /** de gekozen categoriëen wegschrijven naar de tussentabel category_post**/
        //$post->categories()->sync($request->categories, false);

        /*foreach($request->keywords as $keyword){
            $keywordfind = Keyword::findOrFail($keyword);
            //onderstaande lijn zorgt ervoor dat we via het model
            //van post, de methode keywords gebruiken.
            //de methode keywords bevat morphToMany.
            //morphToMany zorgt ervoor dat je kan wegschrijven in keywordables tabel
            $brand->keywords()->save($keywordfind);
        }*/
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

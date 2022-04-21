<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Keyword;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with(['brand', 'photo', 'keywords', 'productcategory'])->paginate(10);
        $brands = Brand::all();

        return view('admin.products.index', compact('products', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $keywords= Keyword::all();
        $productcategories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('keywords','brands', 'productcategories'));
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

        $product = new Product();
        $product->name = $request->name;
        //$product->slug = Str::slug($product->name,'-');
        $product->body = $request->body;
        $product->product_category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
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
        $product->save();

        /** de gekozen categoriëen wegschrijven naar de tussentabel category_post**/
        //$post->categories()->sync($request->categories, false);

        foreach($request->keywords as $keyword){
            $keywordfind = Keyword::findOrFail($keyword);
            //onderstaande lijn zorgt ervoor dat we via het model
            //van post, de methode keywords gebruiken.
            //de methode keywords bevat morphToMany.
            //morphToMany zorgt ervoor dat je kan wegschrijven in keywordables tabel
            $product->keywords()->save($keywordfind);
        }
        return redirect()->route('products.index');
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

    public function productsPerBrand($id)
    {
        $brands = Brand::all();
        $products = Product::where('brand_id', $id)->paginate(10);
        return view('admin.products.index', compact('products', 'brands'));
    }
}

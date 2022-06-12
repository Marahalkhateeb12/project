<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class adminPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products= Product::with('category')->get();
        // $categories= Category::with('products');

        $products= Category::Join('products', 'products.item_category_id', '=', 'categories.id')
        ->get(['*']);
        // $products= Product::Join('categories','products.item_category_id','=','categories.id')
        // ->limit(20)->get(['products.*', 'categories.category_name', 'categories.id']);
        
        return view('admin.products',compact('products'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.addProduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the input 
        $request->validate([
            'pname' => 'required',
            'pdescription' => 'required',
            'category'=>'required',
            'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);


         $product= new Product();

         $product->item_name=$request->input('pname');
         $product->item_description=$request->input('pdescription');
         
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/adminImage/', $filename);
            $product->item_image = $filename;
        }
       
        
            $product->item_category_id =$request->input('category');
         
        $product->save();


        return redirect()->route('product.index')->with('success','Product added successfully.');
    
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
        $product = Product::where('id', $id)->first();
        $categories=Category::all();
        return view('admin.editProduct',compact('product','categories'));
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
        $request->validate([
            'pname' => 'required',
            'pdescription' => 'required',
            'category'=>'required',
            'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $product = new Product();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('public/adminImage/', $filename);
            $product->user_image = $filename;
        }

        Product::where('id',$id)->update([
            'item_name'=>$request->pname,
            'item_description'=>$request->pdescription,
            'item_image'=>  $product->user_image,
            'item_category_id'=>$request->category
        ]);
        
         return redirect()->route('product.index')->with('success','Product updateded successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        $delete->delete();
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}

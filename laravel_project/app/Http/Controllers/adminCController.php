<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class adminCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $categories = Category::latest()->paginate(10);
        return view('admin.categories',compact('categories'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addCategory');
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
            'cname' => 'required',
            'cdescription' => 'required',
            'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);



        
         $category= new Category();

         $category->category_name=$request->input('cname');
         $category->category_description=$request->input('cdescription');
         
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/adminImage/', $filename);
            $category->category_image = $filename;
        }

        $category->save();


        return redirect()->route('category.index')->with('success','Category added successfully.');
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
        $category = Category::where('id', $id)->first();
        return view('admin.editCategory',compact('category'));
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
            //validate the input 
            $request->validate([
                'cname' => 'required',
                'cdescription' => 'required',
                'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);
    
            $category = new Category();
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('public/adminImage/', $filename);
                $category->category_image = $filename;
            }

            Category::where('id',$id)->update([
                'category_name'=>$request->cname,
                'category_description'=>$request->cdescription,
                'category_image'=> $category->category_image
            ]);
            
             return redirect()->route('category.index')->with('success','Category updateded successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::find($id);
        $delete->delete();
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}

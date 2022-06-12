<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Detail;
use Illuminate\Http\Request;

class adminUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User_Detail::Join('users', 'users.id', '=', 'user__details.user_detail_id')
        ->get(['*']);
        // $users= User::leftJoin('user__details', 'user__details.	user_detail_id ', '=', 'users.id')
        // ->get(['*']);
        // $users = User::latest()->paginate(20);
        // $userD=User::join('user__details','users.id','=','user__details.user_detail_id ');
        return view('admin.users', compact('users'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addUser');
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
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'location' => 'required',
            'mobile' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            //'image' => 'required'
        ]);
$fullName=$request->input('fname'.' '.'lfname');

        $user = new User();
        $userDetail = new User_Detail();


        $user->name = $fullName;
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('mobile');
        $user->location = $request->input('location');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('public/adminImage/', $filename);
            $userDetail->user_image = $filename;
        }

        $userDetail->user_name = $request->input('fname') . ' ' . $request->input('lfname');
        $userDetail->user_email = $request->input('email');
        $userDetail->password = $request->input('password');
        $userDetail->user_mobile = $request->input('mobile');
        $userDetail->user_address = $request->input('location');
       
        $user->save();

        $userDetail->user_detail_id = $user->id;

        $userDetail->save();


        return redirect()->route('user.index')->with('success', 'User added successfully.');
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
        $user = User::where('id', $id)->first();
        return view('admin.editUsers', compact('user'));
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
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'location' => 'required',
            'mobile' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            //'image' => 'required'
        ]);
        // $update=User::find($id);
        User::where('id', $id)->update([
            'name' => $request->fname,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->mobile,
            'location' => $request->location
        ]);

        $userDetail = new User_Detail();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('public/adminImage/', $filename);
            $userDetail->user_image = $filename;
        }
        User_Detail::where('user_detail_id', $id)->update([
            'user_name' => $request->fname,
            'user_email' => $request->email,
            'password' => $request->password,
            'user_mobile' => $request->mobile,
            'user_address' => $request->location,
            'user_image' => $userDetail->user_image
        ]);



        return redirect()->route('user.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}

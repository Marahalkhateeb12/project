<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class adminMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        $messages = Message::latest()->paginate(10);
        return view('admin.messages',compact('messages'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addMessage');
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
                'email' => 'required',
                'message' => 'required',
                'name'=>'required'
            ]);
    
    
             $message= new Message();
             $message->message_name=$request->input('name');
             $message->message_email=$request->input('email');
             $message->message=$request->input('message');
             
           
    
            $message->save();
    
    
            return redirect()->route('message.index')->with('success','Message added successfully.');
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
        $message = Message::where('id', $id)->first();
        return view('admin.editMessage',compact('message'));
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
            'email' => 'required',
            'message' => 'required',
            'name'=>'required'
        ]);

        Message::where('id',$id)->update([
            'message_name'=>$request->name,
            'message_email'=>$request->email,
            'message'=> $request->message
        ]);
        
         return redirect()->route('message.index')->with('success','Message updateded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Message::find($id);
        $delete->delete();
        return redirect()->route('message.index')
                        ->with('success','Message deleted successfully');
    }
}

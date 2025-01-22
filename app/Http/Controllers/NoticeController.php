<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function add(){
        return view("notice.add");
    }

    public function index(){
        $notice = Notice::all();
        return view("notice.index",["notice"=>$notice]);


    }
    public function create(Request $request){

        $notice=new Notice();
        $notice->title = $request->title;
        $notice->desc = $request->desc;
        $notice->domain = $request->domain;
        $notice->save();
        return redirect()->route("notice.index")->with("success","Task created successfully");

    }

    public function delete($id){
        $notice = Notice::findOrFail($id);
        $notice->delete();
        return redirect()->route('notice.index')->with('success', 'Task deleted successfully.');
    }
    public function edit($id){
        $notice = Notice::findOrFail($id);
        return view('notice.edit',compact('notice'));
    }

    public function update(Request $request,$id){
        $notice=Notice::findOrFail($id);
        $notice->title = $request->title;
        $notice->desc = $request->desc;
        $notice->domain = $request->domain;
        $notice->save();
        return redirect()->route('notice.index')->with('success','Task update successfully');

    }
}

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
        $this->renderNotice();

        return redirect()->route("notice.index")->with("success","Task created successfully");

    }

    public function delete($id){
        $notice = Notice::findOrFail($id);
        $notice->delete();
        $this->renderNotice();

        return redirect()->route('notice.index')->with('success', 'Task deleted successfully.');
    }
    public function edit($id){
        $notice = Notice::findOrFail($id);
        return view('notice.edit',compact('notice'));
    }

    public function update(Request $request,$id){
        $notice=Notice::findOrFail($id);
        if ($request->has('Status')) {

                if($notice->Status == 1) {
                $notice->Status = 0;
            } else {
                $notice->Status = 1;
            }
            $notice->save();

            return redirect()->route('notice.index')->with('success', 'Status updated successfully!');
        }
        $notice->title = $request->title;
        $notice->desc = $request->desc;
        $notice->domain = $request->domain;

        $notice->save();
        $this->renderNotice();
        return redirect()->route('notice.index')->with('success','Task update successfully');

    }

    function renderNotice(){
        $notices = Notice::where('Status',1)->get(['title','desc','domain']);
        $path = config('app.data_folder',base_path()).'/notice.php';       
        
        $data = "<?php\n\nreturn [\n";
        foreach($notices as $notice){
            $data .= "\t['title' => '".$notice->title."', 'desc' => '".$notice->desc."', 'domain' => '".$notice->domain."'],\n";
        }
        $data .= "];";
        file_put_contents($path, $data);
    }
}

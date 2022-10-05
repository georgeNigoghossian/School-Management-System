<?php
   
namespace App\Http\Controllers;
   
use App\Event;
use App\Models\ExamEvent;
use Illuminate\Http\Request;
use Redirect;
use Response;
   
class ExamEventController extends Controller
{
 
    public function index()
    {
        if(request()->ajax()) 
        {
            
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = ExamEvent::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        return view('admin.events.exam_event');
    }
    
   
    public function create(Request $request)
    {  
        
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = ExamEvent::insert($insertArr);   
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = ExamEvent::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = ExamEvent::where('id',$request->id)->delete();
   
        return Response::json($event);
    }    
 
 
}
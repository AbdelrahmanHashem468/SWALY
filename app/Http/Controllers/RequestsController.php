<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project_Request;
use App\project;
use App\User;
use Auth;
use App\Notification;

class RequestsController extends Controller
{
    public function send(Request $request)
    {
        $fetchedData = $request->all();
        if(!sizeof(Project_Request::getRequestByMDIdandProjectId(Auth::User()->id,$fetchedData['id'])))
        {       
            Project_Request::create([
                'MD_id'=> Auth::User()->id,
                'project_id'=> $fetchedData['id'],
                ]);
        }
        return back();
    }

    public function getAllRequest()
    {
        $fetchedData = Project_Request::getAllProjectRequested();
        //dd($fetchedData);
        return view('allrequest',compact('fetchedData'));
        
    }

    public function acceptrequest(Request $request)
    {
        $fetchedData=$request->all();
        //dd($fetchedData);

        $project=Project::find($fetchedData['project_id']);
        
        //dd($project);
        Project::where('id',$fetchedData['project_id'])
        ->update([
        'MD_id' => $fetchedData['MD_id']]);

        Notification::create([
            'from_id'=>Auth::User()->id,
            'to_id'=> $fetchedData['MD_id'],
            'read'=> 0,
            'type'=>1,
            'attachment'=> $fetchedData['project_id'],
            'massage' =>'Your Request of '. $project->project_name .' has been Approved',
        ]);

        Project_Request::where('project_id',$fetchedData['project_id'])->delete();
        return back();
    }


    
}

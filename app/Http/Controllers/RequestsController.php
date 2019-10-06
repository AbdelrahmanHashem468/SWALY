<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project_Trainees;
use App\Project_Request;
use App\Notification;
use App\project;
use App\User;
use Auth;

class RequestsController extends Controller
{

    public function allcurrentproject()
    {
        $projects = Project::all()->where('MD_id',null);
        return view('allcurrentprojects',compact('projects'));
    }


    public function allassignedproject()
    {
        $unread_projects = Notification::where('read',0)
        ->where('notifications.to_id','=',Auth::User()->id)
        ->get();
        $read_projects=Notification::getAllReadProjects();
        $teamleader = User::where('role',3)->get();
        $trainee = User::where('role',4)->get();
        return view('allassignedprojects',
        compact('unread_projects','read_projects','teamleader','trainee'));
    }


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
        return view('allrequest',compact('fetchedData'));
    }

    public function acceptrequest(Request $request)
    {
        $fetchedData=$request->all();
        $project=Project::find($fetchedData['project_id']);
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

    public function setmodule(Request $request)
    {
        $fetchedData = $request->all();
        Project::where('id',$fetchedData['project_id'])
        ->update([
            'MTL_id'=>$fetchedData['MTL_id'],
            'deadline' =>$fetchedData['Deadline'],
        ]);
        Project_Trainees::create([
            'project_id'=>$fetchedData['project_id'],
            'MTS_id'=>$fetchedData['MTS_id'],
        ]);

        Notification::where('attachment',$fetchedData['project_id'])
        ->update([
            'read'=>1,
        ]);

        return back();
    }


}

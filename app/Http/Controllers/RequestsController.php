<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project_Request;
use Auth;

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
}

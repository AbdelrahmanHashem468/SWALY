<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Project;
use App\Project_Trainees;
use App\User;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function test()
    {
        dd(Project::getAllProjectNotRequested());
    }
    public function index()
    {
        $projects = Project::getAllProjectNotRequested();
        $assigned_projects = Project::all()->where('MD_id',!null);
        return view('layouts.home',compact('projects','assigned_projects'));
    }
    

    public function allcurrentproject()
    {
        $projects = Project::all()->where('MD_id',null);

        return view('allcurrentprojects',compact('projects'));
    }

    public function allassignedproject()
    {
        $assigned_projects = Project::all()->where('MD_id',!null);

        return view('allassignedprojects',compact('assigned_projects'));
    }

    public function profile()
    {
        if( Auth::User()->role ==0||Auth::User()->role == 2||Auth::User()->role ==3 )
        {   
            $id=Auth::User()->id;
            $projects = Project::where('MD_id',$id)->orWhere('MTL_id',$id)->get();
            return view('layouts.admin,md,mtl-profile',compact('projects'));
        }

        elseif( Auth::User()->role ==1 )
        {
            $id=Auth::User()->id;
            $projects = Project::all()->where('customer_id',$id);
            return view('layouts.customer,mts-profile',compact('projects'));
        }

        elseif(Auth::User()->role ==4 )
        {
                $id=Auth::User()->id;
                $projects_id = Project_Trainees::where('MTS_id',$id)->get();
                $projects=[];
                foreach($projects_id as $index)
                {
                    $idd=$index->project_id;
                    $projects[]= Project::where('id',$idd)->get();  
                }
            return view('layouts.mtsprofile',compact('projects'));
        }

        else
            return redirect('layouts.home');
    }

    public function edit()
    {
        $id=Auth::User()->id;
        $user = User::find($id);
        return view('edit',compact('user'));
    }

    public function update(Request $request)
    {
        $id=Auth::User()->id;
        $user = User::find($id);

        $user->name = request('name');
        $user->email = request('email');
        $user->phonenumber = request('phonenumber');
        $user->image_name=$this->uplaodFile($request);
        if(request('password') !='')
            $user->password = Hash::make(request('password'));
        $user->save();

        return back();

    }

    private function uplaodFile(Request $request)
    {
        $name='';
        if ($request->hasFile('input_img'))
        {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
        }
        return $name;
    }
}

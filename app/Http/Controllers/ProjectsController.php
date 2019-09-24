<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project;
use Auth;
use App\User;

class ProjectsController extends Controller
{
    public function add(Request $request)
    {
        $fetchedData = $request->all();

        $this->valaidateRequest();

        $iscreated= Project::create([
            'customer_id'=> Auth::User()->id,
            'name'=>$fetchedData['name'],
            'desc'=>$fetchedData['desc'],
            'image_name'=>$this->uplaodFile($request),
        ])->wasRecentlyCreated;

        return redirect('/home')->with('iscreated',$iscreated) ;
    }


    private function valaidateRequest()
    {
        return request()->validate([
            'name'=> 'required|min:3',
            'desc'=> 'required',
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
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

    public static function getId()
    {
        $users = User::getAllCustomers();
        if(sizeof($users)>0)
            return $users[rand(0,sizeof($users)-1)]['id'];
    }

}

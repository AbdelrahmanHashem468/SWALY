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
        $name='';
        if ($request->hasFile('input_img'))
        {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
        }
        $iscreated= Project::create([
            'customer_id'=> Auth::User()->id,
            'name'=>$fetchedData['name'],
            'desc'=>$fetchedData['desc'],
            'image_name'=>$name,
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
}

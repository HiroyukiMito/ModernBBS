<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\User;
use App\Follow;
use App\Thread;

class ProfileController extends Controller
{
    public function add(){
        
        $user = Auth::user();
        $user_id = $user->id;
        $profile = Profile::where('user_id',$user_id)->get();
        
        if(!$profile->isEmpty()){
                return view('profile.error');
            }
            
        return view('profile.create');
        
    }
    
    public function create(Request $request){
        
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        unset($form['_token']);
        $user = Auth::user();
        $profile->user_id = $user->id;
        $profile->fill($form)->save();
        
        return redirect()->route('myprofile');
        
    }
    
        
    public function edit(Request $request){
        
        $user_id = Auth::user()->id;
        $profile = Profile::find($request->id);
        
        if (empty($profile)) {
        abort(404);    
        }
        
        return view('profile.edit', ['profile' => $profile]);
        
    }


    public function update(Request $request){
        
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();

        return redirect()->route('myprofile');
        
    }
    
    public function description(Request $request){
        
        $user = Auth::user();
        $user_id = $user->id;
        $profile = Profile::where('user_id',$user_id)->get();
        if($profile->isEmpty()){
            return redirect('bbs/profile/create');    
        }
        
        $profile = $profile[0];
        return view('profile.myprofile', ['profile' => $profile, 'user' => $user]);
        
    }
    
    public function get_profile(Request $request){
        
        $user_id = $request->id;
        $profile = Profile::where('user_id',$user_id)->get();
        $profile = $profile[0];
        $user = Auth::user();
        
        if($profile->user_id == $user->id){
            return redirect()->route('myprofile');
        }
        return view('profile.show', ['profile' => $profile,]);
        
}
    
    public function get_classmates(Request $request){
        
        $users = User::all();
        return view('profile.index', ['users' => $users]);
        
    }
    
    public function get_follows(Request $request){
        $user_id = Auth::id();
        $follows = Follow::where('user_id', $user_id)->get();
        return view('profile.follows', ['follows' => $follows]);
    }
    
    public function get_threads(Request $request){
        $user_id = Auth::id();
        $follows = Follow::where('user_id', $user_id)->get();
        $threads = [];
        foreach($follows as $follow){
            foreach($follow->threads as $thread){
            array_push($threads,$thread);
            }
        };
        return view('profile.mythreads', ['threads' => $threads, 'user_id' => $user_id]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Group;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\planning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->hasRole('Admin')) {

            $parents = Parents::latest()->get();
            $teachers = Teacher::latest()->get();
            $students = Student::latest()->get(); 

            return view('home', compact('parents','teachers','students'));

        } elseif ($user->hasRole('Teacher')) {

            $teacher = Teacher::with(['user'])->findOrFail($user->teacher->id);
            $numclass = planning::distinct()->where('teacher_id',$teacher->id)->count('class_id');
            $numsubj = planning::distinct()->where('teacher_id',$teacher->id)->count('subject_id');
            $classlist = planning::distinct()->where('teacher_id',$teacher->id)->get('group_id');
            //$grouplist = Group::distinct()->whereIn('id_class',$classlist)->get('id');
            $numstud = Student::whereIn('group_id',$classlist)->count(); 
//
            $m8=$m10=$m14=$m16=null;
            $t8=$t10=$t14=$t16=null;
            $w8=$w10=$w14=$w16=null;
            $th8=$th10=$th14=$th16=null;
            $f8=$f10=$f14=$f16=null; 
          
            $plannings = planning::where('teacher_id',$teacher->id)->get();
    
            foreach ($plannings as $p) {
                if ($p->day == 'Monday' && $p->time == '8:00/10:00') {
                    $m8 = $p;
                }
                if ($p->day == 'Monday' && $p->time == '10:00/12:00') {
                    $m10 = $p;
                }
                if ($p->day == 'Monday' && $p->time == '14:00/16:00') {
                    $m14 = $p;
                }
                if ($p->day == 'Monday' && $p->time == '16:00/18:00') {
                    $m16 = $p;
                }
                //
                if ($p->day == 'Tuesday' && $p->time == '8:00/10:00') {
                    $t8 = $p;
                }
                if ($p->day == 'Tuesday' && $p->time == '10:00/12:00') {
                    $t10 = $p;
                }
                if ($p->day == 'Tuesday' && $p->time == '14:00/16:00') {
                    $t14 = $p;
                }
                if ($p->day == 'Tuesday' && $p->time == '16:00/18:00') {
                    $t16 = $p;
                }
                //
                if ($p->day == 'Wednesday' && $p->time == '8:00/10:00') {
                    $w8 = $p;
                }
                if ($p->day == 'Wednesday' && $p->time == '10:00/12:00') {
                    $w10 = $p;
                }
                if ($p->day == 'Wednesday' && $p->time == '14:00/16:00') {
                    $w14 = $p;
                }
                if ($p->day == 'Wednesday' && $p->time == '16:00/18:00') {
                    $w16 = $p;
                }
                //
                if ($p->day == 'Thursday' && $p->time == '8:00/10:00') {
                    $th8 = $p;
                }
                if ($p->day == 'Thursday' && $p->time == '10:00/12:00') {
                    $th10 = $p;
                }
                if ($p->day == 'Thursday' && $p->time == '14:00/16:00') {
                    $th14 = $p;
                }
                if ($p->day == 'Thursday' && $p->time == '16:00/18:00') {
                    $th16 = $p;
                }
                //
                if ($p->day == 'Friday' && $p->time == '8:00/10:00') {
                    $f8 = $p;
                }
                if ($p->day == 'Friday' && $p->time == '10:00/12:00') {
                    $f10 = $p;
                }
                if ($p->day == 'Friday' && $p->time == '14:00/16:00') {
                    $f14 = $p;
                }
                if ($p->day == 'Friday' && $p->time == '16:00/18:00') {
                    $f16 = $p;
                }
            }
    
            $empty='nope';

            return view('home', compact('teacher','numclass','numsubj','numstud','empty','m8','m10','m14','m16',
            't8','t10','t14','t16','w8','w10','w14','w16','th8','th10','th14','th16','f8','f10','f14','f16'));

        } elseif ($user->hasRole('Parent')) {
            
            $parents = Parents::with(['children'])->withCount('children')->findOrFail($user->parent->id); 

            return view('home', compact('parents'));

        } elseif ($user->hasRole('Student')) {
            
            $student = Student::with(['user','parent','class','attendances'])->findOrFail($user->student->id); 

            return view('home', compact('student'));

        } else {
            return 'NO ROLE ASSIGNED YET!';
        } 
        
    }

    /**
     * PROFILE
     */
    public function profile() 
    {
        return view('profile.index');
    }

    public function profileEdit() 
    {
        return view('profile.edit');
    }

    public function profileUpdate(Request $request) 
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id()
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = str_slug(auth()->user()->name).'-'.auth()->id().'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }

        $user = auth()->user();

        $user->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        return redirect()->route('profile');
    }

    /**
     * CHANGE PASSWORD
     */
    public function changePasswordForm()
    {  
        return view('profile.changepassword');
    }

    public function changePassword(Request $request)
    {     
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            return back()->with([
                'msg_currentpassword' => 'Your current password does not matches with the password you provided! Please try again.'
            ]);
        }
        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            return back()->with([
                'msg_currentpassword' => 'New Password cannot be same as your current password! Please choose a different password.'
            ]);
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword'     => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        Auth::logout();
        return redirect()->route('login');
    }
}

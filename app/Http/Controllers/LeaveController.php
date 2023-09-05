<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Rased;
use App\Models\Lcrud;

class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
 
       
    }
    public function index($id)
    {
        // dd($id);
    
      
           $emp = Lcrud::where('id',$id)->first();
           
          $rasedd=Rased::where('employee_id', $id)->latest()->first();
        //   dd($rasedd);
        $leaves = Leave::where('employee_id', $id)->get();

        if ($leaves->count() > 0) {
            return view('crud.leaveindex')->with('leaves', $leaves)->with('rasedd',$rasedd)->with('emp',$emp);
        } else {
            return view('crud.leaveindex')->with('leaves', null);
        }



    }

    public function create($id)

    {
        $myid=$id;
 

        return view('crud.leavecreate',compact('myid'));
    

    }

    public function store(Request $request)
    {
        
        $request->validate([
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'leave_type'=>'required',
            'days'=>'required|numeric|min:1',
          

        ]);
        $input=$request->all();
        Leave::create($input);
        return redirect()->route('index')->with('success','تم اضافة الاجازة بنجاح!');
       
         
        }

        public function delete($id)
        {
            $lcrud=Leave::find($id);
            $lcrud->delete();
            return redirect()->route('index')
            ->with('success','تم حذف العنصر بنجاح!');
        //    return view('crud.create');
            
        }
        public function rcreate($id)

    {
        $myid=$id;
 

        return view('crud.rcreate',compact('myid'));
       

    }
    public function rstore(Request $request)
    {
        $request->validate([
            'rased'=>'required',
            'rasedm'=>'required',
          
          

        ]);
       
        $input=$request->all();
        Rased::create($input);
        return redirect()->route('index')->with('success','تم تحديث الرصيد بنجاح!');
       
         
        }
  
        
    }



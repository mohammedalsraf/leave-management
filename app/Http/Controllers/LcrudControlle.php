<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lcrud;

class LcrudControlle extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
 
       
    }
    public function index(){
        $emps = Lcrud::latest()->paginate(9); 
        return view('crud.index',compact('emps'));
       
      

    }

    public function show($id)
    {
        $emp= Lcrud::find($id);
         return view('crud.show', compact('emp'));
        
    }
    public function create()
    {
       return view('crud.create');
        
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'=>'required',
            'salary'=>'required|integer',
            'empnumber'=>'required',
            'gander'=>'required',
            'jd'=>'required',
            'ct'=>'required',
            'department'=>'required',
            'mstate'=>'required',
            'chnumber'=>'required',
            'phone'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2024'

        ]);
        $input=$request->all();
       
         if ($image = $request->file('image')) {
            $destanationPath = "images/";
            $newImgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destanationPath, $newImgName);
            $input['image'] = $newImgName;


        }
        Lcrud::create($input);

    return redirect()->route('index')->with('success','تم اضافة العنصر بنجاح!');

    
        

    //    return view('crud.create');
        
    }

    public function delete($id)
    {
        $lcrud=Lcrud::find($id);
        $lcrud->delete();
        return redirect()->route('index')
        ->with('success','تم حذف العنصر بنجاح!');
    //    return view('crud.create');
        
    }
    public function edit($id)
    {
        $emp=Lcrud::find($id);
       return view('crud.edit',compact('emp'));
        
    }
    public function update(Request $request,$id)
    {
        // dd($request);
        $request->validate([
            'name'=>'required',
            'salary'=>'required',
            'empnumber'=>'required',
            'gander'=>'required',
            'jd'=>'required',
            'ct'=>'required',
            'department'=>'required',
            'mstate'=>'required',
            'chnumber'=>'required',
            'phone'=>'required',
            // 'image'=>'required|image|mimes:png,jpg,jpeg|max:2024'

        ]);
        $input=$request->all();
        // dd( $input);
         if ($image = $request->file('image')) {
            $destanationPath = "images/";
            $newImgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destanationPath, $newImgName);
            $input['image'] = $newImgName;


        }else{
            unset($input['image']);
        }
        $emp=Lcrud::find($id);
        $emp->update($input);

       

    return redirect()->route('index')->with('success','تم التحديث العنصر بنجاح!');

    
        

  
        
    }
    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    if($keyword!=""){
        $emps = Lcrud::where('name', 'LIKE', "%$keyword%")
        ->orWhere('empnumber', 'LIKE', "%$keyword%")->latest()
        ->paginate(10);

    return view('crud.index', compact('emps'));

    }else{
        return redirect()->route('index');
    }

    // Use the where method to filter products based on the keyword.
    
}
    //
}

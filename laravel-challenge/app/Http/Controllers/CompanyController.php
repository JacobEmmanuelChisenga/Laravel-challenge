<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Company;

use Illuminate\Support\Facades\Storage;


use Session;
class CompanyController extends Controller

{
    public function index(){
        // create company object
        // $company = new Company();
        // $company->name = 'Jacob';
        // $company->email = 'Jacob@gmail.com';
        // $company->website = 'www.Jacob.com';
        // $company->save();
        //$company = Company::all();

        //return $company;
        //$com = Company::select('name', 'email', 'website')->paginate(10);
        
        $companies = new Company();
        $companies = Company::all();
        $companies = DB::table('companiesdb')->paginate(10);
        //dd($companies);
        return view('administrator.company.index',compact('companies'));
    }

    public function create(){
        return view('administrator.company.create'); 
    }

    public function store(Request $request){
        
        //dd(request()->all());


        $request->validate([
            'name' => 'required',
            'email'=> 'required'
        ]);
       
        if($request->hasFile('logo')){
            
            $file  = request('logo');
            $fileName = $file->store('public/companyImages'); 
            
            //$file = $request->logo->getClientOriginalName();
            //$request->logo->storeAs('images', $file,'public');
            //$request->session()->flash('message','Image upload successful');
            //return redirect()->back();//success upload
         }else {
             $fileName = '';
         }

    //    $data = [
    //     'name' => $request->input('name'),
    //     'email' => $request->input('email'),
    //     'website' => $request->input('website'),
    //     'logo'=>$request->input('logo')
    //   ];



      $company = new Company();
      $company->name = request('name');
      $company->email = request('email');
      $company->website = request('website');
      $company->logo = $fileName;
      $company->save();
      //dd($company);



     //Company::create($data);
     $company = Company::all();
    
      //dd($data);

        // $company  = new Company();
        // $company->name =$request->name;
        // $company->email =$request->email;
        // $company->website =$request->website;
        // $company->logo = $request->logo;
        
        // $company->save();

        
        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'New company record created');
        return redirect()->route('company');
    }
    public function show($id)
    {
      $company = Company::find($id);
      //dd($company);
      return view('administrator.company.create',compact('company')); 
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $company = Company::find($id);
        //dd($company);
        return view('administrator.company.edit',compact('company'));
    }

    public function update(Request $request){
           $id = $request->id;
           $validate = $request->validate([
               'name' => 'required',
               'email'=> 'required'
           ]);
           $input = [
               'name' => $request->input('name'),
               'email' => $request->input('email'),
               'website' => $request->input('website')
             ];

           $oldCompanyRecord = Company::find($id);
           $oldCompanyRecord->update($input);
           //dd($oldCompanyRecord);
           Session::flash('alert-class', 'alert-success');
           Session::flash('message', 'Company record has been updated');
           return redirect()->route('company');
    }
  
    public function deletecompany($id){

        $oldCompanyRecord = Company::find($id);
        Storage::delete('public/companyImages/'.$oldCompanyRecord->logo);
        $oldCompanyRecord->delete();
       return redirect()->route('company');
    }

}
<?php

namespace App\Http\Controllers;

use App\Company;
use App\Project;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if(auth::check()){
        $companies = Company::where('user_id', auth::user()->id)->get();
        return view('companies.index',['companies'=>$companies]);
    }
    return view('auth.login');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth::check()){
            $company = Company::create([
                'name'=>$request->input('name'),
                'decription'=>$request->input('decription'),
                'user_id'=>auth::user()->id
            ]);

            if($company){
                return redirect()->route('companies.show',['company'=>$company->id])->with('success','Company created successfully');
            }
            return back()->withInput()->with('errors','Error creating new company');
        }else{
            return back()->with('errors','You must be logged in to create a Company');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::where('id', $company->id)->first();
        //$projects= Project::find($company->company_id)->all();
  $projects= DB::select("SELECT * FROM projects WHERE company_id ='".$company->id."' ");

       return view('companies.show', ['company' => $company, 'projects' => $projects]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::where('id', $company->id)->first();
        return view('companies.edit', ['company' => $company]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $companyUpade = Company::WHERE('id',$company->id)
        ->update([
            'name'=>$request->input('name'),
            'decription'=>$request->input('decription')
        ]);
        if($companyUpade){
            return redirect()->route('companies.show',['company'=>$company->id])
            ->with('success','Company updated successfully');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //dd($company);
        $findCompany = Company::find($company->id);
        if($findCompany->delete()){
         return  redirect()->route('companies.index')
         ->with('success','Company deleted successfully');
        }
return back()->with('error','Company could not deleted');
    
    }
}

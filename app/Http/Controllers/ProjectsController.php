<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use DB;
class ProjectsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if(auth::check()){
        $projects = Project::where('user_id', auth::user()->id)->get();
        return view('projects.index',['projects'=>$projects]);
    }
    return view('auth.login');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        $companies = null;
        if(!$company_id){
            $companies=Company::where('user_id', auth::user()->id)->get();
        }
    return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);
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
            $project = Project::create([
                'name'=>$request->input('name'),
                'decription'=>$request->input('decription'),
                'company_id'=>$request->input('company_id'),
                'user_id'=>auth::user()->id,
                ]);

            if($project){
                return redirect()->route('projects.show',['project'=>$project->id])->with('success','project created successfully');
            }
            return back()->withInput()->with('errors','Error creating new project');
        }else{
            return back()->with('errors','You must be logged in to create a project');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
     $projects = Project::find($project->id);
        //$projects= Project::find($project->project_id)->all();
        //$projects= DB::select("SELECT * FROM projects WHERE id ='".$project->id."' ");
        //$comments=Comment::where('commentable_id', $project->id)->get();
        $comments = $projects->comments;
        return view('projects.show', ['projects' => $projects,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        $project = Project::where('id', $project->id)->first();
        return view('projects.edit', ['project' => $project]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $projectUpade = Project::WHERE('id',$project->id)
        ->update([
            'name'=>$request->input('name'),
            'decription'=>$request->input('decription')
        ]);
        if($projectUpade){
            return redirect()->route('projects.show',['project'=>$project->id])
            ->with('success','project updated successfully');
        }
        return back()->withInput();
    }

    public function adduser()
    {
            //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //dd($project);
        $findproject = Project::find($project->id);
        if($findproject->delete()){
         return  redirect()->route('projects.index')
         ->with('success','project deleted successfully');
        }
return back()->with('error','project could not deleted');
    
    }
}

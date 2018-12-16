<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App\MaritalStatus;
use DB;
class StudentController extends Controller
{
    public function index()
    {
        $mstatuses = MaritalStatus::pluck('maritalStatus','id');
        return view('ajax.index', compact('mstatuses'));
    }


    public function readData()
    {
        $students = Student::join('subjects','students.id','=','subjects.student_id')
        ->selectRaw('subjects.name, students.firstname,
        students.middlename,students.lastname,students.email,students.phone,
        students.stdaddress,students.maritalstatus,students.created_at,id
        CONCAT(students.firstname,"  ",students.middlename,"  ",students.lastname) AS fullname, students.id
        ')->get();
        return view('ajax.studentList',compact('students'));
        //return response($students);
    }
    // $students = DB::select('SELECT * FROM students');
    //     return response($students);

    public function store(Request $request)
    {
        if($request->ajax()){
            $students = Student::create($request->all());
            
            return response($this->find($students->id));
            //return response($request->all());
        }
    }
    public function find($id){
  return Student::join('subjects','students.id','=','subjects.student_id')
        ->selectRaw('subjects.name, students.firstname,
        students.middlename,students.lastname,students.email,students.phone,
        students.stdaddress,students.maritalstatus,students.created_at,
        CONCAT(students.firstname,"  ",students.middlename,"  ",students.lastname) AS fullname, students.id
        ')
        ->where('students.id',$id)->first();
    }
    public function destroy(Request $request){
        if($request->ajax()){
            Student::destroy($request->id);
            return response(['message'=>'student deleted successfully']);
        }
    }

    public function edit(Request $request){
        if($request->ajax()){
        $students = Student::find($request->id);
        return response($students);
        }
    }

    public function update(Request $request)
    {
        if($request->ajax()){

            $students = Student::find($request->id);
          $students->update($request->all());
            return response($request->all());

        }
    }
}

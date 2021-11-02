<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index() {
        $departments = Department::paginate(10);

        return view('admin.departments',["departments"=>$departments]);
    }

    public function edit(Request $request) {

        $department = Department::find($request->id);

        if(isset($request->name)) {
            $department->name = $request->name;
            $department->save();
            return redirect()->route('departments');
        } else {
            return view('admin.department.edit',['department'=>$department]);
        }
    }

    public function delete($id) {
        $department = Department::find($id);
        $department->delete();

        return redirect('admin/departments');
    }
}

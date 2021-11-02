<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index() {
        $jobs = Job::paginate(10);

        return view('admin.jobs',["jobs"=>$jobs]);
    }

    public function edit(Request $request) {

        $job = Job::find($request->id);

        if(isset($request->title) && isset($request->description)) {
            $job->title = $request->title;
            $job->description = $request->description;
            $job->min_salary = $request->min_salary;
            $job->mas_salary = $request->mas_salary;
            $job->save();
            return redirect()->route('jobs');
        } else {
            return view('admin.job.edit',['job'=>$job]);
        }
    }

    public function delete($id) {
        $job = Job::find($id);
        $job->delete();

        return redirect('admin/jobs');
    }
}

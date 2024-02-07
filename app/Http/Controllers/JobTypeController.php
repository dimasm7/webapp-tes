<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobTypeRequest;
use App\Http\Requests\UpdateJobTypeRequest;
use App\Repositories\JobTypeRepository;

class JobTypeController extends Controller
{
    private $jobTypeRepository;
    public function __construct(JobTypeRepository $jobTypeRepo){
        $this->jobTypeRepository = $jobTypeRepo;
    }
    public function index(){
        $jobTypes =  $this->jobTypeRepository->getAll();
        return view('job_types.index', compact('jobTypes'));
    }
    public function create(){
        return view('job_types.create');
    }
    public function store(CreateJobTypeRequest $request){
        $this->jobTypeRepository->store($request->all());
        return redirect(route('job-types.index'))->with('status', 'Successfully created job type.');
    }
    public function show($id){
        $jobType = $this->jobTypeRepository->find($id);
        return view('job_types.show', compact('jobType'));
    }
    public function edit($id){
        $jobType = $this->jobTypeRepository->find($id);
        return view('job_types.edit', compact('jobType'));
    }
    public function update(UpdateJobTypeRequest $request, $id){
        $jobType = $this->jobTypeRepository->find($id);

        if (empty($jobType)) return redirect(route('job-types.index'))->with('status', 'Job type not found.');

        $this->jobTypeRepository->update($request->all(),$id);
        return redirect(route('job-types.index'))->with('status', 'Successfully updated job type.');
    }
    public function destroy($id){
        $jobType = $this->jobTypeRepository->find($id);

        if (empty($jobType)) return redirect(route('job-types.index'))->with('status', 'Job type not found.');

        $this->jobTypeRepository->delete($id);
        return redirect(route('job-types.index'))->with('status', 'Job type has been deleted successfully');
    }
}

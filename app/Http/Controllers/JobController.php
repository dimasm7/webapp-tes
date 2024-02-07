<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Repositories\JobRepository;
use App\Repositories\JobTypeRepository;

class JobController extends Controller
{
    private $jobRepository;
    private $jobTypeRepository;
    public function __construct(JobRepository $jobRepo, JobTypeRepository $jobTypeRepo){
        $this->jobRepository = $jobRepo;
        $this->jobTypeRepository = $jobTypeRepo;
    }
    public function index(){
        $jobs =  $this->jobRepository->getAll();
        return view('jobs.index', compact('jobs'));
    }
    public function create(){
        $types = $this->jobTypeRepository->pluck('name','id');
        return view('jobs.create',compact('types'));
    }
    public function store(CreateJobRequest $request){
        $this->jobRepository->store($request->all());
        return redirect(route('jobs.index'))->with('status', 'Successfully created job.');
    }
    public function show($id){
        $job = $this->jobRepository->find($id);
        return view('jobs.show', compact('job'));
    }
    public function edit($id){
        $job = $this->jobRepository->find($id); 
        $types = $this->jobTypeRepository->pluck('name','id');        
        return view('jobs.edit', compact('job','types'));
    }
    public function update(UpdateJobRequest $request, $id){
        $job = $this->jobRepository->find($id);

        if (empty($job)) return redirect(route('jobs.index'))->with('status', 'Job not found.');

        $this->jobRepository->update($request->all(),$id);
        return redirect(route('jobs.index'))->with('status', 'Successfully updated job.');
    }
    public function destroy($id){
        $job = $this->jobRepository->find($id);

        if (empty($job)) return redirect(route('jobs.index'))->with('status', 'Job not found.');

        $this->jobRepository->delete($id);
        return redirect(route('jobs.index'))->with('status', 'Job has been deleted successfully');
    }
}

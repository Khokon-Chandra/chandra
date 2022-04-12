<?php

namespace App\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Project;
use khokonc\mvc\Request;
use khokonc\mvc\Session;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return view('project.index', [
         'pageTitle'=>'Project List',
         'projects' =>app(Project::class)->all()
        ]);
    }

    public function search(Request $request):String
    {
        return view('project._list', [
            'projects' =>app(Project::class)->all()
        ]);
    }


    public function create(): string
    {
        return view('project.create');
    }


    public function store(Request $request)
    {
        $attribute = $request->validate([
            'name' => 'required',
            'code' => 'required|projects:unique'
        ]);

        app(Project::class)->create($attribute);
        (new Session())->setFlashMessage('success','Successfully project created');
        redirect(route('projects.index'));

    }

    public function show(Request $request,$id)
    {
        return view('project.show');
    }


    public function edit(Request $request, $id)
    {
        return $id;
    }


    public function update($id)
    {

    }


    public function destroy($id)
    {
        return 'delete';
    }
}

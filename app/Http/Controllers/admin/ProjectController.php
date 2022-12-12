<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::where("name", "like", "%".$request->q."%")
                           ->orWhere("detail", "like", "%".$request->q."%")
                           ->orderBy("id", "DESC")->paginate(4);

        return view('admin.project.index', ["projects" => $projects]);
    }

    public function new()
    {
        return view('admin.project.new', ["project" => Project::all()]);
    }

    public function create(Request $request)
    {
        $project = new Project;
        $project->name = $request->name;
        $project->detail = json_encode([$request->detail, $request->detail2]);

        if($request->hasFile('project_img'))
        {
            $file = $request->project_img;
            $filename = 'project-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/project', $filename);
            $project_img = $filename;
        }
        else
        {
            $project_img = 'no-img.jpg';
        }

        if($request->hasFile('project_img2'))
        {
            $file = $request->project_img2;
            $filename = 'project-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/project', $filename);
            $project_img2 = $filename;
        }
        else
        {
            $project_img2 = 'no-img.jpg';
        }
        $project->img = json_encode([$project_img, $project_img2]);
        $project->save();

        return redirect('admin/project')->with(["message" => "Tạo dự án thành công!"]);
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return view('admin.project.edit', ['project' => $project]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->detail = json_encode([$request->detail, $request->detail2]);

        if($request->hasFile('project_img'))
        {
            $file = $request->project_img;
            $filename= 'project-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/project', $filename);
            $project_img = $filename;
        }
        else
        {
            $project_img = json_decode($project->img)[0];
        }

        if($request->hasFile('project_img2'))
        {
            $file = $request->project_img2;
            $filename= 'project-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/project', $filename);
            $project_img2 = $filename;
        }
        else
        {
            $project_img2 = json_decode($project->img)[1];
        }
        $project->img = json_encode([$project_img, $project_img2]);
        $project->save();

        return redirect('admin/project')->with('message', 'Đã sửa dự án thành công');
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if ($project)
        {
            $project->delete();
            return redirect('admin/project')->with('message', 'Xóa dự án thành công');
        }
        else
        {
            return redirect('admin/project')->withErrors(["Bản ghi không tồn tại!"]);
        }
    }
}

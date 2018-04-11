<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Comment;
use App\Department;
use Charts;
use DB;

class ReportController extends Controller
{
    public function ideaDepartment()
    {
        $deparment = Department::where('status', 1);
        $ideas =  DB::table('ideas as i')
                    ->select(DB::raw('count(i.id) as ideas'))
                    ->addSelect('d.name as department')
                    ->join('users as u', 'u.id', '=', 'i.user_id')
                    ->join('students as s', 'u.id', '=', 's.user_id')
                    ->join('departments as d', 's.dep_id', '=', 'd.id')
                    ->groupBy('s.dep_id')
                    ->get();
       
        
        $numberOfIdea = Charts::create('bar', 'highcharts')
                ->title('Number of Idea made by each Department')
                ->elementLabel("Total Idea")
                ->labels($ideas->pluck('department'))
                ->values($ideas->pluck('ideas'))
                
                ->responsive(false);

        $percentageOfIdea = Charts::create('pie', 'highcharts')
                ->title('Percentage of Idea made by each Department')
                ->elementLabel("Total Idea")
                ->labels($ideas->pluck('department'))
                ->values($ideas->pluck('ideas'))
                
                ->responsive(false);
               

        return view ('backend.pages.report.departmentIdea', compact('numberOfIdea','percentageOfIdea'));
    }

    public function contributeDepartment()
    {

        $contributors =  DB::table('ideas as i')
                    ->select(DB::raw('count(DISTINCT i.user_id) as contributor'))
                    ->addSelect('d.name as department')
                    ->join('users as u', 'u.id', '=', 'i.user_id')
                    ->join('students as s', 'u.id', '=', 's.user_id')
                    ->join('departments as d', 's.dep_id', '=', 'd.id')
                    ->groupBy('s.dep_id')
                    ->get();
       
        
        $numberOfContributor = Charts::create('bar', 'highcharts')
                ->title('Contributor of each Department')
                ->elementLabel("Total Contributor")
                ->labels($contributors->pluck('department'))
                ->values($contributors->pluck('contributor'))
                
                ->responsive(false);

               

        return view ('backend.pages.report.departmentContributor', compact('numberOfContributor'));
    }

    public function anynomousIdea(){

        $title = 'Anonymous Idea';
        $ideas = Idea::where('name', 'anynomous')->latest()->get();
        
        return view ('backend.pages.report.anynomous_idea', compact('ideas', 'title'));
    }
    public function anynomousComment(){

        $title = 'Anonymous Comment';
        $comments = Comment::where('name', 'anynomous')->latest()->get();
        
        return view ('backend.pages.report.anynomous_comment', compact('comments', 'title'));
    }
}

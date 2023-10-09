<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Branch;
use App\Models\KeyStage;
use App\Models\Paper;
use App\Models\ScienceType;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function saveImage($image)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/images'), $filename);
        return 'images/' . $filename;
    }
    public function __construct()
    {
        $branch = Branch::all();
        View::share('branch', $branch);
        $year = Year::all();
        View::share('year', $year);
        $keyStage = KeyStage::all();
        View::share('keyStage', $keyStage);
        $subject = Subject::all();
        View::share('subject', $subject);
        $board = Board::all();
        View::share('board', $board);
        $scienceType = ScienceType::all();
        View::share('scienceType', $scienceType);
        $paper = Paper::all();
        View::share('paper', $paper);
    }
}

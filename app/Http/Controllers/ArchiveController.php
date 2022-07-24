<?php

namespace App\Http\Controllers;

use App\pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index()
    {
        $years = pdf::select(DB::raw('YEAR(created_at) as year'))
                ->whereMonth('created_at', '<', Carbon::now())
                ->groupBy('year')
                ->get();

        return view('archive.index', compact('years'));
    }

    public function showyear($year)
    {
        $years = pdf::whereYear('created_at', $year)->whereMonth('created_at', '<', Carbon::now())->get();

        return view('archive.year', compact('years'));
    }
}

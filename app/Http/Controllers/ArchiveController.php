<?php

namespace App\Http\Controllers;

use App\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index()
    {
        $years = pdf::select(DB::raw('YEAR(created_at) as year'))
                ->groupBy('year')
                ->get();

        return view('archive.index', compact('years'));
    }

    public function showyear($year)
    {
        $years = pdf::whereYear('created_at', $year)->get();

        return view('archive.year', compact('years'));
    }
}

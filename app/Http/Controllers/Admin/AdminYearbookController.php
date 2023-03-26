<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminYearbookController extends Controller
{
    public function index()
    {
        $pdfs = pdf::orderBy('created_at', 'desc')->paginate();
        return view('admin.yearbook.index', compact('pdfs'));
    }

    public function create()
    {
        return view('admin.yearbook.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pdf' => 'required|mimes:pdf',
        ]);

        if($validate->fails()) {
            return back()->with('status', 'Dokumen harus berformat PDF');
        }
        $file = $request->file('pdf');
        $newFileName = time().'.pdf';

        pdf::create([
            'name' => $request->name,
            'url'  => $newFileName,
            'uploaded_by' => Auth::user()->id
        ]);

        $file->storeAs('/public/pdf/', $newFileName);

        return redirect(route('admin.yearbook.index'));
    }

    public function destroy($id)
    {
        pdf::findOrFail($id)->delete($id);
        return back()->with('status', 'Dokumen berhasil dihapus');
    }
}

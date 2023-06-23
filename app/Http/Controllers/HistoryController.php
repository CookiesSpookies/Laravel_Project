<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Exports\ExportHistory;
use App\Imports\HistoryImport;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use \Barryvdh\DomPDF\Facade\Pdf;

class HistoryController extends Controller
{
    //Show All History
    public function index(){
        return view('history.index',[
            'histories' => History::latest()->paginate(5)
        ]);
    }

    //Show Create Form
    public function create()
    {
        return view('history.create');
    }

    //Show Edit Form
    public function edit(History $history){
        return view('history.edit',['history' => $history]);
    }

    //Store History Data
    public function store(Request $request){
        $formField = $request->validate([
            'kode_toko_baru' => ['required', Rule::unique('histories','kode_toko_baru')],
            'kode_toko_lama' => 'required',
        ]);
        History::create($formField);
        return redirect('/history')->with('message','History created successfully!');
    }

    //Update History Data
    public function update(Request $request, History $history){
        $formField = $request->validate([
            'kode_toko_baru' => 'required',
            'kode_toko_lama' => 'required',
        ]);
        $history->update($formField);
        return redirect('/history')->with('message','History updated successfully!');
    }

    //Delete History Data
    public function destroy(History $history){
        $history->delete();
        return redirect('/history')->with('message','History deleted successfully');
    }
    public function fileImport(Request $request){
       // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_history di dalam folder public
		$file->move('file_history',$nama_file);

		// import data
		Excel::import(new HistoryImport, public_path('/file_history/'.$nama_file));

		// alihkan halaman kembali
		return redirect('/history')->with('message','Importing history successfully!');
    }

    public function fileExport(Request $request){
        return Excel::download(new ExportHistory, 'History.xlsx');
    }

    public function createPDF()
    {
        $history = History::all();
        //view
        $pdf = PDF::loadView('history.pdf', ['histories'=>$history]);
        // download PDF file with download method
        return $pdf->download('pdf_file_history.pdf');
    }

}

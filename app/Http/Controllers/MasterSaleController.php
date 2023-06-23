<?php

namespace App\Http\Controllers;

use App\Exports\ExportMasterSale;
use App\Imports\MasterSaleImport;
use App\Models\MasterSale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class MasterSaleController extends Controller
{
    //Show All Maste Sale Data
    public function index(){
        return view('master_sale.index',[
            'master_sales' => MasterSale::latest()->paginate(5)
        ]);
    }

    //Show Create Form
    public function create()
    {
        return view('master_sale.create');
    }

    //Show Edit Form
    public function edit(MasterSale $master_sale){
        return view('master_sale.edit',['master_sale' => $master_sale]);
    }

    //Store Master Sale Data
    public function store(Request $request){
        $formField = $request->validate([
            'kode_sales' => ['required', Rule::unique('master_sales','kode_sales')],
            'nama_sales' => 'required',
        ]);
        MasterSale::create($formField);
        return redirect('/master_sale')->with('message','Master sale created successfully!');
    }

    //Update Master Sale Data
    public function update(Request $request, MasterSale $master_sale){
        $formField = $request->validate([
            'kode_sales' => 'required',
            'nama_sales' => 'required',
        ]);
        $master_sale->update($formField);
        return redirect('/master_sale')->with('message','Master sale updated successfully!');
    }

    //Delete Master Sale Data
    public function destroy(MasterSale $master_sale){
        $master_sale->delete();
        return redirect('/master_sale')->with('message','Master sale deleted successfully');
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

         // upload ke folder file_master_sale di dalam folder public
         $file->move('file_master_sale',$nama_file);

         // import data
         Excel::import(new MasterSaleImport, public_path('/file_master_sale/'.$nama_file));

         // alihkan halaman kembali
         return redirect('/master_sale')->with('message','Importing master sales successfully!');
     }

     public function fileExport(Request $request){
         return Excel::download(new ExportMasterSale, 'Master_Sales.xlsx');
     }

     public function createPDF()
     {
         $master_sale = MasterSale::all();
         //view
         $pdf = Pdf::loadView('master_sale.pdf', ['master_sales'=>$master_sale]);
         // download PDF file with download method
         return $pdf->download('pdf_file_master_sale.pdf');
     }
}

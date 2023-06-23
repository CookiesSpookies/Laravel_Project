<?php

namespace App\Http\Controllers;

use App\Exports\ExportAreaSale;
use App\Imports\AreaSaleImport;
use App\Models\AreaSale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class AreaSaleController extends Controller
{
    //Show All Area Sale
    public function index(){
        return view('area_sale.index',[
            'area_sales' => AreaSale::latest()->paginate(5)
        ]);
    }

    //Show Create Form
    public function create()
    {
        return view('area_sale.create');
    }

    //Show Edit Form
    public function edit(AreaSale $area_sale){
        return view('area_sale.edit',['area_sale' => $area_sale]);
    }

    //Store Area Sale Data
    public function store(Request $request){
        $formField = $request->validate([
            'kode_toko' => ['required', Rule::unique('area_sales','kode_toko')],
            'area_sale' => 'required',
        ]);
        AreaSale::create($formField);
        return redirect('/area_sale')->with('message','Area Sale created successfully!');
    }

    //Update Area Sale Data
    public function update(Request $request, AreaSale $area_sale){
        $formField = $request->validate([
            'kode_toko' => 'required',
            'area_sale' => 'required',
        ]);
        $area_sale->update($formField);
        return redirect('/area_sale')->with('message','Area Sale updated successfully!');
    }

    //Delete Area Sale Data
    public function destroy(AreaSale $area_sale){
        $area_sale->delete();
        return redirect('/area_sale')->with('message','Area Sale deleted successfully');
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

         // upload ke folder file_area_sale di dalam folder public
         $file->move('file_area_sale',$nama_file);

         // import data
         Excel::import(new AreaSaleImport, public_path('/file_area_sale/'.$nama_file));

         // alihkan halaman kembali
         return redirect('/area_sale')->with('message','Importing area sales successfully!');
     }

     public function fileExport(Request $request){
         return Excel::download(new ExportAreaSale, 'Area_Sales.xlsx');
     }

     public function createPDF()
     {
         $area_sale = AreaSale::all();
         //view
         $pdf = Pdf::loadView('area_sale.pdf', ['area_sales'=>$area_sale]);
         // download PDF file with download method
         return $pdf->download('pdf_file_area_sale.pdf');
     }
}

<?php

namespace App\Http\Controllers;

use App\Imports\TransactionImport;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\ExportTransaction;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    //Show All Transaction
    public function index(){
        return view('transaction.index',[
            'transactions' => Transaction::orderBy('id', 'ASC')->paginate(5)
        ]);
    }

    //Show Create Form
    public function create()
    {
        return view('transaction.create');
    }

    //Show Edit Form
    public function edit(Transaction $transaction){
        return view('transaction.edit',['transaction' => $transaction]);
    }

    //Store Transaction Data
    public function store(Request $request){
        $formField = $request->validate([
            'kode_toko' => ['required', Rule::unique('transactions','kode_toko')],
            'nominal_transaksi' => 'required',
        ]);
        Transaction::create($formField);
        return redirect('/transaction')->with('message','Transaction created successfully!');
    }

    //Update Transaction Data
    public function update(Request $request, Transaction $transaction){
        $formField = $request->validate([
            'kode_toko' => 'required',
            'nominal_transaksi' => 'required',
        ]);
        $transaction->update($formField);
        return redirect('/transaction')->with('message','Transaction updated successfully!');
    }

    //Delete Transaction Data
    public function destroy(Transaction $transaction){
        $transaction->delete();
        return redirect('/transaction')->with('message','Transaction deleted successfully');
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

         // upload ke folder file_transaction di dalam folder public
         $file->move('file_transaction',$nama_file);

         // import data
         Excel::import(new TransactionImport, public_path('/file_transaction/'.$nama_file));

         // alihkan halaman kembali
         return redirect('/transaction')->with('message','Importing transaction successfully!');
     }

     public function fileExport(Request $request){
         return Excel::download(new ExportTransaction, 'Transaction.xlsx');
     }

     public function createPDF()
     {
         $transaction = Transaction::all();
         //view
         $pdf = Pdf::loadView('transaction.pdf', ['transactions'=>$transaction]);
         // download PDF file with download method
         return $pdf->download('pdf_file_transaction.pdf');
     }
}

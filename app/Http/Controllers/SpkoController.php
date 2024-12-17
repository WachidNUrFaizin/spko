<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spko;
use App\Models\Employee;
use App\Models\Product;
use App\Models\SpkoItem;
use Illuminate\Support\Facades\DB;

class SpkoController extends Controller
{
    public function index()
    {
        $spkos = Spko::with('employeeRelation')->get();
        return view('layouts.index', compact('spkos'));
    }

    public function create()
    {
        $employees = Employee::all();
        $products = Product::all();
        $processes = ['Cor','Brush','Bombing','Slep'];
        return view('layouts.create', compact('employees','products','processes'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'employee' => 'required|exists:employees,id_employee',
            'trans_date' => 'required|date',
            'process' => 'required|in:Cor,Brush,Bombing,Slep',
            'items.*.id_product' => 'required|exists:products,id_product',
            'items.*.qty' => 'required|integer|min:1',
        ]);

        // Generate Nomor SPKO misalnya: SPKO22 04 001
        // Kita asumsikan format SPKO{YY}{MM}{XXX}
        // Contoh: Tahun 2022, Bulan 04, No urut 001
        // Anda dapat menyesuaikan logika berikut:
        $year = date('y', strtotime($request->trans_date));
        $month = date('m', strtotime($request->trans_date));
        $count = Spko::whereYear('trans_date', date('Y', strtotime($request->trans_date)))
                ->whereMonth('trans_date', date('m', strtotime($request->trans_date)))->count() + 1;
        $no_urut = str_pad($count, 3, '0', STR_PAD_LEFT);
        $sw = "SPKO".$year.$month.$no_urut;

        DB::beginTransaction();
        try {
            $spko = Spko::create([
                'remarks' => $request->remarks,
                'employee' => $request->employee,
                'trans_date' => $request->trans_date,
                'process' => $request->process,
                'sw' => $sw,
            ]);

            // Simpan item
            foreach($request->items as $i => $itemData){
                SpkoItem::create([
                    'idm_spko' => $spko->id_spko,
                    'ordinal' => $i+1,
                    'id_product' => $itemData['id_product'],
                    'qty' => $itemData['qty']
                ]);
            }

            DB::commit();
            return redirect()->route('layouts.index')->with('success','SPKO created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit($id_spko)
    {
        $spko = Spko::with('items.product')->findOrFail($id_spko);
        $employees = Employee::all();
        $products = Product::all();
        $processes = ['Cor','Brush','Bombing','Slep'];
        return view('layouts.edit', compact('spko','employees','products','processes'));
    }

    public function update(Request $request, $id_spko)
    {
        $spko = Spko::findOrFail($id_spko);

        $request->validate([
            'employee' => 'required|exists:employees,id_employee',
            'trans_date' => 'required|date',
            'process' => 'required|in:Cor,Brush,Bombing,Slep',
            'items.*.id_product' => 'required|exists:products,id_product',
            'items.*.qty' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $spko->update([
                'remarks' => $request->remarks,
                'employee' => $request->employee,
                'trans_date' => $request->trans_date,
                'process' => $request->process,
                // sw tidak diubah, karena biasanya nomor SPKO unik
            ]);

            // Hapus items lama lalu insert ulang (atau update secara detail)
            SpkoItem::where('idm_spko', $spko->id_spko)->delete();
            foreach($request->items as $i => $itemData){
                SpkoItem::create([
                    'idm_spko' => $spko->id_spko,
                    'ordinal' => $i+1,
                    'id_product' => $itemData['id_product'],
                    'qty' => $itemData['qty']
                ]);
            }

            DB::commit();
            return redirect()->route('layouts.index')->with('success','SPKO updated successfully!');
        } catch(\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id_spko)
    {
        $spko = Spko::findOrFail($id_spko);
        $spko->delete();
        return redirect()->route('layouts.index')->with('success','SPKO deleted successfully!');
    }

    public function print($id_spko)
    {
        $spko = Spko::with('employeeRelation','items.product')->findOrFail($id_spko);
        // Anda dapat membuat view khusus untuk print, atau generate PDF menggunakan dompdf
        // Misal:
        $pdf = \PDF::loadView('layouts.print', compact('spko'));
        return $pdf->stream('spko_'.$spko->id_spko.'.pdf');
    }
}

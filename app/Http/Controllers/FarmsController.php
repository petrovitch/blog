<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\GlcoaEditFormRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use TCPDF;
use Toastr;

class FarmsController extends Controller
{
    public function index()
    {
        $farms = Farm::sortable()->paginate(env('FARM_PAGINATION_MAX'));
        return view('farms.index')->with('farms', $farms);
    }

    public function create()
    {
        return view('farms.create');
    }

    public function store(Request $request)
    {
        $farm = new Farm(array(
            'farm' => $request->get('farm'),
            'street' => $request->get('street'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'zip' => $request->get('zip'),
        ));
        $farm->save();
        Toastr::success('Farm created.');
        return redirect('/farms');
    }

    public function show($id)
    {
        $farm = Farm::whereId($id)->firstOrFail();
        return view('farms.show')->with('farm', $farm);
    }

    public function edit($id)
    {
        $farm = Farm::whereId($id)->firstOrFail();
        return view('farms.edit')->with('farm', $farm);
    }

    public function update(Request $request, $id)
    {
        $farm = Farm::whereId($id)->firstOrFail();
        $farm->farm = $request->get('farm');
        $farm->street = $request->get('street');
        $farm->city = $request->get('city');
        $farm->state = $request->get('state');
        $farm->zip = $request->get('zip');
        $farm->save();
        Toastr::success('Farm updated.');
        return redirect(action('FarmsController@index', $farm->$farm));
    }

    public function destroy($id)
    {
        Farm::find($id)->delete();
        $farms = Farm::orderBy('farm')->paginate(env('FARM_PAGINATION_MAX'));
        return view('farms.index')->with('farms', $farms);
    }

    public function excel()
    {
        $table = with(new Farm)->getTable();
        $data = DB::select(DB::raw("SELECT * FROM $table"));
        $data = json_encode($data);
        SELF::data2excel('Excel', 'Sheet1', json_decode($data, true));
    }

    public function data2excel($excel, $sheet, $data)
    {
        $this->excel = $excel;
        $this->sheet = $sheet;
        $this->data = $data;
        Excel::create($this->excel, function ($excel) {
            $excel->sheet('Sheetname', function ($sheet) {
                $sheet->appendRow(array_keys($this->data[0])); // column names
                foreach ($this->data as $field) {
                    $sheet->appendRow($field);
                }
            });
        })->export('xlsx');
    }

    public function html2pdf($html)
    {
        $font_size = 8;
        $pdf = new TCPDF();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetFont('times', '', $font_size, '', 'default', true);
        $pdf->AddPage("L");
        $pdf->writeHTML($html);
        $filename = '/report.pdf';
        $pdf->Output($filename, 'I');
    }
}
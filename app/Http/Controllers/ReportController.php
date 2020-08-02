<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $reports = Report::where('author_id', $id)->get();
        return view('reports.index',compact('reports'));
    }

    /**
     * Display a counts of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function many()
    {
        $reports = Report::all();
        $many = Report::all()->count();
        $drenagem_urbana = Report::where('drenagem_urbana','1')->count();
        $agua_potavel = Report::where('agua_potavel','1')->count();
        $coleta_tratamento_esgoto = Report::where('coleta_tratamento_esgoto','1')->count();
        $coleta_residuos_solidos = Report::where('coleta_residuos_solidos','1')->count();
        return view('home',compact('many','drenagem_urbana','agua_potavel','coleta_tratamento_esgoto','coleta_residuos_solidos' , 'reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'author_id' => 'required',
        ]);
        if ($request->has("drenagem_urbana")){$request->merge(["drenagem_urbana" => true,]);}
        if ($request->has("agua_potavel")){$request->merge(["agua_potavel" => true,]);}
        if ($request->has("coleta_tratamento_esgoto")){$request->merge(["coleta_tratamento_esgoto" => true,]);}
        if ($request->has("coleta_residuos_solidos")){$request->merge(["coleta_residuos_solidos" => true,]);}


        $address = "";
        if ($request->input('rua') != null) {$address .= "".$request->input('rua');}
        if ($request->input('numero')!= null) {$address .= ",".$request->input('numero');}
        if ($request->input('bairro')!= null) {$address .= ",".$request->input('bairro');}
        if ($request->input('cep')!= null) {$address .= ",".$request->input('cep');}
        if ($request->input('cidade')!= null) {$address .= ",".$request->input('cidade');}
        if ($request->input('estado')!= null) {$address .= ",".$request->input('estado');}
        $cord = \App\geo::localiza($address);
          
        if($cord != 1){
            $request->merge(["lat" => $cord['lat'],]);
            $request->merge(["lng" => $cord['lng'],]);
        }

        Report::create($request->all());

        return redirect()->route('reports.index')->with('success','Report created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('reports.show',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('reports.edit',compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'author_id' => 'required',
        ]);
        if ($request->has("drenagem_urbana")){$request->merge(["drenagem_urbana" => true,]);}
        if ($request->has("agua_potavel")){$request->merge(["agua_potavel" => true,]);}
        if ($request->has("coleta_tratamento_esgoto")){$request->merge(["coleta_tratamento_esgoto" => true,]);}
        if ($request->has("coleta_residuos_solidos")){$request->merge(["coleta_residuos_solidos" => true,]);}

        $address = "";
        if ($request->input('rua') != null) {$address .= "".$request->input('rua');}
        if ($request->input('numero')!= null) {$address .= ",".$request->input('numero');}
        if ($request->input('bairro')!= null) {$address .= ",".$request->input('bairro');}
        if ($request->input('cep')!= null) {$address .= ",".$request->input('cep');}
        if ($request->input('cidade')!= null) {$address .= ",".$request->input('cidade');}
        if ($request->input('estado')!= null) {$address .= ",".$request->input('estado');}
        $cord = \App\geo::localiza($address);
          
        if($cord != 1){
            $request->merge(["lat" => $cord['lat'],]);
            $request->merge(["lng" => $cord['lng'],]);
        }
        
        $report->update($request->all());

        return redirect()->route('reports.index')
                        ->with('success','Report updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')
                        ->with('success','Report deleted successfully');
    }
}

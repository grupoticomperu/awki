<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Zona;
use Carbon\Carbon;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Support\Facades\Storage;


class ClienteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create','store');
        $this->middleware('can:admin.clientes.edit')->only('edit','update');
        $this->middleware('can:admin.clientes.destroy')->only('destroy');
        $this->middleware('can:admin.clientes.show')->only('show');
        
    }





    public function index()
    {

        //if(auth()->user()->id == 1 or auth()->user()->id == 2) {
        if(auth()->user()->id == 1) {    
            $clientes = Cliente::all();
        }else{
            $clientes = Cliente::where('user_id', auth()->user()->id)->get();
        }
   
        return view('admin.clientes.index', compact('clientes'));
    }

  
    public function create()
    {
        //$categories = Category::all();
         $users = User::pluck('name', 'id');
         $zonas = Zona::pluck('name', 'id');
 
         return view('admin.clientes.create', compact('users', 'zonas'));
    }

   
    public function store(Request $request)
    {
     
        
        $this->validate($request, [
            'nombres' => 'required'
        ]);

        $cliente = Cliente::create([
            //$request->only('title')
            'nombres' => $request->get('nombres')
            //'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.clientes.edit', compact('cliente'));




       
    /*   
        $this->validate($request, [
            'nombres' => 'required'
        ]);

        $cliente = Cliente::create([
            //$request->only('title')
            'dni' => $request->get('dni'),
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'user_id' => $request->get('user_id'),
            'zona_id' => $request->get('zona_id'),
        ]);

        return redirect()->route('admin.clientes.index', $cliente);
    */

    }

  
    public function show(Cliente $cliente)
    {
        return view('admin.clientes.show', compact('cliente'));
    }

  
    public function edit(Cliente $cliente)
    {


        //$this->authorize('update', $post);
       // $this->authorize('view', $post);

       $users = User::all();
       $zonas = Zona::all();
       return view('admin.clientes.edit',compact('cliente','users','zonas'));



       // $this->authorize('author', $post);

      //  $categories = Category::pluck('name', 'id');
      //  $tags = Tag::all();

       // return view('admin.clientes.edit', compact('cliente'));
    }


    public function update(Cliente $cliente, StoreClienteRequest $request)
    {
       
       //$cliente = Cliente::findorFail($cliente->id);

       $cliente->nombres = $request->get('nombres');
       $cliente->dni = $request->get('dni');

       $cliente->user_id = $request->get('user_id');
       $cliente->zona_id = $request->get('zona_id');
       $cliente->tipodocumento = $request->get('tipodocumento');
       $cliente->numdocumento = $request->get('numdocumento');

       $cliente->fechadeventa =  $request->has('fechadeventa')?Carbon::parse($request->get('fechadeventa')):null;
       $cliente->fechaderecepcion =  $request->has('fechaderecepcion')?Carbon::parse($request->get('fechaderecepcion')):null;
       $cliente->estadocivil = $request->get('estadocivil');
       $cliente->pagoadministrativo = $request->get('pagoadministrativo');
       $cliente->marca = $request->get('marca');
       $cliente->modelo = $request->get('modelo');
       $cliente->chasis = $request->get('chasis');
       $cliente->motor = $request->get('motor');
       $cliente->color = $request->get('color');
       $cliente->dua = $request->get('dua');
       $cliente->item = $request->get('item');
       $cliente->tipovehiculo = $request->get('tipovehiculo');
       $cliente->tipoventa = $request->get('tipoventa');
       $cliente->montodelacompra = $request->get('montodelacompra');
       $cliente->observacion = $request->get('observacion');


       if($request->file('file')){
            $urlpdf1 = Storage::put('public/pdf1', $request->file('file'));
            if($cliente->pdf1){
                Storage::delete($cliente->urlpdf1);
                $cliente->pdf1 = $urlpdf1;

            }else{

                $cliente->pdf1 = $urlpdf1;
            }

        }


        if($request->file('file2')){
            $urlpdf2 = Storage::put('public/pdf2', $request->file('file2'));
            if($cliente->pdf2){
                Storage::delete($cliente->urlpdf2);
                $cliente->pdf2 = $urlpdf2;
    
            }else{
    
                $cliente->pdf2 = $urlpdf2;
            }
        }



        if($request->file('file3')){
            $urlpdf3 = Storage::put('public/pdf3', $request->file('file3'));
            if($cliente->pdf3){
                Storage::delete($cliente->urlpdf3);
                $cliente->pdf3 = $urlpdf3;
    
            }else{
    
                $cliente->pdf3 = $urlpdf3;
            }
        }


        $cliente->fechaingrespsunarp =  $request->has('fechaingrespsunarp')?Carbon::parse($request->get('fechaingrespsunarp')):null;

        $cliente->numerodetitulo = $request->get('numerodetitulo');
        $cliente->codigoverificacion = $request->get('codigoverificacion');
        $cliente->recibo = $request->get('recibo');

   
        $cliente->importepagado = $request->get('importepagado');
        $cliente->oficinaregistral = $request->get('oficinaregistral');
     
        if($request->file('pdfstatus')){
            $pdfstatus = Storage::put('public/pdfstatus', $request->file('pdfstatus'));
            if($cliente->pdfstatus){
                Storage::delete($cliente->pdfstatus);
                $cliente->pdfstatus = $pdfstatus;
    
            }else{
    
                $cliente->pdfstatus = $pdfstatus;
            }
        }


        $cliente->fechadeobservacion =  $request->has('fechadeobservacion')?Carbon::parse($request->get('fechadeobservacion')):null;
        $cliente->fechadevencimiento =  $request->has('fechadevencimiento')?Carbon::parse($request->get('fechadevencimiento')):null;

        if($request->file('pdfobservacion')){
            $pdfobservacion = Storage::put('public/pdfobservacion', $request->file('pdfobservacion'));
            if($cliente->pdfobservacion){
                Storage::delete($cliente->pdfobservacion);
                $cliente->pdfobservacion = $pdfobservacion;
    
            }else{
    
                $cliente->pdfobservacion = $pdfobservacion;
            }
        }


        $cliente->fechaingresolevantaobservacion =  $request->has('fechaingresolevantaobservacion')?Carbon::parse($request->get('fechaingresolevantaobservacion')):null;

        if($request->file('pdftarjetadepropiedad')){
            $pdftarjetadepropiedad = Storage::put('public/pdftarjetadepropiedad', $request->file('pdftarjetadepropiedad'));
            if($cliente->pdftarjetadepropiedad){
                Storage::delete($cliente->pdftarjetadepropiedad);
                $cliente->pdftarjetadepropiedad = $pdftarjetadepropiedad;
    
            }else{
    
                $cliente->pdftarjetadepropiedad = $pdftarjetadepropiedad;
            }
        }


        $cliente->numerodeplaca = $request->get('numerodeplaca');


        $cliente->fechadepagodeplaca =  $request->has('fechadepagodeplaca')?Carbon::parse($request->get('fechadepagodeplaca')):null;
        $cliente->fechaderecojodeplaca =  $request->has('fechaderecojodeplaca')?Carbon::parse($request->get('fechaderecojodeplaca')):null;
        $cliente->fechadeenviodeplaca =  $request->has('fechadeenviodeplaca')?Carbon::parse($request->get('fechadeenviodeplaca')):null;



        $cliente->guiaderemision = $request->get('guiaderemision');
        $cliente->statusfinal = $request->get('statusfinal');




       $cliente->save();


      // return redirect()->route('admin.clientes.edit', $cliente)->with('flash', 'Tu publicación fue guardada Con éxito');
       //return redirect()->route('admin.clientes.edit', $cliente)->with('flash', 'Tu publicación fue guardada Con éxito');
       return back()->with('info','El Cliente fue actualizado Con éxito');

    }


    public function destroy(Cliente $cliente)
    {
       // $this->authorize('author', $post);
        
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('info', 'El Cliente se elimino con exito');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MosqueDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user()->id;
        return view('pages.mosque-document',[
            'auth'=>$auth
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id'=> Auth::user()->id,
            'land_title_deed' => $request->file('land_title_deed')->store('assets/mosque/document/', 'public'),
            'mosque_design' => $request->file('mosque_design')->store('assets/mosque/design/', 'public'),
    ];
        
        MosqueDocument::create($data);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(MosqueDocument $mosqueDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MosqueDocument $mosqueDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueDocument $mosqueDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueDocument $mosqueDocument)
    {
        //
    }
}

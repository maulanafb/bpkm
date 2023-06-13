<?php

namespace App\Http\Controllers;

use App\Models\MosqueDocument;
use App\Models\User;
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
        $user = Auth::user()->mosque_document;
        $coba = MosqueDocument::all()->first();

        $mosque = User::all()->first();
        $auth = Auth::user()->id;
        return view('pages.profile.dashboard-document',[
            'auth'=>$auth,
            'mosque'=>$mosque,
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueDocument $mosqueDocument,$id)
    {
        $data = $request->all();
        $item = MosqueDocument::findOrFail($id);

        if(isset($data['land_title_deed'])){
            $data['land_title_deed'] = $request->file('land_title_deed')->store('assets/mosque', 'public');
        }

        if(isset($data['mosque_design'])){
            $data['mosque_design'] = $request->file('mosque_design')->store('assets/mosque', 'public');

        }
        $item->update($data);

        return redirect()->route('mosque-document-edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueDocument $mosqueDocument)
    {
        //
    }
}

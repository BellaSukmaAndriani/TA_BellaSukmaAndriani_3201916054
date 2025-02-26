<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // pesan
    public function store(Request $request)
    {
        $contact = [
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->isi,
        ];
        Contact::create($contact);
        return redirect()->route('contact.create')->with(
            'success',
            'Pesan Berhasil Dikrimkan'
        );
    }
    public function create()
    {
        return view('home.contact');
    }

    public function index()
    {
        $dc = Contact::all();
        return view('admin.kelola-hub-kami.index', compact('dc'));
    }
    public function destroy($id)
    {
        $data = Contact::where('id', $id)->first();
        $data->delete();
        return redirect()->route('contact.index')->with(
            'success',
            'Berhasil Dihapus'
        );
    }
}

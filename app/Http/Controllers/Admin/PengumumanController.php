<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UploadService;
use App\Services\SummernoteService;
use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    private $summernoteService;
    private $uploadService;

    public function __construct(SummernoteService $summernoteService, UploadService $uploadService)
    {
        $this->summernoteService = $summernoteService;
        $this->uploadService = $uploadService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::with(['user'])->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'judul' => 'required',
                'Gambar' => 'image|file',
                'deskripsi' => 'required',
            ]
        );


        if ($request->file('Gambar')) {
            $saveImg =  $request->file('Gambar')->store('post-images');
            $nameImg = str_ireplace("public/", "", $saveImg);
            $validateData['Gambar'] = $nameImg;
        }
        $validateData['user_id'] = auth()->user()->id;
        $validateData['slug'] = Str::slug($request->judul);
        $validateData['tgl'] = date('Y-m-d');
        // $request->request->add([
        //     'slug' => Str::slug($request->judul),
        //     'tgl' => date('Y-m-d'),
        //     'user_id' => auth()->user()->id,
        //     'Gambar' => $this->uploadService->imageUpload('artikel'),
        // ]);
        Pengumuman::create($validateData);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::find($id);
        $update = [];

        if ($request->has('Gambar')) {

            $filepath = public_path() . '/storage//' . $pengumuman->Gambar;
            unlink($filepath);
            $filename = 'post-images/' . $request->file('Gambar')->hashName();
            $request->file('Gambar')->storeAs('public/', $filename);
            $pengumuman->update([
                'judul' => $request->judul,
                'Gambar' => $filename,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'tgl' => date('Y-m-d'),
                'user_id' => auth()->user()->id,
            ]);
        } else {
            $pengumuman->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'tgl' => date('Y-m-d'),
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect()->route('admin.pengumuman.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $this->authorize('delete', $pengumuman);

        $pengumuman->delete();
        return redirect()->route('admin.pengumuman.index')->with('success', 'Data berhasil dihapus');
    }
}

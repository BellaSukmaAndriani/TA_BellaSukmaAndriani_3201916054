<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{

    public function index()
    {
        $eb = Ebook::all();
        return view('admin.kelola-ebook-kitab-ulama.index', compact('eb'));
    }
    public function tambahdata()
    {
        return view('admin.kelola-ebook-kitab-ulama.create');
    }
    public function prosesdata(Request $request)
    {
        $date = new DateTime();
        $filename = $date->getTimestamp() . $request->file('file')->getClientOriginalName();
        $covername = $date->getTimestamp() . $request->file('cover')->getClientOriginalName();
        $request->file('file')->storeAs('public/ebook', $filename);
        $request->file('cover')->storeAs('public/ebook/covers', $covername);

        $ebook = [
            'judul' => $request->judul,
            'file' => $filename,
            'cover' => $covername
        ];
        Ebook::create($ebook);

        return redirect('admin/kelola-ebook-kitab-ulama')->with(
            'success',
            'Berhasil Ditambahkan'
        );
    }
    public function destroy($id)
    {
        $data = Ebook::where('id', $id)->first();
        $filepath = public_path() . '/storage/ebook/' . $data->file;
        $filecover = public_path() . '/storage/ebook/covers/' . $data->cover;
        unlink($filepath);
        unlink($filecover);
        $data->delete();
        return redirect()->route('kelola-ebook')->with(
            'success',
            'Berhasil Dihapus'
        );
    }
    public function update(Request $request, $id)
    {
        $file = Ebook::find($id);
        $update = [];
        $date = new DateTime();
        if ($request->has('file')) {

            $filepath = public_path() . '/storage/ebook/' . $file->file;
            unlink($filepath);
            $filename = $date->getTimestamp() . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/ebook', $filename);
            $update['file'] = $filename;
        }
        if ($request->has('cover')) {

            $coverpath = public_path() . '/storage/ebook/covers/' . $file->cover;
            unlink($coverpath);
            $covername = $date->getTimestamp() . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->storeAs('public/ebook/covers/', $covername);
            $update['cover'] = $covername;
        }
        $update['judul'] = $request->judul;

        $file->update($update);
        return redirect('admin/kelola-ebook-kitab-ulama')->with(
            'success',
            'Berhasil Diubah'
        );
    }
    public function edit($id)
    {
        $ebookbyid = Ebook::find($id);
        return view('admin.kelola-ebook-kitab-ulama.edit', compact('ebookbyid'));
    }
}

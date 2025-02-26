<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KategoriDonasi;
use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\Jenis;
use DateTime;
use Illuminate\Support\Facades\Date;

class DonasiController extends Controller
{
    public function index()
    {
        return view('admin.kelola-donasi.index', [
            'daftardonasi' =>  Donasi::all()
        ]);
        // $daftardonasi= Donasi::latest()->get()->all();
        // return view('admin.kelola-donasi.index',compact('daftardonasi'));
    }

    public function create()
    {
        return view('admin.kelola-donasi.create', [
            'daftardonasi' => Donasi::all()
        ]);   
    }

    public function created()
    {
        return view('admin.kelola-donasi.pengeluaran.create', [
            'daftardonasi' => Donasi::all()
        ]);
    }
    public function creates()
    {
        return view('donasi.index', [
            'daftardonasi' => Donasi::all(),
            'katDonasi' => KategoriDonasi::all()
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate(
            [
                'judul' => 'required',
                'gambar' => 'image|file'
            ]
        );
        // if ($request->file('gambar')) {
        //     $saveImg =  $request->file('gambar')->store('donasi-img');
        //     $nameImg = str_ireplace("public/", "", $saveImg);
        //     $validateData['gambar'] = $nameImg;
        if ($request->hasFile('gambar')) {
            $nameimg= $request->file('gambar')->store('donasi-img');
            $validateData['gambar'] =  $nameimg;
        }
        KategoriDonasi::create($validateData);
        return redirect()->route('donasi.kategori')->with('success', 'Data berhasil ditambahkan');
    }
    public function stored(Request $request)
    {

        $validateData = $request->validate(
            [
                'judul' => 'required',
                'gambar' => 'image|file'
            ]
        );
        if ($request->file('gambar')) {
            $saveImg =  $request->file('gambar')->store('donasi-img');
            $nameImg = str_ireplace("public/", "", $saveImg);
            $validateData['gambar'] = $nameImg;
        }
        KategoriDonasi::create($validateData);
        return redirect()->route('donasi.kategori')->with('success', 'Data berhasil ditambah');
    }

    // public function storeDonasi(Request $request)
    // {
    //     $date = new DateTime();
    //     $validateData = $request->validate(
    //         [
    //             'nama' => 'required',
    //             'telp' => 'required|numeric',
    //             'bukti_donasi' => 'required|image',
    //         ]
    //     );
    //     if ($request->file('bukti_donasi')) {
    //         $saveImg =  $request->file('bukti_donasi')->store('/public/open-donasi-img');
    //         $upload
    //         // $nameImg =  str_replace("public/", "", $saveImg);
    //         $validateData['bukti_donasi'] = $saveImg;
    //     }
    //     Donasi::create($validateData);
    //     return redirect()->route('donasi')->with('success', 'Bukti Donasi Berhasil Dikirim');
    // }

    public function storeDonasi(Request $request)
    // {
    //     if ($upload   =   $request->file('bukti_donasi')) {
    //         $name = rand() . '.' . $upload->getClientOriginalName();
    //         $upload->move(public_path('uploads/bukti-donasi'), $name);
    //         $form_data = array(
    //             'nama' => $request->nama,
    //             'telp' => $request->telp,
    //             'jumlah' => $request->jumlah,
    //             // 'jumlah_saldo' => $request->jumlah_saldo,
    //             'keluar' => $request->keluar,
    //             'ket' => $request->ket,
    //             'bukti_donasi' => $name,
    //             'saldo' => $request->saldo
    //         );
    //         Donasi::create($form_data); 
    //     }
        
    //     return redirect()->route('donasi')
    //         ->with('success', 'Donasi Berhasil, Jazakumullah Khayran Katsiran');
    // }
    {
    // $daftardonasi = new Donasi();
    // $daftardonasi->nama = $request->nama;
    // $daftardonasi->telp = $request->telp;
    // $daftardonasi->jenis_id= $request->jenis_id;
    // $daftardonasi->tanggal = $request->tanggal;
    // $daftardonasi->jumlah = $request->jumlah;
    // $daftardonasi->keluar = $request->keluar;
    // $daftardonasi->ket = $request->ket;
    // $daftardonasi->bukti_donasi = $request->bukti_donasi;
    // $daftardonasi->saldo = $request->saldo;
    // $daftardonasi->jumlah_saldo = $request->jumlah_saldo;
    $daftardonasi = new Donasi();
    $daftardonasi->nama = $request->get('nama');
    $daftardonasi->jenis_id = $request->get('jenis_id');
    $daftardonasi->tanggal = $request->get('tanggal');
    $daftardonasi->telp = $request->get('telp');
    $daftardonasi->jumlah = $request->get('jumlah');
    $daftardonasi->keluar = $request->get('keluar');
    $daftardonasi->pesan = $request->get('pesan');
    $daftardonasi->ket = $request->get('ket');
    $daftardonasi->bukti_donasi = $request->get('bukti_donasi');
    $daftardonasi->saldo = $request->get('saldo');
    $daftardonasi->jumlah_saldo = $request->get('jumlah_saldo');
        if ($request->file('bukti_donasi')) {
            $file = $request->file('bukti_donasi');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('donasi-img', $nama_file);
            $daftardonasi->bukti_donasi = $nama_file;
        }
    
        $daftardonasi->save();
        
    return redirect('donasi')
        ->with('success', 'Donasi Berhasil, Jazakumullah Khayran Katsiran');
    }



    public function storePengeluaran(Request $request)
    {
        $daftardonasi = new Donasi();
        $daftardonasi->nama = $request->get('nama');
        $daftardonasi->jenis_id = $request->get('jenis_id');
        $daftardonasi->tanggal = $request->get('tanggal');
        $daftardonasi->jumlah = $request->get('jumlah');
        $daftardonasi->keluar = $request->get('keluar');
        $daftardonasi->ket = $request->get('ket');
        $daftardonasi->bukti_donasi = $request->get('bukti_donasi');
        $daftardonasi->saldo = $request->get('saldo');
        $daftardonasi->jumlah_saldo = $request->get('jumlah_saldo');
        // if ($upload   =   $request->file('bukti_donasi')) {
        //     $name = rand() . '.' . $upload->getClientOriginalName();
        //     $upload->move(public_path('uploads/bukti-donasi'), $name);
        if ($request->file('bukti_donasi')) {
            $file = $request->file('bukti_donasi');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('donasi-img', $nama_file);
            $daftardonasi->bukti_donasi = $nama_file;
        }
            // $daftardonasi = array(
            //     'nama' => $request->nama,
            //     // 'telp' => $request->telp,
            //     'tanggal' => $request->tanggal,
            //     'jumlah' => $request->jumlah,
            //     'keluar' => $request->keluar,
            //     'ket' => $request->ket,
            //     'bukti_donasi' => $name,
            //     'saldo' => $request->saldo
            // );
            // global $jumlah, $keluar;
            // $saldo = $jumlah - $keluar;
            // $saldoFix = number_format($saldo, 0, ',', '.'); 
            // Donasi::create($daftardonasi);
        
        $daftardonasi->save();

        return redirect('/admin/kelola-donasi')
            ->with('success', 'Donasi Berhasil, Jazakumullah Khayran Katsiran');
    }

    public function pemasukan($id)
    {
        return view('donasi.index', [
            'pemasukan' => Donasi::find($id),
            'jenis'     => Jenis::all()
        ]);
    }
    public function pengeluaran($id)
    {
        return view('admin.kelola-donasi.pengeluaran.create', [
            'pengeluaran' => Donasi::find($id),
            'jenis'     => Jenis::all()
        ]);
    }

    public function kategoriDonasi()
    {
        return view('admin.kelola-donasi.hasil_create', [
            'daftarkategori' =>  KategoriDonasi::all(),
            'daftardonasi' => Donasi::all()
        ]);
    }


    public function destroy($id)
    {
        $data = KategoriDonasi::where('id', $id)->first();
        $imagepath = public_path() . '/storage//' . $data->gambar;
        unlink($imagepath);
        $data->delete();
        return redirect()->route('donasi.kategori')->with(
            'success',
            'Berhasil Dihapus'
        );
    }
    public function edit($id)
    {
        $kdbyid = KategoriDonasi::find($id);
        return view('admin.kelola-donasi.edit', compact('kdbyid'));
    }
    public function destroy_hasdonasi($id)
    {
        $data = Donasi::where('id', $id)->first();
        $imagepath = public_path() . 'uploads/bukti-donasi/' . $data->bukti_donasi;
        // unlink($imagepath);
        $data->delete();
        return redirect()->route('Kelola-Donasi')->with(
            'success',
            'Berhasil Dihapus'
        );
    }

    public function update(Request $request, $id)
    {
        $file = KategoriDonasi::find($id);
        $date = new DateTime();
        if ($request->has('gambar')) {

            $filepath = public_path() . '/storage//' . $file->gambar;
            unlink($filepath);
            $filename = 'donasi-img/' . $request->file('gambar')->hashName();
            $request->file('gambar')->storeAs('public/', $filename);
            $file->update([
                'judul' => $request->judul,
                'gambar' => $filename,
            ]);
        } else {
            $file->update([
                'judul' => $request->judul
            ]);
        }
        return redirect()->route('donasi.kategori')->with(
            'success',
            'Berhasil Diubah'
        );
    }

    public function get_data()
    {
        $crud = Donasi::with(['user'])->orderBy('created_at');

        return DataTables::of($crud)
        ->addColumn('kategori.nama', function($data){
            return $data->kategori->nama;
        })
        // ->addColumn('tipe', function($data){
        //     return $data->tipe == 1 ? 'Pemasukan' : 'Pengeluaran';
        // })
        ->addColumn('nama', function($data){
            return $data->donasi ? $data->donasi->nama : '-';
        })
        ->addColumn('keterangan', function($data){
            return $data->keterangan ? $data->keterangan : '-';
        })
        ->addColumn('keluar', function($data){
            return $data->keluar ? $data->keluar : '-';
        })
        ->addColumn('saldo', function($data){
            return $data->tipe == 1 ? $data->saldo : -$data->saldo;
        })
        ->addColumn('action', function($data){   
            $button = '<button type="button" name="edit" id="edit_'.$data->id.'" class="edit btn btn-primary btn-sm" data-id="'.$data->id.'" data-id_kategori="'.$data->id_kategori.'" data-tipe="'.$data->tipe.'" data-nominal="'.$data->nominal.'" data-keterangan="'.$data->keterangan.'" data-id_user="'.$data->id_user.'">Edit</button>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<button type="button" name="delete" id="delete_'.$data->id.'" class="delete btn btn-danger btn-sm" data-id="'.$data->id.'">Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
}

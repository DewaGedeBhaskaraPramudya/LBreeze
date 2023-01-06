<?php

namespace App\Http\Controllers;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //
         $sisw = Siswa::latest()->paginate(5);
         return view ('sisw.index',compact('sisw'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    public function export()
	{
		return Excel::download(new SiswaExport, 'Student Data Exported.xlsx');
	}

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
 
		// alihkan halaman kembali
		return redirect()->route('sisw.index')->with('success','Data Successfully Imported');
	}

    public function import()
    {
        return view('sisw.import');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sisw.create');
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
            'NIM' => 'required',
            'Nama' => 'required',
            'Prodi' => 'required',
            'IPK' => 'required',
        ]);
        Siswa::create($request->all());

        return redirect()->route('sisw.index')->with('success','Data Successfully Inputted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $sisw)
    {
        return view('sisw.show', compact('sisw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $sisw)
    {
        return view('sisw.edit', compact('sisw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $sisw)
    {
        $request->validate([
            'NIM' => 'required',
            'Nama' => 'required',
            'Prodi' => 'required',
            'IPK' => 'required',
        ]);

        $sisw->update($request->all());

        return redirect()->route('sisw.index')->with('success','Student Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $sisw)
    {
        $sisw->delete();
        return redirect()->route('sisw.index')->with('success','Data Successfully Deleted');
    }
    
}

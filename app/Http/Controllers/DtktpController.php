<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dtktp;
use App\Models\Users;
use Auth;
use Yajra\DataTables\DataTables;

class DtktpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 0){
        $data = Dtktp::where('user_id','=',Auth::user()->id)->first();
        $params = [
            'title'=>'Data KTP',
            'data'=>$data,
            
            
        ];
        
        return view('user.edit')->with($params);
        } else { 

            // $articles = Dtktp::select(['id', 'nik', 'nama', 'jenisKelamin','alamat'])->get();
            // return Datatables::of($articles)->make(true);

            $data = Dtktp::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="'.route('dtktps.show',$row->id).'" class="edit btn btn-info btn-sm">View</a>
                           <a href="'.route('dtktps.edit',$row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                           <a href="'.route('dtktps.destroy',$row->id).'" class="edit btn btn-danger btn-sm">Hapus</a>
                           ';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
    }

    

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create_ktp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'propinsi_id'=>'required',
            'kota_id'=>'required',
            'nik'=>'required',
            'nama'=>'required',
            'tmpLahir'=>'required',
            'tglLahir'=>'required',
            'jenisKelamin'=>'required',
            'agama'=>'required',
            'alamat'=>'required',
            'status'=>'required',
            'pekerjaan'=>'required',
            'user_id'=>'required',

        ]);
        //fungsi olequent untuk menambah data
        Dtktp::create($request->all());


        //Jika data berhasil disimpan
        return redirect()->route('home')->with('success','Data KTP Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dtktp::where('id','=',$id)->first();
        $params = [
            'title'=>'Data KTP',
            'data'=>$data,
            
            
        ];
        
        return view('admin.data_ktp_admin')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dtktp::where('id','=',$id)->first();
        $params = [
            'title'=>'Data KTP',
            'data'=>$data,  
        ];

        if(Auth::user()->is_admin == 1){
            return view('admin.edit_admin')->with($params);
        } else {
            return view('user.create_ktp');
        }
        
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
        //melakukan validasi data
        $request->validate([
            'propinsi_id'=>'required',
            'kota_id'=>'required',
            'nik'=>'required',
            'nama'=>'required',
            'tmpLahir'=>'required',
            'tglLahir'=>'required',
            'jenisKelamin'=>'required',
            'agama'=>'required',
            'alamat'=>'required',
            'status'=>'required',
            'pekerjaan'=>'required',
            'user_id'=>'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Dtktp::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        
            if(Auth::user()->is_admin == 1){
                return redirect()->route('admin.home')
            ->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect()->route('home')
            ->with('success', 'Data Berhasil Diupdate');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        Dtktp::find($id)->delete();
        return redirect()->route('admin.home')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function ajaxArticles()
    {
        // $articles = Dtktp::select(['id', 'nik', 'nama', 'alamat'])->get();
        // return DataTables::of($articles)
        //         ->rawColumns(['action'])
        //         ->addColumn('action', function($article) {
        //             return "<a href='route-for-delete' class='btn btn-danger'>delete</a>";
        //         })
        //         ->make(true);
        return view('user.create_ktp');
    }
}

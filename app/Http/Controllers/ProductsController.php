<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->ProductsModel = new Products();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productmethod()
    {
        $titleproducts = 'Products';
        $data = [
            'product' => $this->ProductsModel->alldata()
        ];

        return view('/product.data',
        [
            'titleproducts' => $titleproducts,
        ], $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addproductmethod(Request $request)

    {
        //
        $request->validate(
            [
            'nama_barang' => 'required|unique:products,name_product|max:50',
            'stock' => 'required|max:3',
            'price' => 'required|max:11',
            'desc' => 'required',
            'pict' => 'required|mimes:jpg,jpeg,bmp,png|max:1024'
            ],
            [
                'nama_barang.required' => 'Product Harus Di Isi !!',
                'nama_barang.unique' => 'Product Sudah Ada !!',
                'stock.required' => 'Stok Harus Di Isi !!',
                'stock.max' => 'Panjang Maximal 3 Karakter',
                'price.required' => 'Price Harus Di Isi !!',
                'price.max' => 'Panjang Maximal 11 Karakter',
                'desc.required' => 'Desc Harus Di Isi !!',
                'pict.required' => 'Harus Di Isi !!',
                'pict.mimes' => 'Harus jpg,jpeg,bmp !!',
                'pict.max' => 'Maximal 1024 !!',
            ]);

            $file = $request->pict;
            $fileName = 'prdct-'.round(microtime(true)).'.'.$file->extension();
            $file->move(public_path('img/imgproduct'), $fileName);

                $data = [
                    'name_product' => $request->nama_barang,
                    'stock' => $request->stock,
                    'price' => $request->price,
                    'desc' => $request->desc,
                    'pict' => $fileName,
                ];

                $this->ProductsModel->adddata($data);

                // return redirect('/hal-products')->with('alert', 'Success Insert Data!');
                return redirect()->route('products')->with('alert', 'Berhasil Ditambahkan !!');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function updateproductmethod(Request $request)
    {
        //

        $id = $request->idproduct;
        $file = $request->pict;

        if($file <> ''){//jika attribute name -> pict nya tidak kosong(brrti diupload) maka ?

            // $dt_gbr_awal = $request->gbr_awal;
            $dt_gbr_awal = $this->ProductsModel->gbr_awal($id)->pict;
            $file_path = public_path("img/imgproduct/".$dt_gbr_awal);
            if(file_exists($file_path)){
                        unlink($file_path);
                    }

                $fileName = 'prdct-'.round(microtime(true)).'.'.$file->extension();
                $public_path = public_path('img/imgproduct');
                $file->move($public_path, $fileName);

                $data = [
                    'name_product' => $request->nama_barang_edit,
                    'stock' => $request->stock,
                    'price' => $request->price,
                    'desc' => $request->desc,
                    'pict' => $fileName,
                ];
                $this->ProductsModel->updatedata($id, $data);

        }else{

            $data = [
                'name_product' => $request->nama_barang_edit,
                'stock' => $request->stock,
                'price' => $request->price,
                'desc' => $request->desc,
                    ];

                    $this->ProductsModel->updatedata($id, $data);
             }
        // return redirect()->route("products")->with("alert", "Data Berhasil Di Update");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function deleteproductmethod($id)
    {
        //
        // return 'delete';
        $dt_gbr_awal = $this->ProductsModel->gbr_awal($id)->pict;
            $file_path = public_path("img/imgproduct/".$dt_gbr_awal);
            if(file_exists($file_path)){
                        unlink($file_path);
                    }
       $this->ProductsModel->deletedata($id);
       return redirect()->route('products')->with('alert', 'Berhasil Di Hapus !!');
    }
    public function successupdatemethod(){
        return redirect()->route('products')->with('alert', 'Berhasil Di Ubah !!');
    }
}

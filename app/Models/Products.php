<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    // use HasFactory;

    public function alldata(){
        return DB::table('products')->get();
    }
    public function adddata($data){
        DB::table('products')->insertGetId($data);
    }
    public function deletedata($id){

        DB::table('products')->where('id', $id)->delete();
    }
    public function gbr_awal($id){

      return DB::table('products')->where('id', $id)->first();
    }
    public function updatedata($id, $data){

        DB::table('products')
              ->where('id', $id)
              ->update($data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function sort(Request $request)
    {
        $sort=[];
        foreach($request->all() as $value){
            if($value['name']=='sort[]')
                $sort[]=$value['value'];
            if($value['name']=='model')
                $model=$value['value'];
        }
        $modelClass=new $model();

        DB::transaction(function() use($sort,$modelClass) {
            foreach ($sort as $key =>$id){
                $modelClass::where('id', $id)
                    ->update(['sort'=>$key]);
            }
        });
        return ['status'=>'sorted'];
    }
    public function onOff(Request $request){
        $model=(string)str($request->model)->replace('.','\\');
         $modelClass=new $model();
         $object=$modelClass::find($request->id);
         $object->update(['show'=>!$object->show]);
    }

    public function deleteItem(Request $request)
    {
        $model=(string)str($request->model)->replace('.','\\');
        $modelClass=new $model();
        $object=$modelClass::find($request->id);
        $object?->delete();
        return back();
    }
}

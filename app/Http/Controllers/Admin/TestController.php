<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TestController extends Controller
{
    public function index(){

	    $data = array(
	        ['id'   =>  '1', 'pid' => '0' , 'name' => 'test01'],
	        ['id'   =>  '2', 'pid' => '1' , 'name' => 'test02'],
	        ['id'   =>  '3', 'pid' => '1' , 'name' => 'test03'],
	        ['id'   =>  '4', 'pid' => '2' , 'name' => 'test04'],
	        ['id'   =>  '5', 'pid' => '2' , 'name' => 'test05'],
	        ['id'   =>  '6', 'pid' => '3' , 'name' => 'test06'],
	        ['id'   =>  '7', 'pid' => '3' , 'name' => 'test07'],
            ['id'   =>  '8', 'pid' => '0' , 'name' => 'test08'],
            ['id'   =>  '9', 'pid' => '8' , 'name' => 'test09'],
            ['id'   =>  '10', 'pid' => '9' , 'name' => 'test10'],

	    );


    	return view('diwhoe', compact('data'));
    	
    }

    public function gettest(){
	    $data = array(
	        ['id'   =>  '1', 'pid' => '0' , 'name' => 'test01'],
	        ['id'   =>  '2', 'pid' => '1' , 'name' => 'test02'],
	        ['id'   =>  '3', 'pid' => '1' , 'name' => 'test03'],
	        ['id'   =>  '4', 'pid' => '2' , 'name' => 'test04'],
	        ['id'   =>  '5', 'pid' => '2' , 'name' => 'test05'],
	        ['id'   =>  '6', 'pid' => '3' , 'name' => 'test06'],
	        ['id'   =>  '7', 'pid' => '3' , 'name' => 'test07'],
            ['id'   =>  '8', 'pid' => '0' , 'name' => 'test08'],
            ['id'   =>  '9', 'pid' => '8' , 'name' => 'test09'],
            ['id'   =>  '10', 'pid' => '9' , 'name' => 'test10'],
	    );


	    // $arr = array();
	    // foreach ($data as $k => $v){
	    //     if($v['pid'] == $level){
	    //         $data[$k]['_name'] = $data[$k]['name'];
	    //         $arr[]=$data[$k];
	    //         foreach ($data as $m => $n){
	    //             if($n['pid'] == $v['id']){
	    //                 $data[$m]['_name'] = str_repeat('　',$level).'├ '.$data[$m]['name'];
	    //                 // echo str_repeat('　',$level).$arr[$m]['name'].'<br/>';
	    //             }
	    //         }
	    //     }
	    // }
	    // var_dump($arr);
	    $input = Input::all();
        $arr = array();
	    $id = $input['id'];
	    
	    foreach ($data as $k => $v){
	        if($v['pid'] == $id){
	            $arr[] = [$v['id'], $v['name']];
	        }
	    }
	    return $arr;
    }
}

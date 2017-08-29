@extends('layouts.layout')
@section('content')

    <form>

        <select name="s" id="s" onchange="change(this.value)">
            <option value=""></option>
            　
            <option value="1">test1</option>
            <option value="8">test8</option>
        </select>

        <select name="YourLocation" id="sl2" onchange="change2(this.value)">

        </select>

        <select name="sl3" id="sl3">
            　
        </select>
    </form>

    <script>
        function change(id) {
            //  alert(id);
            $.post("{{url('ff')}}", {'_token': '{{csrf_token()}}', 'id': id}, function (data) {
                if (data) {
                    $("#sl2").empty();
                    $("#sl2").append('<option value=""></option>');
                    for (i = 0; i < data.length; i++) {
                        // console.log(count(data));
                        // console.log(data);
                        $("#sl2").append('<option value="' + data[i][0] + '">' + data[i][1] + '</option>');
                    }

                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }

        function change2(id) {
            //  alert(id);
            $.post("{{url('ff')}}", {'_token': '{{csrf_token()}}', 'id': id}, function (data) {
                if (data) {
                    $("#sl3").empty();
                    for (i = 0; i < data.length; i++) {
                        // console.log(count(data));
                        // console.log(data);
                        $("#sl3").append('<option value="' + data[i][0] + '">' + data[i][1] + '</option>');
                    }

                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }
    </script>
@endsection

<?php

/*find(0, 0);

 function find($parent, $level){

 	$data = array(
		['id'	=>	'1', 'pid' => '0' , 'name' => 'test01'],
		['id'	=>	'2', 'pid' => '1' , 'name' => 'test02'],
		['id'	=>	'3', 'pid' => '1' , 'name' => 'test03'],
		['id'	=>	'4', 'pid' => '2' , 'name' => 'test04'],
		['id'	=>	'5', 'pid' => '2' , 'name' => 'test05'],
		['id'	=>	'6', 'pid' => '3' , 'name' => 'test06'],
		['id'	=>	'7', 'pid' => '3' , 'name' => 'test07'],
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
	$arr = array();
    foreach ($data as $k => $v){
    	if($v['pid'] == $parent){
    		echo  str_repeat('　',$level).'├ '.$v['name'].'<br/>';
		if($level == count($data)){
			return;
 		}	
    		find($v['id'], $level + 1);
	   }
    }

	
// echo count($data);

 }*/




?>

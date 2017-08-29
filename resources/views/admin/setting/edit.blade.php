@extends('layouts.layout')
@section('content')
<!-- 位置 -->
<div id="position" class="dark_blue15">網站資料設定 &gt; 編輯內容</div>
<!-- 顯示內容 -->
<div id="bd" class="box">
<!--div id="toolbar">
<input type="button" class="btn" value="新增" />
</div-->
<div id="content">
  <form action="{{url('admin/setting/'.$field->id)}}" method="post" >
    {{method_field('PUT')}}
    {{csrf_field()}}
  <table width="95%" border="0" cellspacing="1" cellpadding="4" align="center" class="formT">
    <tr>
      <td width="20%" class="formT_field"> * 標　　題</td>
      <td width="80%" class="formT_row"><input type="text" class="size-6 form-control" name="title" value="{{$field->title}}" /></td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field"> * 名　　稱</td>
      <td width="80%" class="formT_row"><input type="text" class="size-6 form-control" name="name" id="name" value="{{$field->name}}" /></td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field"> * 類　　型</td>
      <td width="80%" class="formT_row">
        <input type="radio" name="field_type" value="input" {{($field->field_type == 'input')? 'checked': ''}} onclick="showTr()"> input　
        <input type="radio" name="field_type" value="textarea" {{($field->field_type == 'textarea')? 'checked': ''}} onclick="showTr()"> textarea　
        <input type="radio" name="field_type" value="radio" {{($field->field_type == 'radio')? 'checked': ''}} onclick="showTr()"> radio
      </td>
    </tr>
    <tr class="field_value">
      <td width="20%" class="formT_field"> * 類　　型</td>
      <td width="80%" class="formT_row">
        <input type="text" class="size-6 form-control " name="field_value"  value="{{$field->value}}">
        <p><i class="fa fa-exclamation-circle yellow"></i>只有radio的情況下才須設定，格式 1|開啟, 0|關閉</p>
      </td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field">說　　明</td>
      <td width="80%" class="formT_row"><textarea class="form-control" cols="50" rows="8" name="memo">{{$field->memo}}</textarea></td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field"> * 排　　序</td>
      <td width="80%" class="formT_row"><input type="number" class="size-1 form-control" name="sort" min="0" value="{{$field->sort}}" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="formT_row">
        <input type="reset"  class="btn btn-warning btn-sm" onClick="history.back();" value="回上頁" />
        <input type="submit" class="btn btn-primary btn-sm" value="確定送出" />
      </td>
    </tr>
  </table>
  </form>
</div>
</div>
<script>
    showTr();
    function showTr() {
        var type = $('input[name=field_type]:checked').val();
        if( type == 'radio'){
            $('.field_value').show();
        }else{
            $('.field_value').hide();
        }
    }
</script>
@endsection
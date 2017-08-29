@extends('layouts.layout')
@section('content')
<!-- 位置 -->
<div id="position" class="dark_blue15">外部連結 &gt; 修改內容</div>
<!-- 顯示內容 -->
<div id="bd" class="box">
<!--div id="toolbar">
<input type="button" class="btn" value="新增" />
</div-->
<div id="content">
  <form action="{{url('admin/links/'.$field->id)}}" method="post" >
    {{method_field('PUT')}}
    {{csrf_field()}}
  <table width="95%" border="0" cellspacing="1" cellpadding="4" align="center" class="formT">
    <tr>
      <td width="20%" class="formT_field"> * 標　　題</td>
      <td width="80%" class="formT_row"><input type="text" class="size-6 form-control" name="name" value="{{$field->name}}" /></td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field"> * 連結網址</td>
      <td width="80%" class="formT_row"><input type="text" class="size-6 form-control" name="link" id="link" value="{{$field->link}}" /></td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field">簡　　述</td>
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
    $(function() {
      $('#created_date').datepicker({
        dateFormat: "yy-mm-dd"
      });
    });
</script>
@endsection
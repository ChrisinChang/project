@extends('layouts.layout')
@section('content')
<!-- 位置 -->
<div id="position" class="dark_blue15">最新消息 &gt; 新增{{$catName}}</div>
<!-- 顯示內容 -->
<div id="bd" class="box">
<!--div id="toolbar">
<input type="button" class="btn" value="新增" />
</div-->
<div id="content">
  <form action="{{url('admin/news')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
  <table width="95%" border="0" cellspacing="1" cellpadding="4" align="center" class="formT">
    <tr class="">
      <td width="20%" class="formT_field"> * 所屬分類</td>
      <td width="80%" class="formT_row">
        <select class="form-control input-sm" name="pid" id="post_category_id">
          @if(count($category) > 0)
            @foreach($category as $v)
            <option value="{{$v->id}}">{{$v->_name}}</option>
            @endforeach
          @endif
          </select>
        </td>
    </tr>
    <tr>
      <td width="20%" class="formT_field"> * 標　　題</td>
      <td width="80%" class="formT_row"><input type="text" class="size-6 form-control" name="name" value="" /></td>
    </tr>
    <tr class="hide">
      <td width="20%" class="formT_field"> * 發佈日期</td>
      <td width="80%" class="formT_row"><input type="text" class="size-2 form-control" name="" id="created_date" value="" /></td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field">圖　　片</td>
      <td width="80%" class="formT_row">
        <input type="file" class="btn  btn-default " name="file" />
      </td>
    </tr>
    <tr class="hide">
      <td width="20%" class="formT_field">簡　　述</td>
      <td width="80%" class="formT_row"><textarea class="form-control" cols="50" rows="8" name=""></textarea></td>
    </tr>
    <tr>
      <td width="20%" class="formT_field">內　　容</td>
      <td width="80%" class="formT_row"><textarea class="ckeditor" name="content"></textarea>
      </td>
    </tr>
    <tr class="hide">
      <td width="20%" class="formT_field"> * 排　　序</td>
      <td width="80%" class="formT_row"><input type="number" class="size-1 form-control" name="" min="0" value="0" /></td>
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
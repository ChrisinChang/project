@extends('layouts.layout')
@section('content')
<!-- 位置 -->
<div id="position" class="dark_blue15">最新消息 &gt; 修改{{$catName}}</div>
<!-- 顯示內容 -->
<div id="bd" class="box">
<!--div id="toolbar">
<input type="button" class="btn" value="新增" />
</div-->
<div id="content">
  <form action="{{url('admin/news/'.$field->id)}}" method="post" enctype="multipart/form-data">
    {{method_field('PUT')}}
    {{csrf_field()}}
  <table width="95%" border="0" cellspacing="1" cellpadding="4" align="center" class="formT">
    <tr class="">
      <td width="20%" class="formT_field"> * 所屬分類</td>
      <td width="80%" class="formT_row">
        <select class="form-control input-sm" name="pid" id="post_category_id">
          @if(count($category) > 0)
            @foreach($category as $v)
            <option value="{{$v->id}}" {{($v->id == $field->pid)? 'selected' : ""}}>{{$v->_name}}</option>
            @endforeach
          @endif
          </select>
        </td>
    </tr>
    <tr>
      <td width="20%" class="formT_field"> * 標　　題</td>
      <td width="80%" class="formT_row"><input type="text" class="size-6 form-control" name="name" value="{{$field->name}}" /></td>
    </tr>
    <tr class="hide">
      <td width="20%" class="formT_field"> * 發佈日期</td>
      <td width="80%" class="formT_row"><input type="text" class="size-2 form-control" name="" id="created_date" value="" /></td>
    </tr>
    <tr class="">
      <td width="20%" class="formT_field">圖　　片</td>
      <td width="80%" class="formT_row">
        @if(file_exists($field->pic) && $field->pic != "" )
          <img src="/{{$field->pic}}" alt="" height="80">
          <a href="javascript:void(0);" onclick="_del_file('{{$field->pic}}')"><i class="fa fa-2x fa-remove text-danger"></i> 刪除檔案</a>
        @else
          <input type="file" class="btn  btn-default " name="file" />
        @endif
      </td>
    </tr>
    <tr class="hide">
      <td width="20%" class="formT_field">簡　　述</td>
      <td width="80%" class="formT_row"><textarea class="form-control" cols="50" rows="8" name=""></textarea></td>
    </tr>
    <tr>
      <td width="20%" class="formT_field">內　　容</td>
      <td width="80%" class="formT_row"><textarea class="ckeditor" name="content">{{$field->content}}</textarea>
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

    //刪除分類
    function _del_file(file_path) {
        layer.confirm('您確定要刪除這個檔案嗎？', {
            btn: ['確定', '取消'] //按钮
        }, function () {
            $.post("{{url('admin/del_file')}}" ,{'_token':"{{csrf_token()}}", 'file_path': file_path} ,function (data) {
                if(data.status == 0){
                    layer.msg(data.msg,{icon:6});
                    location.reload();
//                    setTimeout("location.reload()", 1000);等待 1 秒重新整理
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            })
        }, function () {

        });
    }
</script>
@endsection
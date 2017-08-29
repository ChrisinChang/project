@extends('layouts.layout')
@section('content')

<!-- 位置 -->
<div id="position" class="dark_blue15">外部連結 &gt; 管理列表</div>

<!-- 搜尋 -->
<div id="search" class="box hide">
 <div>搜尋條件 分類：
   <select name="category_id" id="category_id" class="select">
     <option value="0">全部</option>

       <option value="" ></option>

   </select>
   <input type="button" class="btn" value="送出" onclick="location.href = '/' + document.getElementById('category_id').value;" /></div>
 </div>

 <!-- 顯示內容 -->
 <div id="bd" class="box">
  <div id="toolbar">
    <a href="{{url('admin/setting/create')}}" class="btn btn-primary btn-sm">新增</a>
  </div>
  <div id="content">
  <form action="{{url('admin/setting/changecontent')}}" method="post">
    {{csrf_field()}}
    <table width="100%" border="0" cellspacing="1" cellpadding="4" class="listT">
      <tr align="center" class="listT_field">
        <td width="5%" class="hide"><input type="checkbox" id="checkAll"></td>
        <td width="5%">NO</td>
        <td align="left">標題</td>
        <td width="15%" class="">名稱</td>
        <td width="35%">內容</td>
        <td width="12%" class="">排序</td>
        <td width="12%">修改</td>
        <td width="12%">刪除</td>
      </tr>
      @if(count($data) > 0)
        @foreach($data as $k => $v)
        <tr align="center" class="listT_row01">
          <td class="hide"><input type="checkbox" name="itemId[]" value=""></td>
          <td>{{$k+1}}</td>
          <td align="left" class="title">{{$v->title}}</td>
          <td class="">{{$v->name}}</td>
          <td>
              <input type="hidden" name="set_id[]" value="{{$v->id}}">
              {!! $v->_html !!}
          </td>
          <td class="">
            <input type="number" name="sort[]" min="0"  value="{{$v->sort}}" onclick="changeOrder(this, '{{$v->id}}')" class="size-1 form-control" >
          </td>
          <td><a href="{{url('admin/setting/'.$v->id.'/edit')}}" class="fa fa-2x fa-edit text-info"></a></td>
          <td><a href="javascript:void(0)" class="fa fa-2x fa-trash-o text-danger" onClick="delCate({{$v->id}})"></a></td>
        </tr>
        @endforeach
            <tr>
                <td colspan="7" align="center"  class="formT_row">
                    <input type="submit" class="btn btn-primary btn-sm" value="確定送出" />
                </td>
            </tr>
        @else
        <tr align="center" class="listT_row01">
          <td colspan="8">目前系統尚無任何資訊</td>
        </tr>
      @endif
        <tr align="center" class="listT_foot">
        </tr>

      </table>
    </form>
      <div class="text-center" >

      </div>
    </div>
  </div>
  <script>

      //排序
      function changeOrder(obj,id) {
          var sort = $(obj).val();
          $.post("{{url('admin/setting/changesort')}}",{'_token':'{{csrf_token()}}','id':id,'sort':sort},function(data){
              if(data.status == 0){
                  layer.msg(data.msg,{icon:6});
              }else{
                  layer.msg(data.msg,{icon:5});
              }
          });
      }

      //刪除
      function delCate(id) {
          layer.confirm('您確定要刪除這個分類嗎？', {
              btn: ['確定', '取消'] //按钮
          }, function () {
              $.post("{{url('admin/setting/')}}/"+id ,{'_method':'delete','_token':"{{csrf_token()}}"} ,function (data) {
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
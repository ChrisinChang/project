@extends('layouts.layout')
@section('content')

<!-- 位置 -->
<div id="position" class="dark_blue15">最新消息 &gt; {{$catName}}列表</div>

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
    <a href="{{url('admin/news/create')}}" class="btn btn-primary btn-sm">新增</a>
  </div>
  <div id="content">
    <table width="100%" border="0" cellspacing="1" cellpadding="4" class="listT">
      <tr align="center" class="listT_field">
        <td width="5%" class="hide"><input type="checkbox" id="checkAll"></td>
        <td width="5%">NO</td>
        <td align="left">文章標題</td>
        <td width="15%" class="hide">所屬分類</td>
        <td width="15%">發佈日期</td>
        <td width="10%" class="hide">排序</td>
        <td width="8%">修改</td>
        <td width="8%">刪除</td>
      </tr>
      @if(count($data) > 0)
        @foreach($data as $k => $v)
        <tr align="center" class="listT_row01">
          <td class="hide"><input type="checkbox" name="itemId[]" value=""></td>
          <td>{{$k+1}}</td>
          <td align="left" class="title">{{$v->name}}</td>
          <td class="hide"></td>
          <td>{{date('Y-m-d', $v->created_date)}}</td>
          <td class="hide">
            <input type="number" name="sort" min="0" data-id="" value="" class="size-1 form-control" >
          </td>
          <td><a href="{{url('admin/news/'.$v->id.'/edit')}}" class="fa fa-2x fa-edit text-info"></a></td>
          <td><a href="javascript:void(0)" class="fa fa-2x fa-trash-o text-danger" onClick="delCate({{$v->id}})"></a></td>
        </tr>
        @endforeach
      @else
        <tr align="center" class="listT_row01">
          <td colspan="8">目前系統尚無任何資訊</td>
        </tr>
      @endif
        <tr align="center" class="listT_foot">
        </tr>
      </table>
      <div class="text-center" >
        {{$data->links()}}
      </div>
    </div>
  </div>
  <script>
      //刪除
      function delCate(id) {
          layer.confirm('您確定要刪除這個分類嗎？', {
              btn: ['確定', '取消'] //按钮
          }, function () {
              $.post("{{url('admin/news/')}}/"+id ,{'_method':'delete','_token':"{{csrf_token()}}"} ,function (data) {
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
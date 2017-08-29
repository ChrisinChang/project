@extends('layouts.layout')
@section('content')
<div id="position" class="dark_blue15"></div>

<!-- 顯示內容 -->
<div id="bd" class="box">
  <div id="toolbar"></div>
  <div id="content">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td width="2%">&nbsp;</td>
                <td width="45%">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table1 hide">
                        <tbody><tr>
                            <td class="td1" align="left">瀏覽人次資訊</td>
                        </tr>
                        <tr>
                            <td class="td3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="td2">總共瀏覽人次　　人</td>
                        </tr>
                        <tr class="hide">
                            <td class="td2">上月瀏覽人次　　人</td>
                        </tr>
                        <tr>
                            <td class="td2">本月瀏覽人次　　人</td>
                        </tr>
                        <tr>
                            <td class="td2">本日瀏覽人次　　人</td>
                        </tr>
                        <tr>
                            <td class="td3">&nbsp;</td>
                        </tr>
                    </tbody></table>
                </td>
                <td width="2%">&nbsp;</td>
                <td width="45%" class="">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table1 hide">
                        <tbody><tr>
                            <td class="td1" align="left">表單資訊</td>
                        </tr>
                        <tr>
                            <td class="td3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="td2">聯絡我們 未處理 [  ]　筆  處理中 [  ]　筆 <a href="">[ 觀看 ]</a></td>
                        </tr>
                        <tr>
                            <td class="td3">&nbsp;</td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="15">&nbsp;</td>
            </tr>
        </tbody></table>

    </div>
</div>
@endsection

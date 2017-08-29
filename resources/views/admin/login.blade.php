@extends('layouts.layout')
@section('content')
<!-- 顯示內容 -->
<div id="bd" class="box">
    <div id="content">
        <form action="" method="post">
            {{csrf_field()}}
            <table border="0" cellspacing="1" width="450" cellpadding="5" align="center">
                <tr>
                    <td>
                        <span class="text-muted"  style="align-content:center;font-size: 50px"><i class="fa fa-lock" aria-hidden="true"></i>　後台管理登錄</span>
                        @if(Config::get('login.status')) <span class="text-danger" style="text-align: center;padding-left: 100px">測試模式</span> @endif
                        <table border="0" cellspacing="2" cellpadding="0" align="center" class="gray14 login">
                            <tr height="24">
                                <td>
                                    <div class="margin-bottom">
                                        <div class="input-group margin-bottom-sm">
                                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                            <input class=" form-control test" type="text" name="username" placeholder="請輸入帳號">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr height="24">
                                <td>
                                    <div class="margin-bottom">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                            <input class="form-control test" type="password" name="password" class=" form-control" placeholder="請輸入密碼">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr height="24" class="">
                                <td>
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-check-square-o fa-fw"></i></span>
                                        <input class=" form-control test" type="text" name="code" placeholder="請輸入驗證碼">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr >
                    <td align="center" class="gray14">請 於 認 證 碼 輸 入 下 圖 中 文 字</td>
                </tr>
                <tr class="">
                    <td align="center"><img src="{{url('admin/code')}}" alt="驗證碼" id="verification_code"> <a href="javascript:void(0);" onClick="refresh_code()" class="fa fa-refresh fa-2x"></a></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" class="btn btn-primary btn-sm" value="確定登入" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script>
    var refresh_code = function() {
        var t = new Date();
        $('#verification_code').attr('src', "{{url('admin/code')}}?t=" + t.getTime());
    }
</script>
@endsection

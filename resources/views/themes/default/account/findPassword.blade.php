@extends('theme::layout.account')

@section('seo')
    <title>设置新密码 - {{ Setting()->get('website_name') }}</title>
    <meta name="description" content="tipask问答系统交流平台" />
    <meta name="keywords" content="问答系统,PHP问答系统,Tipask问答系统 " />
@endsection

@stop

@section('content')
    <div class="header text-center">
        <h1>
            <a href="/" class="logo">
                <img src="{{ asset('/css/default/login-logo.png') }}" alt="SegmentFault">
            </a>
        </h1>
        <p class="description text-muted">欢迎加入最专业站长问答社区</p>
    </div>


        <div class="col-md-6 col-md-offset-3 bg-white login-wrap">
            <h1 class="h4 text-center text-muted login-title">设置新密码</h1>
            <form role="form" name="loginForm" action="{{ route('auth.user.findPassword',['token'=>$token]) }}"  method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if ($errors->first('password')) has-error @endif">
                    <label class="required">新密码</label>
                    <input type="text" class="form-control" name="password" required placeholder="新密码" />
                    @if ($errors->first('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group @if ($errors->first('captcha')) has-error @endif">
                    <label for="captcha" class="required">验证码</label>
                    <input type="text" class="form-control" id="captcha" name="captcha" required="" placeholder="请输入下方的验证码">
                    @if ($errors->first('captcha'))
                        <span class="help-block">{{ $errors->first('captcha') }}</span>
                    @endif
                    <div class="mt-10"><a href="javascript:void(0);" id="reloadCaptcha"><img src="{{ captcha_src()}}"></a></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">提 交</button>
                </div>
            </form>
        </div>


    <div class="text-center col-md-12 login-link">
        <a href="{{ route('auth.user.register') }}">注册新账号</a>
        |
        <a href="{{ route('website.index') }}">首页</a>
        |
        <a href="{{ route('auth.user.forgetPassword') }}">找回密码</a>
    </div>
@endsection




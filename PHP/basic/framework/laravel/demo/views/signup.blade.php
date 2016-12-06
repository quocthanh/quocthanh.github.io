<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sports</title>
    <link href="{!! url('public/SportNews/css/sign-up.css') !!}" type="text/css" rel="stylesheet" />
</head>

<body>
    <h1>SIGN UP</h1>
    <form action="{!! url('SportNews/MemberRegister') !!}" method="POST">
        <input type='hidden' name='_token' value='{!! csrf_token() !!}' />
        <table>
            <tr>
                <td class="text_right">User Name:</td>
                <td>
                    <input type="text" name="userName" />
                    {{ $errors->first('userName') }}
                </td>
            </tr>
            <tr>
                <td class="text_right">Password:</td>
                <td>
                    <input type="password" name="userPass" />
                    {{ $errors->first('userPass') }}
                </td>
            </tr>
            <tr>
                <td class="text_right">Confirm Password:</td>
                <td>
                    <input type="password" name="userPass_confirmation" />
                    {{ $errors->first('userPass_confirmation') }}
                </td>
            </tr>
            <tr>
                <td class="text_right">Email:</td>
                <td>
                    <input type="text" name="userEmail" />
                    {{ $errors->first('userEmail') }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="sign up" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="{!! url('SportNews/LogIn') !!}">Log in</a>
                </td>
            </tr>
        </table>
    </form>
    <hr />
    @if (Session::has('message'))
        <div id='msg'>
            {!! Session::get('message') !!}
        </div>
    @endif
</body>

</html>

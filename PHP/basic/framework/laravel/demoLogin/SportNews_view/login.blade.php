<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sports</title>
    <style>
        h1 {
            background: Blue;
            text-align: center;
            color:white;
        }
        .text_right {
            text-align: right;
        }
        #msg {
            color:red;
        }
    </style>
</head>

<body>
    <h1>LOG IN</h1>
    <form action="{!! url('SportNews/CheckLogIn') !!}" method="POST">
        <input type='hidden' name='_token' value='{!! csrf_token() !!}' />
        <table>
            <tr>
                <td class="text_right">Name:</td>
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
                <td></td>
                <td><input type="submit" value="log in" /></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="{!! url('SportNews/SignUp') !!}">Sign up</a></td>
            </tr>
        </table>
    </form>
    @if (Session::has('message'))
        <div id='msg'>
            {!! Session::get('message') !!}
        </div>
    @endif
</body>

</html>
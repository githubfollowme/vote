<h2 class='text-center font-weight-bold'>會員登入</h2>

<form action="./api/check_login.php" method="post">
<table id="loginForm" class='table m-auto w-auto'>
    <tr>
        <td>帳號：</td>
        <td><input type="text" name="account"></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" value="登入">
            <input type="reset" value="重罝">
        </td>

    </tr>
</table>


</form>
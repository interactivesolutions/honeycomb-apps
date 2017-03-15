<!DOCTYPE html>
<html>
<body>

<form action="{{ route('api.v1.api.login') }}" method="post">
    Id:<br>
    <input type="text" name="id">
    <br>
    Secret:<br>
    <input type="text" name="secret">
    <br><br>
    {{ csrf_field() }}
    <input type="submit" value="Submit">
</form>

</body>
</html>

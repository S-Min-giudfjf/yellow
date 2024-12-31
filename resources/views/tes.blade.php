<html>

@csrf

<form action="seni" method="post">
    <button type="submit">遷移</button>
</form>
<form action="search" method="GET" class="middle">
    <label>
        title:
        <input type="text" name="title">
    </label>
    <label>
        content:
        <textarea name="content" cols="10" rows="5"></textarea>
    </label>
    <input type="submit" name="FORM_NAME2" class="width65 height40 wordColorGlay borderNone borderColor searchBtnColor" value="🔍">
</form>

</html>
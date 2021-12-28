<!--add_subject_form.php 從form action將值 以 $_POST['subject'],即($_POST[name])送到 *api/new_subject.php* -->
<!--最後被誰引用呢? 其實再insert新增主題到資料庫後,還是留在backend的首頁.-->

<h1 class="text-center font-weight-bold">新增問卷</h1>
<form action="../api/new_subject.php" method='post' class='col-6 m-auto'>
    <label>問卷主題: <input type="text" name="subject"></label>
<div><input type="submit" value="送出"></div>
</form>

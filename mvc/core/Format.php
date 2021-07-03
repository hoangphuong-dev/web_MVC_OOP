<?php
trait Format {
   public function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
}

public function textShorten($text, $limit = 400){
    $text = $text. " ";
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text.".....";
    return $text;
}

public function validation($data){
    $data = trim($data); // hàm loại bỏ khoảng trắng trong chuỗi
    $data = stripcslashes($data); // là hàm loại bỏ các kí tự backslashes(dấu gạch chéo) của chuỗi // hàm loại bỏ khoảng trắng trong chuỗi
    $data = htmlspecialchars($data); // hàm chặn người dùng chèn kí tự của HTML(<br>, <img>) vào thẻ input
    $data = addcslashes ($data, "'"); // Thêm dấu gạch chéo vào những đằng trước kí tự ' để tránh lỗi sql
    // $data= mysql_real_escape_string($data);
    return $data;
}

public function title(){
    $path = $_SERVER['SCRIPT_FILENAME'];
    $title = basename($path, '.php');
    //$title = str_replace('_', ' ', $title);
    if ($title == 'index') {
       $title = 'home';
   }elseif ($title == 'contact') {
       $title = 'contact';
   }
   return $title = ucfirst($title);
}
}
?>


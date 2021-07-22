<?php
class Session extends DB {
  public static function init(){
    if (version_compare(phpversion(), '5.4.0', '<')) {
      if (session_id() == '') {
        session_start();
      }
    } else {
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    }
  }

  public static function set($key, $val){
    self::init();
    $_SESSION[$key] = $val;
  }

  public static function get($key){
    self::init();
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
   } else {
     return false;
   }
 }

 public static function checkSession(){
  self::init();
  if (self::get("adminLogin")== false) {
   self::destroy();
   header("Location:../admin");
 }
}  
  // lấy thông tin người dùng từ token trên trình duyệt
public function checkLogin() {
  self::init();
  if(!empty($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $query = "SELECT customer.customer_id, customer.customer_name, customer.customer_image 
    from customer_tokens 
    join customer on customer.customer_id = customer_tokens.customer_id 
    where token = '$token'";
    $db = new DB();
    $row = $db->select($query)->fetch_array();
    // gán giá trị của cookie vào session 
    Session::set('customerLogin', '1');
    Session::set('customerId', $row['customer_id']);
    Session::set('customerName', $row['customer_name']);
    Session::set('image_profile', $row['customer_image']);
  } else {
    // echo "khong có token ";
  }
}

// public static function checkLogin_old(){
  // self::init();
  // if(!empty($_COOKIE['customer_id']) && !empty($_COOKIE['customer_name']) && !empty($_COOKIE['image_profile']) && !empty($_COOKIE['customerLogin'])) {
    // nếu có cookie thì lấy về 
    // $customer_id = $_COOKIE['customer_id'];
    // $customer_name = $_COOKIE['customer_name'];
    // $image_profile = $_COOKIE['image_profile'];
    // $customerLogin = $_COOKIE['customerLogin'];

    // mỗi lần đăng nhập tăng thời gian lên 2 tháng (trong vòng 2 tháng không vào => tự đăng xuất)
  // setcookie('customer_id', $customer_id, time() + 60*60*24*60);
  // setcookie('customer_name', $customer_name, time() + 60*60*24*60);
  // setcookie('image_profile', $image_profile, time() + 60*60*24*60);
  // setcookie('customerLogin', $customerLogin, time() + 60*60*24*60);

    // gán giá trị của cookie vào session 
//     Session::set('customerLogin', $customerLogin);
//     Session::set('customerId', $customer_id);
//     Session::set('customerName', $customer_name);
//     Session::set('image_profile', $image_profile);
//   }
// }

public static function destroy(){
  self::init();
  session_destroy();
}
}
?>


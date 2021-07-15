  <?php
  class Session{
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

public static function checkLogin(){
  self::init();
  if(!empty($_COOKIE['customer_id']) && !empty($_COOKIE['customer_name']) && !empty($_COOKIE['image_profile']) && !empty($_COOKIE['customerLogin'])) {
      // nếu có cookie thì lấy về 
    $customer_id = $_COOKIE['customer_id'];
    $customer_name = $_COOKIE['customer_name'];
    $image_profile = $_COOKIE['image_profile'];
    $customerLogin = $_COOKIE['customerLogin'];

      // mỗi lần đăng nhập tăng thời gian lên 2 tháng (trong vòng 2 tháng không vào => tự đăng xuất)
    // setcookie('customer_id', $customer_id, time() + 60*60*24*60);
    // setcookie('customer_name', $customer_name, time() + 60*60*24*60);
    // setcookie('image_profile', $image_profile, time() + 60*60*24*60);
    // setcookie('customerLogin', $customerLogin, time() + 60*60*24*60);
    
      // gán giá trị của cookie vào session 
    Session::set('customerLogin', $customerLogin);
    Session::set('customerId', $customer_id);
    Session::set('customerName', $customer_name);
    Session::set('image_profile', $image_profile);
  }
}

public static function destroy(){
 self::init();
 session_destroy();
}
}
?>


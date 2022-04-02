<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'tucadot' );

/** Username của database */
define( 'DB_USER', 'tucadot' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dKUQB_4Gc)9D^!Pu!u>u&VDtbsTT2?p:{6$kf}].YhuaoJof,vz.]u0T@,ot5Sdh' );
define( 'SECURE_AUTH_KEY',  '#fc[XrW7ip|HB-daBKFQ)^gBd~J-1yg[nsai!D B*,rn{=,5$`-B:OEPs&W2%-L-' );
define( 'LOGGED_IN_KEY',    'm~t:%6+-^`G [E|SV)PMxzdoTvd8;0>GNsi@<,  98S=3&5NE{SjV+(?64y?TQ] ' );
define( 'NONCE_KEY',        'l:c]@(>&mn 5[0Q2@hUmTdAb-XTa4CQ%5JV00OYHVZ~* Ic[  iS4MG2t,<1qAX(' );
define( 'AUTH_SALT',        'r|wfr5cJK[/pw]t6ag+G;`#`Zr6:O!e{]Rv)_%X4<GI(X6{BKm|?^3r5RF&zV:Zg' );
define( 'SECURE_AUTH_SALT', 'iok:eBDjxizM1^%3;MYaB6.`}fU,>j<=vd3}}8h}/bA`#83^Ue/]<=r dDXG)axc' );
define( 'LOGGED_IN_SALT',   '[#GoC;[ppSXoP&xPk/sd+D5)@d%dR.w`3vA19QcITW{?eSy0YJMAKoORoHfn82,w' );
define( 'NONCE_SALT',       'PKU$((rM+|3J4NO-+Tl:=jnd=%Cr*@U{Q7H]Lv$!=K}yio*nA&sevq7lwkP,-JXF' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

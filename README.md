Document API

api: add cart , url:/api/cart/add , method: POST , params: id , success: response 200 thêm thành công , error:  response 500 thêm thất bại, note:

api: delete cart, url:/api/cart/delete, method: POST, params: id, success: remove cart success, error :response 500 thêm thất bại, note: 

api: list cart, url:/api/cart/, method: GET, params: không có, note: return về biến $cart

api: add order, url: /api/orders/add, method: POST, params: id, success: response 200 thêm thành công, error response 500 thêm thất bại, 
note: các cột cần thêm: total, sub_total, status, payment_type, warranty

api: update profile, url: /api/user/update-profile, method: POST, params:không có, success: response 200 thêm thành công, error: response 500 thêm thất bại

api: update thông tin shop, url: /api/user/update-shop, method: POST, params:không có, success:response 200 thêm thành công, error: response 500 thêm thất bại,
note: các cột có thể thêm address_line1, address_line2, city, province,description 
còn ảnh bìa thì bỏ ảnh đại diện lấy luôn ảnh của user

api: list all category, url: /api/category, methob: GET, params: không có , Success Response: không có, Error Response : không có, biến trả sang FE $categories

api: list parent-category, url: /api/parent-category/ , methob: GET , params: không có , Success Response: không có , Error Response : không có ,
return về biến $parentCategory, note: mặc đinh để là 0 rồi nên chỉ cần call về đổ ra giao diện là được

api: list category details, url: /api/category-details, methob:GET, params: id, notes :

api: add product, url: /api/product/add, methob: POST, params: không có, success response 200 thêm thành công, error response 500 thêm thất bại, note:các cột cần thêm
name ,slug ,category_id , quantity, price , discount_id  , active, iHot, iPay, warranty(có thể null), view(có thể null), description, content, img

api: list product, url:/api/product, method: get, params: không có, success response : không, error response: không

api : list product details, methob: GET, params: id, url : api/product-details

api: list user, url: /api/user, method: get, params: không có

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

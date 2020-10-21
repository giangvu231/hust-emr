# Tech

Laravel Framework 5.8.15
VueJS 2.6.12

## Deployment

Use the package manager [pip](https://pip.pypa.io/en/stable/) to install foobar.

```bash
(1) git clone https://github.com/giangvu231/hust-emr
(2) cd vào thư mục vừa clone về
(3) composer install
(4) npm install
(5) Cài đặt MySQL -> Vào MySQL Command Line -> type: create database emr -> ;
(6) cp .env.example .env ( copy file env )
(7) chỉnh sửa file .env để kết nối db
    DB_CONNECTION=mysql          
	DB_HOST=127.0.0.1            
	DB_PORT=3306                 
	DB_DATABASE=emr     
	DB_USERNAME=root             
	DB_PASSWORD=<pass tài khoản root của mysql>
(8) php artisan key:generate
(9) php artisan migrate:refresh --seed
(10) php artisan storage:link
(11) npm run watch / npm run dev
(12) Sửa pass user: $2y$10$w1ELUdVutNF.ZChfUvS1FuHTr.jHD8reRhYCG8.p9wyD.B8BH1dx.
(12A) php artisan serve
```

## License
[MIT](https://choosealicense.com/licenses/mit/)

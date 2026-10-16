
# Coffee House Laravel 11 — بداية المشروع

## التشغيل
1. أنشئ مشروع Laravel 11: `composer create-project laravel/laravel:^11.0 coffee-house`
2. انسخ محتويات الحزمة داخل المشروع مع دمج الملفات.
3. أنشئ قاعدة بيانات `coffee_house` وعدّل DB_DATABASE وبيانات الدخول في `.env`.
4. ثبّت Breeze للمصادقة: `composer require laravel/breeze --dev` ثم `php artisan breeze:install blade`.
5. ثبّت Tailwind 3 وAlpine: `npm install && npm install -D tailwindcss@3 postcss autoprefixer && npm install alpinejs && npx tailwindcss init -p`.
6. أضف alias للـ admin middleware إلى `bootstrap/app.php` كما في `bootstrap/app.php.middleware-note.txt`.
7. شغّل `php artisan storage:link`, ثم `php artisan migrate --seed`, ثم `npm run dev` و`php artisan serve`.

للتجربة فقط، بعد تسجيل الدخول، اجعل `is_admin=1` لحسابك في جدول users. لا تضع كلمة مرور تجريبية في الإنتاج.

هذه حزمة بداية تتضمن الموقع العام، سلة الجلسة، الطلبات، التواصل، ولوحة أولية للمنتجات والتصنيفات والطلبات. وحدات المخزون والحجوزات والموردين والمشتريات والمصروفات والمدفوعات التفصيلية ليست مكتملة في هذه الحزمة؛ لا تعتبرها نظام إنتاج قبل الاختبارات والمراجعة الأمنية.

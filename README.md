# 📌 1. Bikin Model, Migration, Factory, Seeder Sekaligus!  
php artisan make:model NamaModel -mfs  
# Contoh:  
php artisan make:model Transaksi -mfs  
 
# 📌 2. Bikin Controller (Auto CRUD!)  
php artisan make:controller NamaController --resource  
# Contoh:  
php artisan make:controller TransaksiController --resource  
 
# 📌 3. Bikin Seeder (Data Dummy)  
php artisan make:seeder NamaSeeder  
# Contoh:  
php artisan make:seeder UserSeeder  
php artisan db:seed --class=UserSeeder  
 
# 📌 4. Bikin Request (Validasi Form)  
php artisan make:request NamaRequest  
# Contoh:  
php artisan make:request TransaksiRequest  
 
# 📌 5. Bikin Middleware (Filter Akses)  
php artisan make:middleware NamaMiddleware  
# Contoh:  
php artisan make:middleware IsAdmin  
 
# 📌 6. Jalankan Migration (Database Ready)  
php artisan migrate  
php artisan migrate:fresh --seed  
 
# 📌 7. Cek Semua Route (Biar Gak Bingung)  
php artisan route:list  
 
# 📌 8. Generate APP_KEY (Kalau Pas Install Lupa)  
php artisan key:generate  
 
# 📌 9. Jalankan Laravel (Biar Bisa Diakses di Browser)  
php artisan serve  
php artisan serve --port=8081  
 
# 🎯 TIPS CEPAT:  
# - Pakai TAB buat auto-complete command!  
# - Kalau error, cek di storage/logs/laravel.log  
# - Gunakan php artisan tinker buat testing data di database!  
# - Simpan data ke seeder biar ga perlu input manual!  
# - Mau reset database? php artisan migrate:fresh --seed  

cmdlaravelukk
codeukkdexter

# Eallisto_Admin

...after assemble the code in to  local server from this repository(master)
1)create a database named as db_eallisto in phpMyAdmin
2)run migrations :php artisan migrate
3)php artisan serve
4)run the url http://127.0.0.1:8000/  --a login page appears
5)for login , create username and password manually running the below code in phpMyAdmin SQL window :
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'admin', 'admin123@gmail.com', NULL, 'admin', '$2y$10$x2U00OTSkObM5pE.//cCHubfEWmHZ7dUEwPvD/dE6ZWE4k9BYHDEO', NULL, NULL, NULL);
6)login with username :admin and password :admin123

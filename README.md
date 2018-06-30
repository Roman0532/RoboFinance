# RoboFinance

# Для запуска проекта необходимо:
<ul>
  <li>Склонировать проект на локальную машину используя команду git clone https://github.com/Roman0532/RoboFinance.git</li>
  <li>Создать базу данных (например в MySQL)</li>
  <li>Перейти в папку с проектом и выполнить команду composer install</li>
  <li>Открыть файл phinx и в разделе delevelopment добавить вставить свои данные</li>
  <li>Выполнить команду php vendor/robmorgan/phinx/bin/phinx migrate</li>
  <li>Выполнить команду php vendor/robmorgan/phinx/bin/phinx php vendor/robmorgan/phinx/bin/phinx seed:run -s ArticlesSeeder</li>
  <li>Выполнить команду php vendor/robmorgan/phinx/bin/phinx php vendor/robmorgan/phinx/bin/phinx seed:run -s UsersSeeder</li>
  <li>Открыть файл env.php и добавить данные о подключении к бд</li>
  </ul>

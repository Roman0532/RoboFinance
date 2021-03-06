<?php


use Phinx\Seed\AbstractSeed;

class ArticlesSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'title' => 'В Минобороны рассказали, когда первая партия Су-57 поступит в войска',
                'content' => 'ВКС должны получить первые 12 истребителей в следующем году,
                 контракт уже готовится к подписанию. Сейчас проходят завершающие этапы испытаний самолета.',
                'image' => '1521703311.jpg',
                'user_id' => 1,
                'count_view' => 25,
            ],
            [
                'title' => 'Разделяй, а там увидим. Зачем Трамп раскалывает Европу',
                'content' => 'Президент США Дональд Трамп, принимая французского коллегу Эммануэля Макрона 
                в Вашингтоне, предлагал ему выйти из Европейского союза и якобы даже обещал за это 
                определенные преференции, сообщает одно американское издание. 
                Другое добавляет масла в огонь: накануне саммита НАТО глава Белого 
                дома разослал европейским партнерам довольно резкие письма, содержание которых
                 можно выразить тремя словами: "Вы платить собираетесь?" Старый Cвет все больше опасается "непредсказуемого" 
                Трампа, подозревая его в намерении разрушить европейское единство. РИА Новости разбиралось, есть ли у него подобные планы.',
                'image' => '1523665583.jpg',
                'user_id' => 2,
                'count_view' => 30,
            ],
            [
                'title' => 'Синдром мгновенной смерти: как Земля готовится к отражению атаки из космоса',
                'content' => 'МОСКВА, 30 июн — РИА Новости. Ровно сто десять лет назад в 
                Сибири упал Тунгусский метеорит, уничтожив участок леса размером с Гонконг. РИА Новости рассказывает, 
                насколько человечество приблизилось к созданию глобальных систем планетарной обороны и приручению гостей из космоса.',
                'image' => '1523662079.jpg',
                'user_id' => 1,
                'count_view' => 20,
            ],
            [
                'title' => 'Подсветить и уничтожить. Как развивались бортовые радары боевых самолетов',
                'content' => 'МОСКВА, 30 июн — РИА Новости, 
                Николай Протопопов. Быстро обнаружить подлетающую на сверхзвуковой 
                скорости ракету, выявить точное местоположение атакующего вражеского самолета и нацелить оружие для ответного удара — бортовые радиолокационные системы стали главными помощниками летчиков 
                в воздушном бою. Как устроены самые продвинутые радары и с чего начиналось "прозрение" боевой авиации — в материале РИА Новости.',
                'image' => '1517276379.jpg',
                'user_id' => 1,
                'count_view' => 24,
            ],
        ];

        $this->table('articles')->insert($data)->save();
    }
}

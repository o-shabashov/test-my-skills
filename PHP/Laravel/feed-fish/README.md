# Feed fish

Имеется аквариум с водой. Также имеется три разновидности рыб с различными
характеристиками по десятибалльной шкале:
1. Займо-карп: скорость = 7, сытость = 8. Имеет особенность: с вероятностью 30%
может выждать пять ходов перед тем, как съесть орешек, к которому подплыл. В это
время остальные рыбы (даже другие карпы) не едят этот орешек из уважения к роду
карповых (другие карпы не едят по другой причине).
2. Банко-осётр: скорость = 6, сытость = 3
3. Кредито-щука: скорость = 5, сытость = 4
Если сытость меньше 5, то к скорости прибавляется отношение скорости к сытости
(точность два знака после запятой).
Рыбы едят орешки. Орешек можно съесть только целиком. Орешек прибавляет две
единицы к сытости рыбы. Орешек не движется в пространстве после помещения в
аквариум (специальный сорт). Новые орешки появляются только после того, как будет
съеден предыдущий.
Когда в аквариум помещается орешек, он находится на равном расстоянии от каждой
из рыб, находящихся в аквариуме. Орешек помещается в аквариум посредством
мгновенной телепортации. Размерность пространства и физические свойства воды не
важны и не должны учитываться. Рыбы стартуют в своей погоне за едой
одновременно. Если сытость достигла 10, рыба не плывёт за орешком. В рамках
задачи сытость рыбы с течением времени не уменьшается.

Необходимо предоставить заархивированный код проекта, реализующий все
приведённые выше условия и позволяющий путём задания первоначальных значений,
моделировать любые вариации неограниченное количество раз (с сохранением
результатов).
Результат моделирования должен быть представлен в виде списка пошаговых
действий. Каждое действие (изменение состояния) занимает 1 ход. В 1 ход может
произойти несколько параллельных действий. Если рыба сыта, то её действия не
отмечаются. Орешек появляется на следующий ход после того, как съели
предыдущий. Рыбы плывут за орешком на следующий ход после появления

## Install

```shell
git clone https://o-shabashov@bitbucket.org/o-shabashov/robo-finance.git
cd robo-finance/senior
composer install
cp .env.example .env
php artisan key:generate
```

* Create DB `senior`
* Edit `.env` for your needs

```shell
php artisan migrate
php artisan db:seed
```

## Usage

```shell
php artisan feed-fish
```
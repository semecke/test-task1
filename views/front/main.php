<?php

/** @var $cars */
?>

<h1 class="text-center">Информация по машинам</h1>

<div class="row mt-5">
    <div class="col">
        <table id="car-table" class="table">
            <thead>
            <tr>
                <th>ID автомобиля</th>
                <th>Название автомобиля</th>
                <th>Владелец</th>
                <th>Дата покупки</th>
                <th>Дата продажи</th>
                <th>Счетчик ремонтных работ</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?= $car['id'] ?></td>
                    <td><?= $car['name'] ?></td>
                    <td><?= $car['owner_name'] ?></td>
                    <td><?= $car['date_buy'] ?></td>
                    <td><?= $car['date_sold'] ?></td>
                    <td><?= $car['count_repair'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

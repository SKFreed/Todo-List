<?php
require('header.php');
?>
<?php
$pdo = new PDO("mysql:host=localhost;port=3306;charset=UTF8;dbname=todolist", 'root', 'root');
$stmt1 = $pdo->prepare("SELECT * FROM $season");
$stmt1->execute();
$lists = $stmt1->fetchAll();
?>

<div class="container">

    <div class="add-block">
        <!--season-page.php?season=--><? /*= $season */ ?>
        <form method="post" action="backend.php?season=<?= $season ?>">
            <input type="text" name="name" class="input" placeholder="Введите значение">

            <button class="add <?= $season ?>" type="submit">Добавить</button>
        </form>
        <div class="mistake hidden">
            <span class="wrong">X</span>
            <span class="wrong-text">Введите новое значение</span>
        </div>
    </div>

    <div class="todo-list">
        <ul class="list hover">
            <?php foreach ($lists as $list) { ?>
                <li class="list-item" draggable="true"> <?= $list['name'] ?>
                    <button class="close">
                        <a href="delete.php?season=<?= $season ?>&id=<?= $list['id'] ?>" class="close-link">X</a>
                    </button>
                </li>
            <?php } ?>
        </ul>
    </div>

</div>
<script src="/script/app.js"></script>
</body>
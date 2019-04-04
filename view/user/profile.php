<?php require ROOT . "/view/layouts/header.php" ?>
<main class="content">
<div class="profile_block">

    <table>
    <caption>Кабинет пользователя</caption>
        <tr>
            <th>Логин:</th>
            <td><?php echo $user['login'] ?></td>
        </tr>
        <tr>
            <th>Эл. почта:</th>
            <td> <?php echo $user['email'] ?></td>
        </tr>
        <tr>
            <th>Дата регистрации:</th>
            <td><?php echo $user['date_register'] ?></td>
        </tr>
    </table>
    </div>
</main>
    
<?php require ROOT . "/view/layouts/footer.php" ?>
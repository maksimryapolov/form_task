<?php require ROOT . "/view/layouts/header.php" ?>

    <main class="content">
    <?php if($result): ?>
        <div class="result">
            <h1 class="result_title">Добро пожаловать</h1>
            <p class="result_description">Для работы необходимо <a href="/">авторизоваться</a></p>
        </div>
        <?php else : ?>
        
        <div class="form-block">
            <div>
                <h2 class="form_block-title">Регистрация</h2>
                <form action="" method="post">
                <div class="from-group">

                <?php if(isset($errors) && is_array($errors)): ?>
                   <?php foreach ($errors as $key => $error) : ?>
                   <div class="popover_<?php echo $key ?>">
                        <div class="arrow_<?php echo $key ?>"></div>
                        <div class="about_error"><?php echo $error ?></div>
                    </div>
                   <?php endforeach ?>
                <?php endif ?>

                    <span class="attr">*</span> <label for="InputLogin"> Логин</label>
                        <input class="texttype" id="InputLogin" type="text" name="name" placeholder="Введите логин" value="<?php echo $name ?>">
                    </div>
                    <div class="from-group">
                    <span class="attr">*</span> <label for="InputEmail"> Адрес электронной почты </label>
                        <input class="texttype" id="InputEmail" type="email" name="email" placeholder="Введите адрес эл. почты" value="<?php echo $email ?>">
                    </div>
                    <div class="from-group">
                    <span class="attr">*</span> <label for="InputPassword"> Пароль </label>
                        <input class="texttype" for="InputPassword" type="password" name="password" placeholder="Введите пароль" value="<?php echo $password ?>">
                    </div>
                    <div class="form-explanation">
                        <small><span class="attr">*</span> - обязательное поле ввода</small>
                    </div>
                    <input type="submit" name="submit" class="btn">
                </form>
            </div>
        </div>
        <div class="content_decoration"></div>
        <?php endif ?>
    </main>

<?php require ROOT . "/view/layouts/footer.php" ?>
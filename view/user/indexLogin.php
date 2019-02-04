<?php require ROOT . "/view/layouts/header.php" ?>

    <main class="content">
        <?php if(isset($errors) && is_string($errors)): ?>
        <div class="errorsLogin">
            <?php echo $errors; ?>
        </div>
        <?php endif ?>
        
        <div class="form-block">
            <div>
                <h2 class="form_block-title">Авторизация</h2>
                
                <form action="" method="post">
                    <div class="from-group">
                        <label for="InputEmail">Адрес электронной почты</label>
                        <input class="texttype" id="InputEmail" type="email" name="email" placeholder="Введите адрес эл. почты" value="<?php echo $email ?>">
                    </div>
                    <div class="from-group">
                        <label for="InputPassword">Пароль</label>
                        <input class="texttype" for="InputPassword" type="password" name="password" placeholder="Введите пароль" value="<?php echo $password ?>">
                    </div>
                    <input type="submit" name="sibmit" class="btn">
                </form>
            </div>
        </div>
        <div class="content_decoration">
            
        </div>
    </main>

<?php require ROOT . "/view/layouts/footer.php" ?>
    

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">


                <p class="regOk"></p>

                <div id="registerBox" class="signup-form"><!--sign up form-->
                    <h2>Регистрация на сайте</h2>
                    <form action="" id="register" method="post" role="form">
                        <div class="form-group">
                            <label for="name">Имя<span class="error">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя"
                                   value="" required/>
                            <p class="help-block">Например: John</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="error">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Введите email"
                                   value="" required/>
                            <p class="help-block">Например: example@gmail.com</p>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль<span class="error">*</span></label>
                            <input type="password" name="password" class="form-control" id="pwd"
                                   placeholder="Введите пароль" value="" required/>
                            <p class="help-block">Не меньше шести символов </p>
                        </div>

                        <div class="form-group">
                            <label for="pwd2">Повторите пароль<span class="error">*</span></label>
                            <input type="password" name="pwd2" class="form-control" id="pwd2"
                                   placeholder="Введите пароль" value="" required/>
                        </div>
                        <div id="messageShow"></div>

                        <input type="submit" name="submit" class="btn btn-default" value="Регистрация"/>
                    </form>
                </div><!--/sign up form-->
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                {if isset($errors) && is_array($errors)}
                    <ul>
                        {foreach from=$errors  item=error}
                            <li><span class="error">- {$error}</span></li>
                        {/foreach}
                    </ul>
                {/if}

                <div class="signup-form"><!--sign up form-->
                    <h2>Вход на сайт</h2>
                    <form action="#" id="login" method="post" role="form">

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"
                                   value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Пароль" value="" required/>
                        </div>
                        <div id="messageShow"></div>

                        <input type="submit" name="submit" class="btn btn-default" value="Вход"/>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section>


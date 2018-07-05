
{*Модальное окно редактирования данных пользователя*}

<div class="modal" id="modal-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">


                <button class="close" type="button" data-dismiss="modal">
                    <i class="fa fa-close"><strong>x</strong></i>
                </button>


                <div class="modal-4"> Редактирование данных</div>
            </div>


            <div class="modal-body">


                <form action="" method="post" id="modForm" role="form">
                    <div class="form-group">
                        <label for="name">Имя<span class="error">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Имя"
                               value="{$name}"/>
                        <p class="help-block">Например: John</p>
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефон</label>

                        <input type="Tel" name="phone" class="form-control" id="phone" placeholder="Телефон"
                               value="{$phone}"/>


                    </div>
                    <div class="form-group">
                        <label for="address">Адрес</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Адрес"
                               value="{$address}"/>
                    </div>


                    <div class="form-group">
                        <label for="newPwd">Новый пароль</label>
                        <input type="password" name="newPwd" class="form-control" id="newPwd" placeholder="Пароль"
                               value=""/>
                    </div>
                    <div class="form-group">
                        <label for="pwd2">Повтор пароля</label>
                        <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Пароль"
                               value=""/>
                    </div>

                    <div class="form-group">
                        <label for="password">Текущий пароль<span class="error">*</span></label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Пароль"
                               value=""/>
                        <p class="help-block">Не меньше шести символов </p>
                    </div>


                    <div id='messageShow'></div>


                    <input type="submit" name="submit" id="done" class="btn btn-default" value="Сохранить"/>


                </form>

            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Отмена</button>

            </div>

        </div>
    </div>

</div>

<section xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">

            <h3>Кабинет пользователя</h3>
            {if $name}
                <h4>Привет, {$name}!</h4>
            {else}
                <h4>Привет, {$email}!</h4>
            {/if}


            <ul>
                <li><a href="" id="done" class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Редактировать
                        данные</a></li>

            </ul>

            <div class="regOk"></div>


            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <h3>Ваши регистрационные данные:</h3>
                <table class="table table-bordered table-condensed" cellpadding="1" cellspacing="1">
                    <thead>

                    <tr class="success">

                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Телефон</th>
                        <th>Адрес</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="n">{$name}</td>
                        <td class="e">{$email}</td>
                        <td class="tel">{$phone}</td>
                        <td class="a">{$address}</td>
                    </tr>

                    </tbody>


                </table>

            </div>

        </div>

    </div>
</section>


$(document).ready(function () {
    $("#phone").mask("+3(999) 999-9999");
    //проверка полей
    function check(message) {
        if (message) {

            $('#messageShow').html(message + "<div class='clear'><br/></div>");
            $('#messageShow').show();
        }
    }


    //подсветка пустого поля
    function lightEmpty(field) {
        field.css("border", "red solid 1px");
        // Через полсекунды удаляем подсветку
        setTimeout(function () {
            field.removeAttr('style');
        }, 500);
    }

    /**
     * Регистрация пользователя
     */
    $("#register").submit(function (e) {
        e.preventDefault();


        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#pwd').val();
        var pwd2 = $('#pwd2').val();


        var error = false; // прeдвaритeльнo oшибoк нeт
        var msg = [];

        //проверка имени
        if (name.length < 2) {
            msg = 'Имя не должно быть короче 2-х символов';
            check(msg);
            lightEmpty($('#name'));
            error = true; // oшибкa
        }

        else if (password.length < 6) {
            msg = 'Пароль не должен быть короче 6-ти символов';
            check(msg);
            lightEmpty($('#password'));
            error = true; // oшибкa
        }
        else if (pwd2 != password) {
            msg = 'пароли не совпадают!';

            check(msg);
            lightEmpty($('#pwd2'));
            error = true; // oшибкa
        }

        if (!error) {
            // msg == null;

            check(msg);
            //записываем в массив данные
            var postData = {
                name: name,
                email: email,
                password: password,
                pwd2: pwd2

            };

            $.ajax({
                type: 'POST',
                async: true,
                url: '/register/form/',
                data: postData,
                dataType: 'json',

                success: function (data) {
                    console.log('данные пришли!');
                    if (data['success']) {
                        console.log(data);
                        // alert('Регистрация прошла успешно!');
                        $('.regOk').html(data['message']).fadeOut(10000); //вывод успеха редактирования на страницу
                    } else {
                        check(data['message']);

                        lightEmpty($('#password'));
                    }


                }
            });
        }
    });


    /**
     * Авторизация
     */
    $("#login").submit(function (e) {
        e.preventDefault();

        var email = $('#email').val();
        var password = $('#password').val();


        var error = false; // прeдвaритeльнo oшибoк нeт
        var msg = [];

        if (password.length < 6) {
            msg = 'Пароль не должен быть короче 6-ти символов';


            check(msg);
            lightEmpty($('#password'));
            error = true; // oшибкa
        }


        if (!error) {
            // msg == null;

            check(msg);
            //записываем в массив данные
            var postData = {

                email: email,
                password: password

            };

            $.ajax({
                type: 'POST',
                async: true,
                url: '/login/form/',
                data: postData,
                dataType: 'json',

                success: function (data) {
                    console.log('данные пришли!');
                    if (data['success']) {
                        console.log(data);
                        location.href = "/cabinet"

                    } else {
                        check(data['message']);
                        lightEmpty($('#email'));
                    }
                }
            });
        }
    });


    /**
     * Обновление данных полюзователя
     */
//Маска для поля Телефон
    $("#modForm").submit(function (e) {
        e.preventDefault();


        var name = $('#name').val();
        var password = $('#password').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var newPwd = $('#newPwd').val();
        var pwd2 = $('#pwd2').val();


        var form = $(this); // зaпишeм фoрму, чтoбы пoтoм нe былo прoблeм с this
        var error = false; // прeдвaритeльнo oшибoк нeт
        var msg = [];

        //проверка имени
        if (name.length < 2) {
            msg = 'Имя не должно быть короче 2-х символов';
            check(msg);
            lightEmpty($('#name'));
            error = true; // oшибкa
        }

        else if (password.length < 6) {
            msg = 'Пароль не должен быть короче 6-ти символов';
            check(msg);
            lightEmpty($('#password'));
            error = true; // oшибкa
        }
        else if (newPwd != pwd2) {
            msg = 'пароли не совпадают!';

            check(msg);
            lightEmpty($('#pwd2'));
            error = true; // oшибкa
        }

        if (!error) {
            check(msg);
            //записываем в массив данные
            var postData = {
                name: name,
                password: password,
                phone: phone,
                address: address,

                newPwd: newPwd,
                pwd2: pwd2

            };

            $.ajax({
                type: 'POST',
                async: true,
                url: '/cabinet/edit/',
                data: postData,
                dataType: 'json',

                success: function (data) {
                    console.log(data);
                    if (data['success']) {
                        console.log(data);
                        $('.n').html(name);
                        $('.pass').html(password);
                        $('.tel').html(phone);
                        $('.a').html(address);

                        $("#modal-1 .close").click();// закрытие мод. окна
                        $('.modal-backdrop').remove(); // чсена фона окна с серого на белый

                        $('.regOk').html(data['message']).fadeOut(10000); //вывод успеха редактирования на страницу
                    } else {

                        check(data['message']);
                        lightEmpty($('#password'));
                    }


                }
            });
        }
    });
});





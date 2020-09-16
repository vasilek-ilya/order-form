<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Form</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <form action="">
        <div class="form-group">
            <label>Имя</label>
            <input name="name" type="text" class="form-control" placeholder="Введите ваше имя">
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>Телефон</label>
            <input name="phone" type="text" class="form-control" placeholder="Введите номер телефона">
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>Адрес</label>
            <input name="address" type="text" class="form-control" placeholder="Введите ваш адрес">
            <small class="form-text text-muted"></small>
        </div>

        {{--    Rate    --}}
        <div class="form-group">
            <label>Тарифы</label>
            <div id="tariff-container"></div>
        </div>

        <div class="form-group" id="day-container" style="display: none">
            <label>Первый день доставки</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input position-static " type="radio" name="day" value="0">
                    <label class="form-check-label">Пн</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input position-static " type="radio" name="day" value="1">
                    <label class="form-check-label">Вт</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input position-static " type="radio" name="day" value="2">
                    <label class="form-check-label">Ср</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input position-static " type="radio" name="day" value="3">
                    <label class="form-check-label">Чт</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input position-static " type="radio" name="day" value="4">
                    <label class="form-check-label">Пт</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input position-static " type="radio" name="day" value="5">
                    <label class="form-check-label">Сб</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input position-static " type="radio" name="day" value="6">
                    <label class="form-check-label">Вс</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="Оформить заказ">
        </div>
    </form>
</div>


<script src="{{ asset('js/app.js') }}"></script>
<script>

    $.ajax({
        url: '/tariff/all',
        success: function (data) {
            const tariffContainer = $('#tariff-container');
            tariffContainer.empty();

            data.forEach(function (tariff) {
                tariffContainer.append(
                    $('<div>', {
                        class: 'form-check form-check-inline',
                    })
                        .append($('<input>', {
                            class: 'form-check-input position-static',
                            type: 'radio',
                            name: 'tariff',
                            value: tariff.id,
                            dayMask: tariff.day_mask
                        }))
                        .append($('<label>', {
                            class: 'form-check-label',
                            text: tariff.name
                        }))
                );
            });

            $('#day-container').show();

            $('input[type=radio][name=tariff]').on('change', function() {
                const dayMask = $(this).attr('daymask');

                $('input[type=radio][name=day]').each(function (index, item) {
                    $(item).attr('disabled', false);
                    $(item).prop('checked', false);

                    if (dayMask[index] === '0') {
                        $(item).attr('disabled', true);
                    }
                })
            });
        },
        beforeSend: function () {
            const tariffContainer = $('#tariff-container');
            tariffContainer.empty();
            tariffContainer.append('Загрузка тарифов');
        }
    });
</script>
</body>
</html>

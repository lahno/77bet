$(document).ready(function(){
    /*
    * REGISTER POST
     */
    $('#register_from').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                // modal_massage.find('h3').text(data.title);
                // modal_massage.find('.rate-description').text(data.message);
                //
                // modal_massage.modal('show');
                if (data.success){
                    window.location.href = data.redirect_to;
                }
                grecaptcha.reset();
            },
            error:function (xhr){
                if( xhr.status === 422 ) {
                    var errors = $.parseJSON(xhr.responseText);
                    $.each(errors['errors'], function (key, val) {
                        // form.find("#inp-" + key).parents('.inp-group').addClass('inp-error');
                        form.find('[name^="'+ key + '"]').addClass('error');
                        form.find("#"+key+"-error").addClass('error');
                    });
                }
                grecaptcha.reset();
            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });


    /*
    * EDIT NAME
     */
    $('.edit_profile_form').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.success){
                    modal_massage.find('h3').text('Ok!');
                    modal_massage.find('.rate-description').text('Данные обновлены');
                }else{
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Данные не обновлены!');
                }
                modal_massage.modal('show');
            },
            error:function (xhr){
                if( xhr.status === 422 ) {
                    var errors = $.parseJSON(xhr.responseText);
                    $.each(errors['errors'], function (key, val) {
                        // form.find("#inp-" + key).parents('.inp-group').addClass('inp-error');
                        form.find('[name^="'+ key + '"]').addClass('error');
                        form.find("#"+key+"-error").addClass('error');
                    });
                }
            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });


    /*
    * ADD RATE
     */
    $('#add_rate_from').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_form = $('#modal_add_rate'),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.success){
                    modal_massage.find('h3').text('Ok!');
                    modal_massage.find('.rate-description').text('Ставка добавлена');
                }else{
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Ставка не добавлена!');
                }
                modal_form.modal('hide');
                modal_massage.modal('show');
            },
            error:function (xhr){
                if( xhr.status === 422 ) {
                    var errors = $.parseJSON(xhr.responseText);
                    $.each(errors['errors'], function (key, val) {
                        // form.find("#inp-" + key).parents('.inp-group').addClass('inp-error');
                        form.find('[name^="'+ key + '"]').addClass('error');
                        form.find("#"+key+"-error").addClass('error');
                    });
                }
            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });
    /*
    * EDIT RATE
     */
    $('.edit_rate_from').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_form = $('.modal_edit_rate'),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.success){
                    modal_massage.find('h3').text('Ok!');
                    modal_massage.find('.rate-description').text('Ставка обновлена');
                }else{
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Ставка не обновлена!');
                }
                modal_form.modal('hide');
                modal_massage.modal('show');
            },
            error:function (xhr){
                if( xhr.status === 422 ) {
                    var errors = $.parseJSON(xhr.responseText);
                    $.each(errors['errors'], function (key, val) {
                        // form.find("#inp-" + key).parents('.inp-group').addClass('inp-error');
                        form.find('[name^="'+ key + '"]').addClass('error');
                        form.find("#"+key+"-error").addClass('error');
                    });
                }
            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });
    /*
    * DELETE RATE
     */
    $('.delete_rate_from').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_form = $('.modal_delete_rate'),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.success){
                    modal_massage.find('h3').text('Ok!');
                    modal_massage.find('.rate-description').text('Ставка удалена');
                }else{
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Ставка не удалена!');
                }
                modal_form.modal('hide');
                modal_massage.modal('show');
            },
            error:function (xhr){

            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });

    /*
    * PAY RATE
     */
    $('.btn_pay').on('click', function(){
        var modal_purchase = $('#modal_purchase'),
            rate_name = $(this).parent('.item-row').find('.rate_name').text(),
            rate_id = $(this).parent('.item-row').find('.rate_id').text(),
            rate_cost = $(this).parent('.item-row').find('.rate_cost').text(),
            rate_user_email = $(this).parent('.item-row').find('.rate_email').text();

        modal_purchase.find('.rate-description').text(rate_name);
        modal_purchase.find('.price_bibs span').text(rate_cost);

        modal_purchase.find('form .pay_value').val(rate_cost);
        modal_purchase.find('form .pay_rate_id').val(rate_id);
        modal_purchase.find('form .pay_user_email').val(rate_user_email);

        modal_purchase.modal('show');
    });

    $('.btn_pay_noauth').on('click', function(){
        var modal_purchase = $('#modal_purchase_noauth'),
            rate_name = $(this).parent('.item-row').find('.rate_name').text(),
            rate_id = $(this).parent('.item-row').find('.rate_id').text(),
            rate_cost = $(this).parent('.item-row').find('.rate_cost').text();

        modal_purchase.find('.rate-description').text(rate_name);
        modal_purchase.find('.price_bibs span').text(rate_cost);

        modal_purchase.find('form .pay_value').val(rate_cost);
        modal_purchase.find('form .pay_rate_id').val(rate_id);

        modal_purchase.modal('show');
    });
    /*
    * ADD PAY IN DB
     */
    $('.add_pay').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_form = $('.modal_purchase'),
            modal_pay_confirm = $('#modal_pay_confirm'),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.status){
                    modal_form.modal('hide');
                    modal_pay_confirm.find('.price_bibs span').text(data.data.value);
                    modal_pay_confirm.find('.number_order span').text(data.data.order_id);
                    modal_pay_confirm.find('form #pay_price').val(data.data.value);
                    modal_pay_confirm.find('form #pay_number').val(data.data.order_id);
                    modal_pay_confirm.find('form #pay_code').val(data.data.code);
                    modal_pay_confirm.modal('show');
                }else{
                    modal_form.modal('hide');
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Произошла ошибка покупки');
                }
            },
            error:function (xhr){
                if( xhr.status === 422 ) {
                    var errors = $.parseJSON(xhr.responseText);
                    $.each(errors['errors'], function (key, val) {
                        // form.find("#inp-" + key).parents('.inp-group').addClass('inp-error');
                        form.find('[name^="'+ key + '"]').addClass('error');
                        form.find("#"+key+"-error").addClass('error');
                    });
                }
            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });

    /*
    * SET PROMO CODE
    */
    $('.modal_purchase').on('hidden.bs.modal', function (e) {
        $(this).find('.code_block input, .code_block span').fadeIn(250);
        $(this).find('.code_block .skidka').remove();
    });
    $('.btn-submit_promo_code').on('click', function(e){
        e.preventDefault();
        var data_array = {
            promo_code: $(this).parents('.code_block').find('input.pay_promo_code').val()
        },
            modal_purchase =  $(this).parents('.modal_purchase'),
            purchase_value = modal_purchase.find('input.pay_value').val(),
            code_block = $(this).parents('.code_block');
        $.ajax({
            type: 'GET',
            url: '/set_promo_code',
            data: data_array,
            processData: true,
            contentType: false,
            beforeSend: function(){

            },
            success: function(data) {
                console.log(data);
                if(data.status){
                    var new_val = purchase_value - data.value;
                    modal_purchase.find('input.pay_value').val(new_val);
                    modal_purchase.find('.price_bibs span').text(new_val);
                    code_block.find('input, span').fadeOut(250);
                    code_block.append('<span class="skidka">Ваша скидка - '+ data.value +'<span> <i class="fas fa-ruble-sign"></i>');
                }else{
                    alert('Код не найден или уже использован');
                }
            },
            error:function (xhr){
                console.log(xhr);
            },
            complete: function(){

            }
        });
    });


    /*
    * ADD PROMO CODE
     */
    $('#add_promo_code_from').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_form = $('#modal_add_promo_code'),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.success){
                    modal_massage.find('h3').text('Ok!');
                    modal_massage.find('.rate-description').text('Промо код добавлен');
                }else{
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Промо код не добавлен!');
                }
                modal_form.modal('hide');
                modal_massage.modal('show');
            },
            error:function (xhr){
                if( xhr.status === 422 ) {
                    var errors = $.parseJSON(xhr.responseText);
                    $.each(errors['errors'], function (key, val) {
                        // form.find("#inp-" + key).parents('.inp-group').addClass('inp-error');
                        form.find('[name^="'+ key + '"]').addClass('error');
                        form.find("#"+key+"-error").addClass('error');
                    });
                }
            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });
    /*
    * EDIT RATE
     */
    $('.edit_promo_code_from').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_form = $('.modal_edit_promo_code'),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.success){
                    modal_massage.find('h3').text('Ok!');
                    modal_massage.find('.rate-description').text('Промо код обновлен');
                }else{
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Промо код не обновлен!');
                }
                modal_form.modal('hide');
                modal_massage.modal('show');
            },
            error:function (xhr){
                if( xhr.status === 422 ) {
                    var errors = $.parseJSON(xhr.responseText);
                    $.each(errors['errors'], function (key, val) {
                        // form.find("#inp-" + key).parents('.inp-group').addClass('inp-error');
                        form.find('[name^="'+ key + '"]').addClass('error');
                        form.find("#"+key+"-error").addClass('error');
                    });
                }
            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });
    /*
    * DELETE PROMO CODE
     */
    $('.delete_promo_code_from').on('submit', function(e){
        e.preventDefault();
        var form = $(this),
            modal_form = $('.modal_delete_promo_code'),
            modal_massage = $('#modal_message'),
            f = form[0],
            fd = new FormData(f);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function(){
                form.find('.btn-submit').addClass('disabled');
            },
            success: function(data) {
                console.log(data);
                if (data.success){
                    modal_massage.find('h3').text('Ok!');
                    modal_massage.find('.rate-description').text('Промо код удален');
                }else{
                    modal_massage.find('h3').text('Ошибка!');
                    modal_massage.find('.rate-description').text('Промо код не удален!');
                }
                modal_form.modal('hide');
                modal_massage.modal('show');
            },
            error:function (xhr){

            },
            complete: function(){
                form.find('.btn-submit').removeClass('disabled');
            }
        });
    });


});
$(document).ready(function() {
    var field = $('input[name="images[]"]:first').clone();
    $('.add_images').click(function() {
        $(this).before(field);
        field = $(this).prev().clone();
        return false;
    });
    $('.less_images').click(function() {
        $('input[name="images[]"]:last').remove();
        return false;
    });

    function count_order()
    {
        var order = $.cookie('basket');
        order ? order=JSON.parse(order): order=[];
        var count=0;
        if(order.length>0)
        {
            for(var i=0; i<order.length; i++)
            {
                count=+count+parseInt(order[i].amount);
            }
        }
        $('.count_order').html(count);
    }
    $('.buy-btn').click(function()
    {
        var article_id = parseInt($(this).attr('id'));
        var order = $.cookie('basket');
        !order ? order=[] : order=JSON.parse(order);
        if(order.length==0)
        {
            order.push({'article_id': article_id, 'amount':1});
        }
        else
        {
            var flag=false; //флаг, который указывает, что такого товара в корзине нет
            for(var i=0; i<order.length; i++)
            {
                if(order[i].article_id==article_id)
                {
                    order[i].amount = +order[i].amount+1;
                    flag=true;
                }
            }

            if(!flag)
            {
                order.push({'article_id': article_id, 'amount':1});
            }
        }
        $.cookie('basket',JSON.stringify(order), { path: '/' });
        count_order();
    });
    //basket view
    function set_amount(article_id, amount)
    {
        var order=JSON.parse($.cookie('basket')); //получаем куки и переделываем в массив с объектами
        for(var i=0;i<order.length; i++) //перебераем весь массив с объектами
        {
            if(order[i].article_id == article_id) //ищем нжный id
            {
                order[i].amount=amount; // устанавливаем количество товара
            }
        }
        $.cookie('basket',JSON.stringify(order), { path: '/' }); // сохраняем все в куки
        count_order();
    }
    $('.total').change(function(){
        var value=$(this).val();
        if(value.match(/[^0-9]/g) || value<=0)
        {
            $(this).val('1');
        }
        var price = $(this).parent().prev().html();
        var cost = Math.round(value*price*100)/100;
        var old_cost = parseFloat($(this).parent().next().html());
        $(this).parent().next().html(cost);

        var total_cost = parseFloat($('.total_cost').html());
        total_cost += (cost - old_cost);
        $('.total_cost').html(total_cost);

        var article_id = $(this).parent().parent().children().first().html(); //получаем id товара
        set_amount(article_id, value);
    });
    $('.del_order').click(function()
    {
        var row = $(this).parent().parent();// выбираем всю строку в таблице
        var article_id = row.children().first().html();//получаем id товара
        row.remove();// удаляем строку
        var order=JSON.parse($.cookie('basket'));//получаем массив с объектами из куки
        for(var i=0;i<order.length; i++)
        {
            if(order[i].article_id==article_id)
            {
                order.splice(i,1); //удаляем из массива объект
            }
        }
        $.cookie('basket',JSON.stringify(order), { path: '/' });//сохраняем объект в куки
        count_order(); //обновляем корзину
        var all_order=$('tr'); //получаем все строки таблицы
        if(all_order.length<=1) location.reload(); //если нет ни одного заказа, то перезагружаем страницу
    });

    count_order();
    total_cost();
    $(".fancybox").fancybox();

});
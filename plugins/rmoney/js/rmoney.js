$(document).ready(function(){ 
    const user = 'lauren_c';
    const password = '40c998b87c09ddbaaeda';
    const auth_endpoint = 'https://api.roostermoney.com/v1/auth/';
    const balance_endpoint = 'https://api.roostermoney.com/v1/balance/';
    const authData = {
        'accessKey': user,
        'accessPassword': password
    }
    let walletVal = $('#wallet');
    let goalVal = $('#goal');
    let savingsVal = $('#savings');
    let totalVal = $('#total');

    const authenticate_then_get_balance = () => {

        $.when($.ajax({
            "crossDomain": true,
            "url": auth_endpoint,
            "method": "POST",
            "headers": {
                "Content-Type": "application/json",
            },
            "processData": false,
            "data": JSON.stringify(authData)
        })).done(function (response) {
            get_balance(response);
        }).fail(function( jqXHR ) {
            alert(jqXHR);
        });

    }

    const get_balance = (response) => {

        $.when($.ajax({
            "crossDomain": true,
            "url": balance_endpoint,
            "method": "GET",
            "headers": {
                "x-access-token": response.token,
            },
            "processData": false
        })).done(function (response) {
            $(function () {
                $('.fa-spin').each(function () {
                    $(this).hide();
                });
            });
            walletVal.val(parseFloat(response[0].walletBalance).toFixed(2));
            goalVal.val(parseFloat(response[0].goalBalance).toFixed(2));
            savingsVal.val(parseFloat(response[0].savingsBalance).toFixed(2));
            totalVal.val(parseFloat(response[0].totalBalance).toFixed(2));
        }).fail(function( jqXHR ) {
            alert(jqXHR);
        });;

    }

authenticate_then_get_balance();
});
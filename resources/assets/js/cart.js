/**
 * Created by rafael.franco on 27/02/2016.
 */
var formatadorMoeda = (function() {
    "use strict"
    var simbolo = "R$ ";
    var retorno = {
        numberParaReal: function (numero) {
            return numero.toFixed(2).replace(".", ",");
        },
        realParaNumber: function (texto) {
            return parseFloat(texto.replace(simbolo, "").replace(",",   "."));
        }
    };
    return retorno;
})();
(function($, fm){
    "use strict";
    $('a[id=updateButton]').click(function(){
        var $this=this,
            id = $($this)
                .closest('tr')
                .find('.cart_description p span')
                .text(),
            quantity = parseInt($($this)
                .closest('tr')
                .find('input[type=number]')
                .val());

        $.get("cart/update-item/", {id: id, quantity: quantity}).done(function(data){
            $($this)
                .closest('tr')
                .find('.cart_total .price_clean').html('R$ ' + fm.numberParaReal(data.subTotal));
            $($this)
                .closest('tr')
                .find('.cart_quantity p').html(data.qtd);
            $('#spanTotalFinal').html(fm.numberParaReal(data.total));
        });
    });
})(jQuery, formatadorMoeda);
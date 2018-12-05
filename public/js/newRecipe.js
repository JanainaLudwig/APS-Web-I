$(document).ready(() => {
    addNewIngredient();
});


function addNewIngredient() {

    var quantityName = (number) => {
        return 'ingredient[' + number + '][quantity]';
    };

    var measureName = (number) => {
        return 'ingredient[' + number + '][measure]';
    };

    var ingredientName = (number) => {
        return 'ingredient[' + number + '][name]';
    };

    $('#newIngredient').on('click', () => {
        $(".ingredientForm").last().clone().appendTo($("#ingredients"));
        ingredientsIndex();
    });

    $('.remove-ingredient').each(function () {
        console.log(this)
        $(this).on('click', function () {
            if ($('.ingredientForm').length == 1) return;
           $(this).parent().parent().parent().parent().remove();
           ingredientsIndex();
        });
    });

    function ingredientsIndex() {
        $(".ingredientForm").each(function (index) {
            $($(this).find('input')[0]).attr('name', quantityName(index));
            $($(this).find('input')[1]).attr('name', measureName(index));
            $($(this).find('input')[2]).attr('name', ingredientName(index));
        });
        $('.remove-ingredient').each(function () {
            console.log(this)
            $(this).on('click', function () {
                if ($('.ingredientForm').length == 1) return;
                $(this).parent().parent().parent().parent().remove();
                ingredientsIndex();
            });
        });
    }
}



$(document).ready(() => {
    checkIngredients();

    let ingredientsList = $('#ingredients-list');
    
    $('#uncheck').on('click', function () {
        $('#ingredients-list li').each(function () {
            $(this).children().prop('checked', false);
            $(this).removeClass('ingredient-used');
        });
    });

    $('#ingredients_quantity').on('change', function () {
        if ($(this).val() < 0.5) {
            $(this).val(0.5);
            return;
        }


        let recipeId = $(this).attr('data-recipe-id');

        $.ajax( "/recipes/ingredients/" + recipeId)
            .done((response) => {
                $(ingredientsList).html('');
                for (let ingredient of response) {
                    $(ingredientsList).append(liIngredient(ingredient, $(this).val()));
                }
                checkIngredients();
            })
            .fail(() => {
                $(this).val(1);
            });
    });
});

function liIngredient(ingredient, quantity) {
    return '<li><input type="checkbox" class="form-check-input check-ingredient"> ' + ingredient.quantity * quantity + ' ' + ingredient.measure + ' de ' + ingredient.name + '</li>';
}

function checkIngredients() {
    $('.check-ingredient').each(function () {
        $(this).on('click', () => {
            if ($(this).is(':checked')) {
                $(this).parent().addClass('ingredient-used');
            } else {
                $(this).parent().removeClass('ingredient-used');
            }
        });
    });
}

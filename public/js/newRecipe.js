$(document).ready(() => {
    addNewIngredient();
});


function addNewIngredient() {
    var number;

    var quantityName = () => {
        return 'ingredient[' + number + '][quantity]';
    };

    var measureName = () => {
        return 'ingredient[' + number + '][measure]';
    };

    var ingredientName = () => {
        return 'ingredient[' + number + '][name]';
    };

    $('#newIngredient').on('click', () => {
        $(".ingredientForm").last().clone().appendTo($("#ingredients"));

        let ingredientForm = $(".ingredientForm")[$(".ingredientForm").length - 1];

        number = parseInt(ingredientForm.getAttribute('data-number')) + 1;
        ingredientForm.setAttribute('data-number', number);

        let quantity = $(ingredientForm).children('div')[0];
        quantity = $(quantity).children('input')[0];
        quantity.setAttribute('name', quantityName());
        quantity.value = 1;

        let measure = $(ingredientForm).children('div')[1];
        measure = $(measure).children('select')[0];
        measure.setAttribute('name', measureName());

        let ingredient = $(ingredientForm).children('div')[2];
        ingredient = $(ingredient).children('input')[0];
        ingredient.setAttribute('name', ingredientName());
        ingredient.value = '';
    })
}

var newElement = {
    typeSelected: "",
    text: function () {
    }
};

$(document).on("click", ".selectType", function () {
    newElement.typeSelected = $(this).data("type");
    if (newElement.typeSelected === 0) {
        newElement.text();
        popup.close();
    }
    if (newElement.typeSelected === 1) {
        content = "";
    }
    if (newElement.typeSelected === 2) {
        content = "";
    }
    popup.open(content, 'html', $('a.popup'));
});
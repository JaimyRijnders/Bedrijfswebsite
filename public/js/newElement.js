var popup = popup;
var newElement = {
    typeSelected: "",
    text: function (parentId) {
        $.ajax({
            method: "POST",
            data: {
                parent: parentId,
                target: "insert"
            },
            url: "/Bedrijfswebsite/ajax"
        }).done(function (data) {
            if (data[0] !== false) {
                $("[data-parent='" + parentId + "']").before(data);
            }
        });
    },
    
    image: function(parentId){
        
    }
};
$(document).on("click", ".selectType", function () {
    var continuePopup = true;
    newElement.typeSelected = $(this).data("type");
    if (newElement.typeSelected === 0) {
        continuePopup = false;
        newElement.text(popup.parentId);
        popup.close();
    }
    if (continuePopup) {
        content = "newElement/image/" + newElement.typeSelected;
        popup.open(content, 'ajax', $('a.popup'));
        
    }
})
        .on("click", "#addCssElement", function(){
            var toAdd = '<div id="cssElement"><input type="text" placeholder="property" name="property[]"/>: <input type="text" placeholder="variabele" name="var[]" /></div></div>';
            $(".cssElement").last().after(toAdd);
});

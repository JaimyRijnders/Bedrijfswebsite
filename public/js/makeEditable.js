var editing = {
    click: function (e) {
        console.log(e);
        e.id = "editing";
        $("#editing").removeClass("editable");
        element = document.getElementById("editing");
        element.innerHTML = "<textarea id='editingArea' width='100%'>" + element.textContent + "</textarea>";
        newTextArea = document.getElementById("editingArea");
        newTextArea.focus().autoSize();

    },
    removeEditing: function () {
        text = $("#editing textarea").val();
        $("#editing").html($("#editingArea").val());
        $("#editing").addClass("editable").attr("id", "")
    }
}
$("document").ready(function () {
    $(document)
            .on("focusout", "#editing textarea", function () {
                console.log("Blurry");
               editing.removeEditing();
            })
            .on("click", ".editable", function () {
                console.log(this);
                editing.click(this);
            });
});
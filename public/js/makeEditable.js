var editing = {
    click: function (e) {
        console.log(e);
        e.id = "editing";
        $("#editing").removeClass("editable");
        element = document.getElementById("editing");
        element.innerHTML = "<textarea id='editingArea' width='100%'>" + element.textContent + "</textarea>";
        newTextArea = document.getElementById("editingArea");
        newTextArea.focus();

    },
    removeEditing: function () {
        text = $("#editing textarea").val();
        $("#editing").html($("#editingArea").val());
        $("#editing").addClass("editable").attr("id", "")
    },
    sendWithAjax: function (id, content) {
        $.ajax({
            method: "POST",
            data: {
                id: id,
                content: content,
                target: "send"
            },
            url: "/Bedrijfswebsite/ajax"
        }).done(function (data) {
            console.log(data);

        });
    }
}
$("document").ready(function () {
    $(document)
            .on("focusout", "#editing textarea", function () {
                console.log("Blurry");
                $.when(editing.sendWithAjax(1, $("#editing textarea").val())).done(function () {
                    editing.removeEditing();
                });
            })
            .on("click", ".editable", function () {
                console.log(this);
                editing.click(this);
            });
});
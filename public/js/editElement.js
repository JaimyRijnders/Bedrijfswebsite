/*
 * Cookie Clicker save:
 MS4wNDY2fHwxNDM5NDkwNzEyNjk0OzE0Mzk0OTA3MTI2OTQ7MTQ0MTA5MjIzOTEzNTtPcnRlaWx8MDAxMTAwMTAxMDF8MTc1MjEyMzc2NzYxMzU5LjU7MjQ5NTM4OTU1NDU5MTM4Nzs4MzAxOzU7NTE3MzE0NjUxMjQ3My43ODsxMDg5Oy0xOy0xOzA7MjswOzA7NzM7Mjk0NDA7MDs1OzM0MTQyMDU1NjIzNzk0Ljc0OzU1OzA7MDswOzA7OzA7MDt8MjAwLDIwMCw1NTgzNDQwNzU5MjkxLDA7MTcwLDE3MiwxMzM3OTI4MjUzNDI2MiwwOzE1MCwxNTAsMTUwMTM1Mjg4NzIsMDsxMDAsMTAxLDMzMzU4NDI5MzI0LDA7MTAwLDEwMCwxMTc3MTg1NzA2OTUsMDsxMDAsMTAxLDMwNTc1NzQxNzMzOSwwOzEwMCwxMDAsMTE2NTM3NjMzOTc2NSwwOzEwMCwxMDAsMTcxMzgzNTAwODM1ODAsMDs4NCw4NSw5Mjc3ODgxMDE4NzcxNCwwOzUwLDUwLDI0NTIyMDc2MzQyNDc5NCwwOzUwLDUwLDE4OTEyNzk2MzYwMDM0MjIsMDt8NDUwMzU5OTYyNzM3MDQ5NTs0NTAzNTk5NjI3MzcwNDk1OzIzOTI1MzczMDIwNDAwOTU7NDUwMzU3MzcyMzQ3ODUyNzsyMjUzNDgzNDM4OTQ0MTkxOzIyNTE3OTk4MTM2ODUyNDk7MjI1MTc5OTgxMzY4NTI1OTsyMjUxNzk5ODEzNjkxNjQ3OzIyNTE3OTk4MTM2ODUyNDk7MzI3Njl8NDUwMzU5NzU0NjkzMDE3NTsyMjU0ODQ1MjEwMTgxNjMxOzIyNTE4MjU2MzM4ODY0Mzk7NjI5MjQ4MQ%3D%3D%21END%21
 */

var editing = {
    click: function (e) {
        e.id = "editing";
        $("#editing").removeClass("editable");
        element = document.getElementById("editing");
        element.innerHTML = "<textarea id='editingArea' data-id='" + $("#editing").data("id") + "'>" + element.textContent + "</textarea>";
        newTextArea = document.getElementById("editingArea");
        newTextArea.focus();

    },
    removeEditing: function () {
        text = $("#editing textarea").val();
        $("#editing").html($("#editingArea").val());
        $("#editing").addClass("editable").attr("id", "");
    },
    newElement: function (parent) {
        $.ajax({
            method: "POST",
            data: {
                parent: parent,
                target: "insert"
            },
            url: "/Bedrijfswebsite/ajax"
        }).done(function (data) {
            if(data[0] !== false){
                $("[data-parent='" + parent + "']").before(data);
            }
        });
    },
    deleteElement: function(id){
        $.ajax({
            method: "POST",
            data: {
                id: id,
                target: "delete"
            },
            url: "/Bedrijfswebsite/ajax"
        }).done(function (data) {
            if(data === "1"){
                $("[data-id='" + id + "']").remove();
            } else{
                alert("Er is iets misgegaan" + data.length);
            }
        });
    },
    sendWithAjax: function (id, content) {
        $.ajax({
            method: "POST",
            data: {
                id: id,
                content: content,
                target: "update"
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
                var id = $(this).data("id");
                var content = $("#editing textarea").val();
                $.when(editing.sendWithAjax(id, content)).done(function () {
                    editing.removeEditing();
                });
            })
            .on("click", ".editable", function () {
                editing.click(this);
            })
            .on("click", ".addElement", function () {
                var parent = $(this).data("parent");
                editing.newElement(parent);
            })
            .on("click", ".deleteElement", function () {
                var id = $(this).data("id");
                editing.deleteElement(id);
            });
});

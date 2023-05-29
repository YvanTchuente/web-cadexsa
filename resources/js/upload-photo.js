$("#photo-upload-form").parent().parent().removeClass("hidden");
$("#photo-upload-form").parent().parent().hide();

$("#upload_box").on({
    dragover: function (e) {
        e.preventDefault();
        e.originalEvent.dataTransfer.dropEffect = "move";
    },
    drop: function (e) {
        if (e.originalEvent.dataTransfer.files[0].type == "image/jpeg") {
            e.preventDefault();
            const reader = new FileReader();
            reader.onload = displayPhoto;
            const files = e.originalEvent.dataTransfer.files;
            reader.readAsDataURL(files[0]);
            document.getElementById("photo-input").files = files;
        } else {
            Swal.fire({
                icon: "error",
                text: "The file must be a JPEG image",
            });
        }
    },
});

$("#select-photo").click(function () {
    $("#photo-input").click();
});

$("#show-details-form-button").click(function () {
    $("#photo-upload-form").parent().parent().show();
});

$("#photo-input").change(function (e) {
    if (e.currentTarget.files[0].type == "image/jpeg") {
        const reader = new FileReader();
        reader.onload = displayPhoto;
        reader.readAsDataURL(e.currentTarget.files[0]);
    } else {
        Swal.fire({
            icon: "error",
            text: "The file must be a JPEG image",
        });
    }
});

$("#cancel-photo-upload").click(function () {
    $("#photo-upload-form").parent().parent().hide();
    $("#upload_box").find("img").remove();
    $("#upload_box").children().first().toggle();
    $("#show-details-form-button").parent().parent().hide();
});

$("#remove-photo-button").click(function () {
    $("#upload_box").find("img").remove();
    $("#upload_box").children().first().toggle();
    $(this).parent().parent().hide();
});

function displayPhoto() {
    $("#upload_box").children().first().toggle();
    const img = document.createElement("img");
    img.className = "h-full w-full object-cover";
    img.src = this.result;
    $("#upload_box").append(img);
    $("#show-details-form-button").parent().parent().show();
}

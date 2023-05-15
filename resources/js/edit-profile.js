const upload_avatar = document.getElementById("upload-avatar");
const reset_avatar = document.getElementById("reset-avatar");
const avatar = document.getElementById("avatar");
const avatar_input = document.querySelector("input[name='avatar']");
const removeAvatar = document.getElementById("removeAvatar");

const initial_avatar = avatar.src;
const default_avatar =
    document.location.origin + "/images/graphics/default-profile-picture.png";

upload_avatar.addEventListener("click", (e) => {
    avatar_input.click();
});

avatar_input.addEventListener("change", (e) => {
    if (e.currentTarget.files) {
        const files = e.currentTarget.files;

        if (!/jpeg$/.test(files[0].type)) {
            return;
        }

        const reader = new FileReader();
        reader.onload = () => {
            avatar.src = reader.result;
        };

        reader.readAsDataURL(files[0]);
    }
});

reset_avatar.addEventListener("click", () => {
    avatar_input.value = "";

    if (avatar.src !== initial_avatar) {
        avatar.src = initial_avatar;
        removeAvatar.removeAttribute("checked");
    } else if (
        avatar.src == initial_avatar &&
        initial_avatar !== default_avatar
    ) {
        avatar.src = default_avatar;
        removeAvatar.setAttribute("checked", "");
    }
});

const tgl = document.getElementById('waktu');

const showFormattedDate = (date) => {
    const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric"
    }
    return new Date(date).toLocaleDateString("id-ID", options)
}

const x = document.qu


const date = showFormattedDate(new Date()).split(',');
tgl.children[0].innerHTML = date[0] + "<span>" + date[1] + "</span>"


document.addEventListener("DOMContentLoaded", function () {
    const openPopupButton = document.getElementById("openPopupButton");
    const darkModePopup = document.getElementById("darkModePopup");
    const enableDarkModeButton = document.getElementById("enableDarkModeButton");
    const disableDarkModeButton = document.getElementById("disableDarkModeButton");
    const closePopupButton = document.getElementById("closePopupButton");

    // Popup dengan addEventListener
    openPopupButton.addEventListener("click", () => {
        darkModePopup.style.display = "block";
    });

    // Enable Dark Mode dengan klik
    enableDarkModeButton.addEventListener("click", () => {
        document.body.classList.add("dark-mode"); // Menambahkan class "dark-mode" ke body
    });

    // Disable Dark Mode dengan klik
    disableDarkModeButton.addEventListener("click", () => {
        document.body.classList.remove("dark-mode"); // Menghapus class "dark-mode" dari body
    });

    // Close the popup when the "Tutup" button is clicked
    closePopupButton.addEventListener("click", () => {
        darkModePopup.style.display = "none";
    });
});


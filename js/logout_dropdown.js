// Logout Dropdown

var flag = false;

function showDropdown() {
    console.log("sidebar button");

    if (flag == false) {
        document.getElementById('dropdown').style.display = "block";
        flag = true;
    } else {
        document.getElementById('dropdown').style.display = "none";
        flag = false;
    }
}
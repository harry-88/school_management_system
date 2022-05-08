let hide = false;

function hideSidebar() {

    if (hide == false) {
        console.log('Clicked');
        document.getElementById('sidebar').style.marginLeft = "-250px";
        document.getElementById('content').style.marginLeft = "0";
        hide = true;
    }
    else {
        document.getElementById('sidebar').style.marginLeft = "0";
        document.getElementById('content').style.marginLeft = "250px";
        hide = false;
    }

}
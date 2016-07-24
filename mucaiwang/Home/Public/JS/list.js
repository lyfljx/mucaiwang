window.onload=function () {
    list_1_change();
    list_2_change();
}
function list_1_change() {
    document.getElementById("list_1").style.display='block';
    document.getElementById("list_2").style.display='none';
}
function list_2_change() {
    document.getElementById("list_1").style.display='none';
    document.getElementById("list_2").style.display='block';
}

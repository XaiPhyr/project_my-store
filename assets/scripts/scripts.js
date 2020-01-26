
function openNav() {
    document.getElementById("sidenavigation").style.width = "275px";
    document.getElementById("main").style.marginLeft = "275px";
}

function closeNav() {
    document.getElementById("sidenavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

function compute() {
    var init_total = document.getElementById("total").textContent;
    var init_cash = document.getElementById("cash").value;

    var total = init_cash - init_total;
    var decimals = total.toFixed(2);

    document.getElementById("change").innerHTML = "$ " + addCommas(decimals);
}

function addCommas(value) {
    value += '';
    x = value.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
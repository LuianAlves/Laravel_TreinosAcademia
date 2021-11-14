document.addEventListener("DOMContentLoaded", function() {

    var values = ["1", "2", "3", "4", "5"]

    document.getElementById("frequencia").addEventListener("input", function(e) {

        var text = values[e.target.value];

        // document.querySelector(".indicator").style.left = Number((e.target.value*5)-(2*e.target.value)) + "%";

        document.querySelector(".indicator").innerHTML = text;
    });
});
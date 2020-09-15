var buttons = document.getElementsByTagName("button");
var champ = document.getElementById("champ");

for (var i = 0; i < buttons.length; i++) {
    var problem = "";
    buttons[i].onclick = function () {
        if (this.textContent == "C") {
            champ.value = "";
            problem = "";
        } else if (this.textContent == "." || problem.slice(-1) == ".") {
            champ.value += this.textContent;
            problem += this.textContent;
        } else if (this.textContent == "=") {
            champ.value = eval(problem);
        } else {
            champ.value = this.textContent;
            problem += this.textContent;
        }
    };
}

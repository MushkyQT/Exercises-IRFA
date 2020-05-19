let area, perimeter;

function areaCalc(l, w) {
  if (isNaN(l) || isNaN(w)) {
    alert("Invalid length or width, please refresh and try again.");
    return;
  }
  area = l * w;
  document.write("<p>The area of your " + l + " by " + w + " rectangle is: " + area + "</p>");
}

function periCalc(l, w) {
  if (isNaN(l) || isNaN(w)) {
    alert("Invalid length or width, please refresh and try again.");
    return;
  }
  perimeter = 2 * (l + w);
  document.write("<p>The perimeter of your " + l + " by " + w + " rectangle is: " + perimeter + "</p>");
}

document.write("<h1> This will calculate the area and perimeter of a rectangle.</h1>");
let choice = confirm("Press OK to calculate area or Cancel to calculate perimeter: ");

if (choice == true) {
  let length = parseInt(prompt("You chose to calculate area, please enter the length of your rectangle: "));
  let width = parseInt(prompt("Now enter the width: "));
  areaCalc(length, width);
} else if (choice == false) {
  let length = parseInt(prompt("You chose to calculate perimeter, please enter the length of your rectangle: "));
  let width = parseInt(prompt("Now enter the width: "));
  periCalc(length, width);
}

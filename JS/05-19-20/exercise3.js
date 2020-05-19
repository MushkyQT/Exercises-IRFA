function isNum(j) {
  if (j === false) {
    j = parseInt(prompt("Incorrect input. Please enter a new number: "));
  } else {
    j = parseInt(prompt("Please enter a number: "));
  }
  if (isNaN(j)) {
    isNum(false);
  } else {
    document.write("<h1> Your input of " + j + " is a number!</h1>");
    return;
  }
}

isNum();

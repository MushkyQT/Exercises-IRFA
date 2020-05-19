function numCompare(one, two) {
  if (one > two) {
    alert("The greater number is " + one);
  } else if (one < two) {
    alert("The greater number is " + two);
  } else if (one == two) {
    alert("The numbers are equal");
  } else {
    alert("Error occurred, invalid input(s)");
  }
}

numCompare(parseInt(prompt("Please enter a number:")), parseInt(prompt("Enter a second number:")));
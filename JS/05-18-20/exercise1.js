let year = prompt(
  "Please enter a year to check if it is a leap (bissextile) year: "
);

if (isNaN(year)) {
  alert(year + " is not a valid year. Please refresh and try again.");
} else if ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) {
  alert("The year " + year + " is a leap (bissextile) year.");
} else {
  alert("The year " + year + " is not a leap (bissextile) year.");
}

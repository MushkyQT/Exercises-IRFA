let firstNames = [], firstName, proceed = true, names = '';

while (proceed) {
  firstName = prompt("Enter a first name or submit an empty field to end: ");

  if (firstName) {
    firstNames.push(firstName);
    console.log(firstNames);
  } else {
    proceed = false;
  }
}

if (firstNames.length == 0) {
  alert('You have not entered any names. Please refresh.');
} else {
  for(let i = 0; i < firstNames.length; i++) {
    names += firstNames[i] + ' ';
  }
  alert(names);
}



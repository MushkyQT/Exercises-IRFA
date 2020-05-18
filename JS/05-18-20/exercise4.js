for (let num = 0; num <= 100; num++) {
  let i = 0;
  let isPrime = true;
  while (i < 8) {
    if (num == 1) {
      isPrime = false;
      break;
    }
    if (num % i == 0 && i != num && i != 1) {
      isPrime = false;
    }
    i++;
  }
  if (isPrime == true) {
    document.write("<p>isPrime: " + num + "</p>");
  }
}

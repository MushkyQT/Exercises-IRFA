function randomizeNum(min, max) {
  let num = min + (max-min+1)*Math.random();
  return Math.floor(num);
}

let randomNum = randomizeNum(1, 100);
console.log(randomNum);
let guess = parseInt(prompt("Your goal is to guess the random number chosen by the computer. It lies between 1 and 100. Make your first guess: "));

while (guess !== randomNum) {
  if (isNaN(guess)) {
    guess = parseInt(prompt("Enter a number you fool! "));
  } else if (guess > randomNum) {
    guess = parseInt(prompt("Incorrect, the number is less than " + guess));
  } else if (guess < randomNum) {
    guess = parseInt(prompt("Incorrect, the number is more than " + guess));
  }
}

if (guess == randomNum) {
  alert('Congratulations! You win! The number was ' + randomNum);
} else {
  alert('Not sure how, but you lost.');
}
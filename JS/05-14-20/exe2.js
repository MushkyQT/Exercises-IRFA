let age = parseInt(prompt("Please enter your age: "));
if (age <= 0) {
  alert("You're too young to use this website. Come back when you exist.");
} else if (age > 0 && age <= 12) {
  alert("Ahhh... the golden days. Enjoy carefree living while it lasts.");
} else if (age > 12 && age < 20) {
  alert("You cost your parents way more money than you're worth");
} else if (age >= 20) {
  alert("HAH. OLD. LOOOOOOOL");
} else {
  alert("??? No age");
}

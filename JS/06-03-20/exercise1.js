function Person(firstName, lastName, age, sex, hobbies) {
  let pronoun = "He";
  this.name = {
    firstName,
    lastName,
  };
  this.age = age;
  this.sex = sex;
  this.hobbies = hobbies;
  this.bio = function () {
    if (
      this.sex == "f" ||
      this.sex == "female" ||
      this.sex == "femme" ||
      this.sex == "woman"
    ) {
      pronoun = "She";
    }
    alert(
      this.name.firstName +
        " " +
        this.name.lastName +
        " is " +
        this.age +
        " years old. " +
        pronoun +
        " likes " +
        this.hobbies.join(", ") +
        "."
    );
  };
  this.salutation = function () {
    alert("Hello! My name is " + this.name.firstName + ".");
  };
}

let denzel = new Person("Denzel", "Scroffeld", 23, "m", [
  "singing opera",
  "studying latin",
  "and eating sardines",
]);
let stacy = new Person("Stacy", "Smaum", 36, "femme", [
  "pool parties",
  "rockstars",
  "and having it goin' on",
]);
let donald = new Person("Lil Donald", "Pump", 19, "male", ["oppression"]);

denzel.salutation();
denzel.bio();

stacy.bio();

donald.bio();

function Person(firstName, lastName, age, sex, hobbies) {
  this.name = {
    firstName,
    lastName,
  };
  this.age = age;
  this.sex = sex;
  this.hobbies = hobbies;
}

Person.prototype.hello = function () {
  alert("Hello! My name is " + this.name.firstName + ".");
};

function Student(firstName, lastName, age, sex, hobbies, school, major) {
  Person.call(this, firstName, lastName, age, sex, hobbies);
  this.school = school;
  this.major = major;
}

function Professor(firstName, lastName, age, sex, hobbies, school, course) {
  Student.call(this, firstName, lastName, age, sex, hobbies, school);
  this.course = course;
}

Professor.prototype = Object.create(Person.prototype);

Student.prototype = Object.create(Person.prototype);

Student.prototype.sayHello = function () {
  let pronoun;

  if (
    this.sex == "m" ||
    this.sex == "male" ||
    this.sex == "man" ||
    this.sex == "gentleman"
  ) {
    pronoun = "Mr. ";
  } else {
    pronoun = "Ms. ";
  }

  alert(
    "Hello. My name is " +
      pronoun +
      this.name.firstName +
      " " +
      this.name.lastName +
      ". My school is " +
      this.school +
      " and my major is " +
      this.major +
      "."
  );
};

Professor.prototype.sayHello = function () {
  let pronoun;

  if (
    this.sex == "m" ||
    this.sex == "male" ||
    this.sex == "man" ||
    this.sex == "gentleman"
  ) {
    pronoun = "Mr. ";
  } else {
    pronoun = "Ms. ";
  }

  alert(
    "Hello. My name is " +
      pronoun +
      this.name.firstName +
      " " +
      this.name.lastName +
      ". I teach at " +
      this.school +
      " and my class is " +
      this.course +
      "."
  );
};

let emma = new Student(
  "Emma",
  "Subachev",
  22,
  "f",
  ["programming", "economics", "gardening"],
  "Cold Data U",
  "Computer Science & Algorithms"
);

let cody = new Professor(
  "Cody",
  "Lanez",
  34,
  "m",
  ["philosophy", "reading", "biking"],
  "Santa Monica College",
  "Psychology"
);

emma.sayHello();
cody.sayHello();

let family = {
  me: "Charles",
  fiancee: "Mushky",
  mother: "Delphine",
  grandfather: "Rene",
  grandmother: "Christine",
};

for (let id in family) {
  document.write("</p>" + id + ": " + family[id] + "</p>");
}

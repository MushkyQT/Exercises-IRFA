export function disUneCouleurAuHasard(idDiv) {
    var caracteresHexa = "0123456789ABCDEF".split("");
    var couleurAuHasard = "#";
    for (var i = 0; i < 6; i++) {
        couleurAuHasard += caracteresHexa[Math.floor(Math.random() * 16)];
    }
    document.getElementById(idDiv).style.backgroundColor = couleurAuHasard;
}

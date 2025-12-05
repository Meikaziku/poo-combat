//  JavaScript (juste pour le visuel, rien de logique serveur)

let maxPoints = 10;
let baseStats = {
  hp: parseInt(document.querySelector("#hp").value),
  attaque: parseInt(document.querySelector("#attaque").value),
};
let pointRestants = maxPoints;

function changeStat(stat, amount) {
  // Si l'utilisateur essaye d'ajouter un point alors qu'il n'en reste pas
  if (amount > 0 && pointRestants === 0) return;

  // Si l'utilisateur essaye d'enlever un point alors qu'il en reste déjà le maximum à dépenser
  if (amount < 0 && pointRestants === maxPoints) return;

  let input = document.querySelector("#" + stat);
  let value = parseInt(input.value);

  if (amount < 0 && value === baseStats[stat]) return;

  value += amount;
  pointRestants -= amount;

  document.querySelector("#" + stat).value = value;
  document.querySelector("#pointsRestants").innerText = pointRestants;
}

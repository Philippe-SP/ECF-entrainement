// Bouton burger //
icons.addEventListener('click', () => {
    nav.classList.toggle("active")
});

//requete AJAX pour afficher les commentaires
const form = document.getElementById('form')
const avisPosted = document.getElementById('avisPosted')
const notePosted = document.getElementById('notePosted')
const comPosted = document.getElementById('comPosted')

let formData = new FormData()

form.addEventListener('submit', (event) => {
    event.preventDefault()
    let noteValue = document.getElementById('note').value
    let comValue = document.getElementById('com').value
    let recetteID = document.getElementById('recetteID').value
    avisPosted.style.display = 'block'
    notePosted.innerText = noteValue
    comPosted.innerText = comValue
    formData.append("note", noteValue)
    formData.append("com", comValue)
    formData.append("recetteID", recetteID)
    fetch('./DBavis.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(error => 'Erreur: ' + error)
})



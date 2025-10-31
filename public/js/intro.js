
function onResponse(response) {
    return response.json();
  }

function onJson (json){
    console.log (json);
    for (let i=0; i<25; i++) {
        const poster = document.createElement('div');
        poster.dataset.id = json.items[i].id;
        poster.dataset.title = json.items[i].title;
        poster.dataset.year = json.items[i].year;
        poster.dataset.imDbRating = json.items[i].imDbRating; 
        poster.dataset.image = json.items[i].image;
        const title = document.createElement ('h2');
        const img = document.createElement ('img');
        title.textContent = json.items[i].title;
        img.src = json.items[i].image;
        poster.appendChild (title);
        poster.appendChild (img);
        poster.classList.add ('poster');
        container.appendChild(poster);
        
        poster.addEventListener('click',select);

    }
} 


function select(event) {
    event.stopPropagation();
    const selected = event.currentTarget;
    selezionati.push(selected);
    selected.classList.add('selected');
    selected.removeEventListener('click', select);
    selected.addEventListener('click', deselect);
  }
  
function deselect (event){
    event.stopPropagation();
    const deselected = event.currentTarget;
    for (let i=0; i<selezionati.length; i++ ){
        if (selezionati[i] === deselected){
            selezionati.splice(i,1);
            deselected.classList.remove ('selected');
            deselected.removeEventListener('click', deselect); 
            deselected.addEventListener('click', select);
            break;
        }
    }
}

function saveFilm(event) {
    console.log("Salvataggio");
    event.stopPropagation();
  
    // Itera su tutti gli elementi selezionati
    for (let i = 0; i < selezionati.length; i++) {
      const selected = selezionati[i];
      const formData = new FormData();
      formData.append('id', selected.dataset.id);
      formData.append('title', selected.dataset.title);
      formData.append('year', selected.dataset.year);
      formData.append('imDbRating', selected.dataset.imDbRating);
      formData.append('image', selected.dataset.image);
      formData.append('_token', csrf_token);

  
      // Invia una richiesta di salvataggio per ogni elemento selezionato
      fetch(BASE_URL + "save/film", { method: 'post', body: formData }).then(onResponse).then(dispatchError);
    }
    saveButton.removeEventListener('click', saveFilm);
    series();
  
  }
  
  
  function dispatchError(json) { 
    console.log(json);
    
  }
  
  
function series (){
    container.innerHTML = "";
    selezionati = [];
    fetch (BASE_URL +"intro/searchSeries").then(onResponse).then(onJson);
    saveButton.addEventListener ('click', saveSeries);
    
}

function saveSeries (event){
    console.log("Salvataggio");
    event.stopPropagation();
    for (let i = 0; i < selezionati.length; i++) {
        const selected = selezionati[i];
        const formData = new FormData();
        formData.append('id', selected.dataset.id);
        formData.append('title', selected.dataset.title);
        formData.append('year', selected.dataset.year);
        formData.append('imDbRating', selected.dataset.imDbRating);
        formData.append('image', selected.dataset.image);
        formData.append('_token', csrf_token);
  
        fetch(BASE_URL + "save/series", { method: 'post', body: formData }).then(onResponse).then(dispatchError);
    }
    saveButton.removeEventListener ('click', saveSeries);
    saveButton.setAttribute ('href', 'profile');
}



fetch (BASE_URL +"intro/searchFilms").then(onResponse).then(onJson);
var selezionati = [];
const container = document.getElementById('results');
const saveButton = document.getElementById('saveButton');
saveButton.addEventListener('click', saveFilm);



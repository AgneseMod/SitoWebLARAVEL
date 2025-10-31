

  function onResponse(response) {
    if (!response.ok) {return null};
    return response.json();
  }
  
  function onJsonMovie(json) {
    
    console.log(json);
   
    filmsContainer.innerHTML = "";
    for (let i = 0; i < json.length; i++) {
      console.log (json[i]);
      const overlay=document.createElement('div');
      const icon=document.createElement('img');
      const poster = document.createElement('div');
      const title = document.createElement('h2');
      const img = document.createElement ('img');

      overlay.classList.add ('overlay');
      icon.classList.add ('x-icon');
      title.textContent = json[i].titolo;
      img.src = json[i].img;

      poster.dataset.id=json[i].film_id;
      poster.appendChild (title);
      poster.appendChild (img);
      poster.appendChild(overlay);
      poster.appendChild(icon);

      poster.classList.add ('poster');
      filmsContainer.appendChild(poster);
      
      icon.addEventListener('click', remove_film);
      
    }
    
  }
  
  function onJsonSeries(json) {
    
    console.log(json);
    
    seriesContainer.innerHTML = "";
    for (let i = 0; i < json.length; i++) {
      console.log (json[i]);
      const overlay = document.createElement('div');
      const icon = document.createElement('img');
      const poster = document.createElement('div');
      const title = document.createElement('h2');
      const img = document.createElement ('img');

      overlay.classList.add ('overlay');
      icon.classList.add ('x-icon');
      
      title.textContent = json[i].titolo;
      img.src = json[i].img;
      
      poster.dataset.id=json[i].serie_id;
      
      poster.appendChild (title);
      poster.appendChild (img);
      poster.appendChild(overlay);
      poster.appendChild(icon);
      
      poster.classList.add ('poster');
      seriesContainer.appendChild(poster);
      
      icon.addEventListener('click', remove_series);
      
    }
  }

  function remove_film (event){
    event.stopPropagation();
    PosterClick = event.currentTarget.parentNode;
    console.log('rimozione');
    const formData = new FormData;
    formData.dataset.id= PosterClick.dataset.id;
    formData.append('_token', csrf_token);
    const film_id=PosterClick.dataset.id;
    console.log(film_id);
    fetch(BASE_URL + "preferiti/remove_film" + {method:'post' , body: formdata}).then(onResponse).then(remove);
  }

  function remove_series (event){
    event.stopPropagation();
    PosterClick = event.currentTarget.parentNode;
    console.log('rimozione');
    const serie_id=PosterClick.dataset.id;
    console.log(serie_id);
    fetch(BASE_URL + "preferiti/remove_series/" + serie_id).then(onResponse).then(remove);
  }

 
  
  function remove() {
    const parent = PosterClick.parentNode;
    parent.removeChild(PosterClick);
    PosterClick = null;
  }
  


   let PosterClick = null;
   const filmsContainer = document.getElementById("film");
   const seriesContainer = document.getElementById("serie");

   fetch(BASE_URL + "preferiti/movies").then(onResponse).then(onJsonMovie);
   fetch(BASE_URL + "preferiti/series").then(onResponse).then(onJsonSeries);
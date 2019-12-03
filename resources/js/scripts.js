var map;
var myPos;
var local = 'restaurant';
var website;

$(document).ready(function() {
    geoLocationInit();
  });
  
  $("#locais").change(function(){
    local = $("#locais").val();
    initMap();
    console.clear()
    $('#places').text('');    
})


//Pegar localização
function geoLocationInit() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);
    } else {
        alert("Navegador não suportado, tente em outro!");
    }
}

function success(position) {
    // console.log(position);
    var latval = position.coords.latitude;
    var lngval = position.coords.longitude;
    myPosUrl = latval + ',' + lngval
    myPos = new google.maps.LatLng(latval, lngval);
    initMap();       
   
}

function initMap() {
  
    // Criar o mapa.
    map = new google.maps.Map(document.getElementById('map'), {
      center: myPos,
      zoom: 14
    });
    
    var marker = new google.maps.Marker({
        position: myPos,
        map: map
    });

    // Realizar a busca de mais locais
    var service = new google.maps.places.PlacesService(map);
    var getNextPage = null;
    var moreButton = document.getElementById('more');
    moreButton.onclick = function() {
      moreButton.disabled = true;
      if (moreButton.disabled == true){
        alert('Não há mais locais desse tipo por perto! Selecione outro tipo de local.')
      }
      if (getNextPage) getNextPage();
    };

    // Realizar pesquisa dos locais.
    service.nearbySearch(
        // types: restaurant, bar, meal_delivery, cafe, night_club, shopping_mall, liquor_store
        {location: myPos, radius: 3000, type: [local]},
        function(results, status, pagination) {
          if (status !== 'OK') return;

          createMarkers(results);
          moreButton.disabled = !pagination.hasNextPage;
          
          getNextPage = pagination.hasNextPage && function() {
            pagination.nextPage();
          };
        });
  }

  // Criar a lista dos locais
  var urlDetail;
  var placeIDs = [];

  function createMarkers(places) {
    var bounds = new google.maps.LatLngBounds();
    var placesList = document.getElementById('places');

    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

     var modal = document.createElement('div')
     modal.innerHTML = '<div class="modal fade" id="modal'+place.place_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel"></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button> </div> <div class="modal-body"> <div class="infoLocal"><input id="input_id" type="hidden" value="'+place.place_id+'"></div> </div> </div> </div> </div>'
      
      var getImagem = place.photos[0].getUrl();
      var div = document.createElement('div');
      var section = document.createElement('section');
      var nomeLocal = document.createElement('p');
      var notaLocal = document.createElement('p');
      var avaliacoes = document.createElement('p');
      var endereco = document.createElement('p');
      var telefone = document.createElement('p');
      var horario = document.createElement('p');
      var site = document.createElement('p');
      var irParaLocal = document.createElement('a');
      var maisInfos = document.createElement('button');
      var fotoLocal = document.createElement('img');
      var favoritar = document.createElement('div');

      if (place.rating == undefined){
        place.rating = 0;
      }

      if (place.user_ratings_total == undefined){
        place.user_ratings_total = 0;
      }

      favoritar.innerHTML = '<a>Favoritar local</a>';
      nomeLocal.innerHTML = '<span>Nome do local:</span><br> ' + place.name;
      notaLocal.innerHTML =  '<span>Nota:</span><br> ' + place.rating.toFixed(1);
      avaliacoes.innerHTML =  '<span>Avaliações:</span><br> ' + place.user_ratings_total;
      placeIDs.push(place.place_id);
      endereco.innerHTML =  '<span>Endereço:</span><br> ' + place.vicinity;
      irParaLocal.innerHTML =  'Ver a rota até o local';
      maisInfos.innerHTML = 'Sobre o local';
      
      favoritar.setAttribute('class', 'boxFavoritar')
      irParaLocal.setAttribute('href', 'https://www.google.com/maps/dir/'+ myPosUrl +'/'+ place.vicinity +'/');
      irParaLocal.setAttribute('target', '_blank');
      telefone.setAttribute('class', 'infosTel');
      site.setAttribute('class', 'infosSite');
      horario.setAttribute('class', 'infosHora');
      maisInfos.setAttribute('class', 'button');
      maisInfos.setAttribute('id', 'btnInfo');
      maisInfos.setAttribute('data-toggle', 'modal');
      maisInfos.setAttribute('data-target', '#modal'+place.place_id)  
      irParaLocal.setAttribute('style', 'display: inherit;margin: 10px auto;');
      irParaLocal.setAttribute('class', 'hvr-left');
      fotoLocal.setAttribute('src', getImagem);
      fotoLocal.setAttribute('class', 'imagem-local');


      section.append(fotoLocal, nomeLocal, notaLocal, avaliacoes, endereco);
      div.append(section, irParaLocal, maisInfos, modal);
      modal.innerHTML;
      div.className = "box-locais";   
      placesList.appendChild(div); 
      bounds.extend(place.geometry.location);
     
      $('#modal'+place.place_id).on('show.bs.modal', function(){
        var id = this.id;
       infos(id);
      });
      
    }
    map.fitBounds(bounds);    

  }

  function infos(id){
    $('.infoLocal').html('')
    $('.modal-title').html('')
    $('.modal-header a').css('display','none')
    var horario;
    var telefone;
    var website;
    id = id.replace('modal','')
    url ='https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/details/json?placeid='+ id +'&fields=name,opening_hours,website,rating,formatted_phone_number&key=AIzaSyA-5eVqeQ5c9jyCmS5k1V4NYVKDGYPacVg'
    
    $.ajax({url: url, success: function(result){
      nome = result.result.name;
      horario = result.result.opening_hours.weekday_text;
      website = result.result.website;
      telefone = result.result.formatted_phone_number;
      titulo = '<h5>Informações do local: '+nome+'</h5>';
      favoritar = '<a style="margin: 0 auto; background-color: red; padding: 15px 20px; color: white; ">Adicionar local aos favoritos</a>';
      if (website == undefined){
        var websiteUndefined = ' não possui website.';
        html = '<p>Horários: '+horario+'</p><p>Telefone(s): <a href="tel:'+telefone+'">'+telefone+'</a></p>'+ websiteUndefined
      } else if(telefone == undefined){
        var telefoneUndefined = ' não possui telefone.';        
        html = '<p>Horários: '+horario+'</p><p>Telefone(s):'+telefoneUndefined+'</p><p>Site: <a href="'+website+'" target="_blank">'+website+'</a><p>'
      }else {
        html = '<p>Horários: '+horario+'</p><p>Telefone(s): <a href="tel:'+telefone+'">'+telefone+'</a></p><p>Site: <a href="'+website+'" target="_blank">'+website+'</a><p>'
      }
      $('.infoLocal').append(html)      
      $('.modal-title').append(titulo)
      $('.modal-header').addClass('grid-x');
      $('.modal-header').append(favoritar)
    }});
    
   
    

  }
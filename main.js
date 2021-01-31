//------------------------------------------------Map-----------------------------

//Je crée une variable pour récuperer l'id du form
var contact = document.getElementById('contact');
var btn;

// J' initialise une liste de marqueurs
var villes = {
    "Gray": {
        "lat": 47.4478202,
        "lon": 5.5878117,
        "add": '1 Rue Gambetta, 70100 Gray',
        "h": 'Lundi au Vendredi : 08:30–12:00 et 13:30–17:00, Samedi-Dimanche: Fermé'
    },
    "Vienne": {
        "lat": 45.5137518,
        "lon": 4.8636158,
        "add": 'Immeuble Apollo, 30 Avenue Général Leclerc, 38200 Vienne',
        "h": 'Lundi au Vendredi : 08:30–12:00 et 13:30–17:00, Samedi-Dimanche: Fermé'
    },
    "Beynost": {
        "lat": 45.8270293,
        "lon": 4.9900471,
        "add": '110 Rue du Chat Botté, 01700 Beynost',
        "h": 'Lundi au Vendredi : 08:30–12:00 et 13:30–17:00, Samedi-Dimanche: Fermé'
    },
};

//J' initialise la carte
var mymap = L.map('mapid').setView([47.4309822, 5.5803062], 7);

//Je charge les tuiles
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    //Il est toujours bien de laisser le lien vers la source des données
    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 1,
    maxZoom: 20
}).addTo(mymap);

for (ville in villes) {
    //Je parcours les différentes villes
    for (ville in villes) {
        var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(mymap);
        
        //Je crée le marqueur et je lui attibue une popup
        marker.bindPopup(
            "<h3> Onlineformapro</h3></br><b>Addresse: </br>" +
            villes[ville].add +
            "</b></br><p>Horraires: </br>" +
            villes[ville].h +
            "</br> </br> <a href='#contact' class='btn_map btn btn-primary ' >Nous Contacter</a>"
        )   
    }
}




//------------------------------------------------------Formulaire Contact-------------------------------------------------------------------------

/*
function validateForm() 
var name = document.forms["Contact"]["name"];               
var email = document.forms["Contact"]["email"]; 
var message = document.forms["Contact"]["message"];   
{ 
    if  {
         //vérifier si les champs invalide
         //affiche formulaire incoreect
    } else {
        // affiche rien
    }
       
    if {    
    //erreur lors de l'envoie d 'email 
    // affiche alert danger
    } else {
        //affiche aller success
    }
}

/*Si il n'y a un champ de pas remplie lorsque l on clic sur le boutton -> Formulaire incorect
Si tout est ok -> Message envoyé
Si erreur lors de l envoie -> alert danger

*/ 
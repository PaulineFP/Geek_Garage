//------------------------------------------------Map------------------------

//Je crée une variable pour récuperer l'id du form
var contact = document.getElementById('contact');
var btn;

// J' initialise une liste de marqueurs
var villes = {
    "Gray": {
        "lat": 47.4478202,
        "lon": 5.5878117,
        "add": '1 Rue Gambetta, 70100 Gray',
        "h": 'lundi: 08:30–12:00,13:30–17:00, mardi:08:30–12:00,13:30–17:00 mercredi:08:30–12:00,13:30–17:00, jeudi:08:30–12:00,13:30–17:00 vendredi:08:30–12:00,13:30–17:00 samedi:Fermé, dimanche:Fermé',
    },
    "Vienne": {
        "lat": 45.5137518,
        "lon": 4.8636158,
        "add": 'Immeuble Apollo, 30 Avenue Général Leclerc, 38200 Vienne',
        "h": 'lundi:08:30–12:00,13:30–17:00, mardi:08:30–12:00,13:30–17:00, mercredi:08:30–12:00,13:30–17:00, jeudi:08:30–12:00,13:30–17:00, vendredi:08:30–12:00,13:30–17:00, samedi:Fermé, dimanche:Fermé',
    },
    "Beynost": {
        "lat": 45.8270293,
        "lon": 4.9900471,
        "add": '110 Rue du Chat Botté, 01700 Beynost',
        "h": 'lundi:08:30–12:00,13:30–17:00, mardi:08:30–12:00,13:30–17:00, mercredi:08:30–12:00,13:30–17:00, jeudi:08:30–12:00,13:30–17:00, vendredi:08:30–12:00,13:30–17:00, samedi:Fermé, dimanche:Fermé',
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

function validateForm()                                    
{ 
    var name = document.forms["myForm"]["name"];               
    var email = document.forms["myForm"]["email"]; 
    var message = document.forms["myForm"]["message"];   
   
    if (name.value == "")                                  
    { 
        document.getElementById('errorname').innerHTML="Veuillez entrez un nom valide";  
        name.focus(); 
        return false; 
    }else{
        document.getElementById('errorname').innerHTML="";  
    }
       
    if (email.value == "")                                   
    { 
        document.getElementById('erroremail').innerHTML="Veuillez entrez une adresse mail valide"; 
        email.focus(); 
        return false; 
    }else{
        document.getElementById('erroremail').innerHTML="";  
    }
   
    if (email.value.indexOf("@", 0) < 0)                 
    { 
        document.getElementById('erroremail').innerHTML="Veuillez entrez une adresse mail valide"; 
        email.focus(); 
        return false; 
    } 
   
    if (message.value == "")                           
    {
        document.getElementById('errormsg').innerHTML="Veuillez entrez un message valide"; 
        message.focus(); 
        return false; 
    }else{
        document.getElementById('errormsg').innerHTML="";  
    }
    return true; 
}
function gestionAfficher(id_message, repondu_message) {
    // création de l'objet XHLHttpRequest
    const xmlhttp = new XMLHttpRequest(); 
    
    
    xmlhttp.open("POST", "controler/requete_gestion_repondu.php", true); // il va chercher le fichier et l'ouvre
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // obligatoire pour post
    xmlhttp.onload = function() { // peut aussi utiliser onreadystatechange ou autre chose
        
        const myobj = JSON.parse(this.responseText);
        let resultat = document.getElementById(id_message); // récupère le td contenant l'input
        
        for (let data in myobj) {
            
            if (myobj[data].repondu_message == 1) {
                resultat.innerHTML = `<img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher">`;
            }
            else {
                resultat.innerHTML = `<img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab ">`;
            }
        } 
    }
    
    data = ('repondu_message='+ repondu_message +'&id_message='+ id_message);
    // xmlhttp.send(JSON.stringify(data)); // il envoi tout
    xmlhttp.send(data);
    // xmlhttp.send('id='+ selection);
 

}
function updateSelect(id_devis, etat_devis, message) {
    // création de l'objet XHLHttpRequest
    const xmlhttp = new XMLHttpRequest(); 
    
    xmlhttp.open("POST", "controler/requete_update_etat_devis.php", true); // il va chercher le fichier et l'ouvre
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // obligatoire pour post
    xmlhttp.onload = function() { // peut aussi utiliser onreadystatechange ou autre chose
        
        const myobj = JSON.parse(this.responseText);
        let resultat = document.getElementById('message'); //le select à remplacer
        
        // for (let data in myobj) {
                resultat.innerHTML = `État du devis modifié.`;
            
        // }
    }
    
    let liste = document.getElementById('etat_devis');
    let selection = liste.options[liste.selectedIndex].value;
    data = ('id_devis='+ id_devis + '&id_etat=' + selection);
    // xmlhttp.send(JSON.stringify(data)); // il envoi tout
    xmlhttp.send(data);
    // xmlhttp.send('id='+ selection);


}
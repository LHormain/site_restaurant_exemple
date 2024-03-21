function gestionAfficher(id_image, afficher_image) {
    // création de l'objet XHLHttpRequest
    const xmlhttp = new XMLHttpRequest(); 
    
    
    xmlhttp.open("POST", "controler/requete_gestion_affichage_image.php", true); // il va chercher le fichier et l'ouvre
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // obligatoire pour post
    xmlhttp.onload = function() { // peut aussi utiliser onreadystatechange ou autre chose
        
        const myobj = JSON.parse(this.responseText);
        let resultat = document.getElementById('aff'+id_image); // récupère le td contenant l'input
        
        for (let data in myobj) {
            
            resultat.value = myobj[data].afficher_image;

            if (myobj[data].afficher_image == 1) {
                resultat.innerHTML = `<img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher">`;
            }
            else {
                resultat.innerHTML = `<img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab ">`;
            }
        }
    }
    
    data = ('afficher_image='+ afficher_image +'&id_image='+ id_image);
    // xmlhttp.send(JSON.stringify(data)); // il envoi tout
    xmlhttp.send(data);
    // xmlhttp.send('id='+ selection);
}
let allImg = document.querySelectorAll('.btn_aff');
allImg.forEach(categorie => {
    let id = categorie.id.replace('aff', '');
    categorie.addEventListener('click', function() {
        let aff = categorie.value;
        gestionAfficher(id,aff);
    });
});
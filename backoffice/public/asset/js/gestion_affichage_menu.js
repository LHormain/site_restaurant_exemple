function gestionAfficher(id_menu, afficher_menu) {
    // création de l'objet XHLHttpRequest
    const xmlhttp = new XMLHttpRequest(); 
    
    
    xmlhttp.open("POST", "controler/requete_gestion_affichage_menu.php", true); // il va chercher le fichier et l'ouvre
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // obligatoire pour post
    xmlhttp.onload = function() { // peut aussi utiliser onreadystatechange ou autre chose
        
        const myobj = JSON.parse(this.responseText);
        let resultat = document.getElementById('aff'+id_menu); // récupère le td contenant l'input
        
        for (let data in myobj) {
            
            resultat.value = myobj[data].afficher_menu;

            if (myobj[data].afficher_menu == 1) {
                resultat.innerHTML = `<img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher">`;
            }
            else {
                resultat.innerHTML = `<img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab ">`;
            }
        }
    }
    
    data = ('afficher_menu='+ afficher_menu +'&id_menu='+ id_menu);
    // xmlhttp.send(JSON.stringify(data)); // il envoi tout
    xmlhttp.send(data);
    // xmlhttp.send('id='+ selection);
 

}
let AllCat = document.querySelectorAll('.btn_aff');
AllCat.forEach(categorie => {
    let id = categorie.id.replace('aff', '');
    categorie.addEventListener('click', function() {
        let aff = categorie.value;
        gestionAfficher(id,aff);
    });
});
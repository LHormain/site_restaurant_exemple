let today = new Date().toISOString().split('T')[0];
    
document.getElementById('date_evenement_devis').setAttribute("min", today);
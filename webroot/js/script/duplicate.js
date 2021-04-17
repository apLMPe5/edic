$(document).ready(function(){
    $('#button').on('click', function(){
        $('.copycat:first').clone().appendTo($('#NouveauMembre'));
    })
});

function supprimer() {
    obj.removeChild('#Tableau');
}
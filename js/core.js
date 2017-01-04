function afficherForm() {
    var form = document.getElementById('form-reponse');
    form.style.display = 'block';
    var btn = document.getElementById('btn-reponse');
    btn.style.display = 'none';
}

function cacherForm() {
    var form = document.getElementById('form-reponse');
    form.style.display = 'none';
    var btn = document.getElementById('btn-reponse');
    btn.style.display = 'block';
}

$(document).ready(function () {
    //Lorsque vous cliquez sur un lien de la classe poplight et que le href commence par #
    $('a.poplight[href^=#]').click(function () {
        var popID = $(this).attr('rel'); //Trouver la pop-up correspondante
        var popURL = $(this).attr('href'); //Retrouver la largeur dans le href

        //Récupérer les variables depuis le lien
        var query = popURL.split('?');
        var dim = query[1].split('&amp;');
        var popWidth = dim[0].split('=')[1]; //La première valeur du lien

        //Faire apparaitre la pop-up et ajouter le bouton de fermeture
        $('#' + popID).fadeIn().css({
                'width': Number(popWidth)
            })
            .prepend('<a href="#" class="fermer"><img src="/Forum/img/close_pop.png" class="btn_close" title="Fermer" alt="Fermer" /></a>');

        //Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
        var popMargTop = ($('#' + popID).height() + 80) / 2;
        var popMargLeft = ($('#' + popID).width() + 80) / 2;

        //On affecte le margin
        $('#' + popID).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        //Effet fade-in du fond opaque
        $('body').append('<div id="fade"></div>'); //Ajout du fond opaque noir
        //Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues de IE
        $('#fade').css({
            'filter': 'alpha(opacity=80)'
        }).fadeIn();

        return false;
    });

    //Fermeture de la pop-up et du fond
    $('a.fermer, #fade').live('click', function () { //Au clic sur le bouton ou sur le calque...
        $('#fade , .popup_block').fadeOut(function () {
            $('#fade, a.fermer').remove(); //...ils disparaissent ensemble
        });
        return false;
    });
})
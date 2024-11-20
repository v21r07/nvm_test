<script id="JQthor">
    //calcule Total Time Work
    function TTW(M)//M=Matricule
    {
        var TTW = 0;
        var TW = 0;//Temps de travail
        var ABS = 0;//heure d'absence J
        var CANT = 0;//Nbre de cantine J
        var TABS= 0;//Abscence de toute de la semaine
        var TCANT= 0;//cantine de toute de la semaine
        for (var i = 1; i <= 7; i++) {//on bloucle pour calcuer les TW et les cantines de la semaine
            TW = parseFloat($('#TWJ' + i + M).val());
            TTW += parseFloat($('#TWJ' + i + M).val());//on caclue le tout
            if(TW>=4)
            {
                CANT =1;
                TCANT+=CANT;
            }
        }
        for (var i = 1; i <= 5; i++) {//on bloucle pour voir les absence sur les de la semaine
            TW = parseFloat($('#TWJ' + i + M).val());
            if(TW<8)
            {
                ABS = 8 - TW;
                TABS += ABS;
            }
        }

        $('#TTW' + M).val(TTW);
        $('#TABS' + M).val(TABS);
        $('#TCANT' + M).val(TCANT);
    }
    //verifie heure si HS 30%
    function verifie_si_HS30(heure)
    {
        var reste = 0;
        if(heure>8)
        {
            reste = heure - 8;
        }
        return reste;
    }
    //verification et calule de chaque jour si HS30 pout THS30
    function THS30(M)
    {
        var ths30 = 0;
        for (let i = 0; i < 6; i++) {
            var TWJ = $('#TWJ'+i+M).val(); //temps de travail pour extraire le HS
            ths30 += parseFloat(verifie_si_HS30(TWJ));
        }
        $('#THS30'+M).val(ths30);
    }
    //verification et calule de HS50 à partir de HS30
    function THS50(M)
    {
        var ths50 = 0;
        var ths30 = $('#THS30'+M).val();
        if(ths30>8)
        {
            $('#THS30'+M).val(8);
            ths50 = ths30 - 8;
        }
        $('#THS50'+M).val(ths50);
    }
   
    // ecouteur des inputs pour les calcule de TW, HS30,HS50
    $(document).ready(TTW('915'));
    <?php foreach($EmplDtls as $EmplDtl): ?>
        $('#TWJ1<?= $EmplDtl->NumMatriEmploye(); ?>').on('input', function() {
            TTW('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS30('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS50('<?= $EmplDtl->NumMatriEmploye(); ?>');
        });
        $('#TWJ2<?= $EmplDtl->NumMatriEmploye(); ?>').on('input', function() {
            TTW('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS30('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS50('<?= $EmplDtl->NumMatriEmploye(); ?>');
        });
        $('#TWJ3<?= $EmplDtl->NumMatriEmploye(); ?>').on('input', function() {
            TTW('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS30('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS50('<?= $EmplDtl->NumMatriEmploye(); ?>');
        });
        $('#TWJ4<?= $EmplDtl->NumMatriEmploye(); ?>').on('input', function() {
            TTW('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS30('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS50('<?= $EmplDtl->NumMatriEmploye(); ?>');
        });
        $('#TWJ5<?= $EmplDtl->NumMatriEmploye(); ?>').on('input', function() {
            TTW('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS30('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS50('<?= $EmplDtl->NumMatriEmploye(); ?>');
        });
        $('#TWJ6<?= $EmplDtl->NumMatriEmploye(); ?>').on('input', function() {
            TTW('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS30('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS50('<?= $EmplDtl->NumMatriEmploye(); ?>');
        });
        $('#TWJ7<?= $EmplDtl->NumMatriEmploye(); ?>').on('input', function() {
            TTW('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS30('<?= $EmplDtl->NumMatriEmploye(); ?>');
            THS50('<?= $EmplDtl->NumMatriEmploye(); ?>');
        });
    <?php endforeach; ?>
</script>
<script>
function estBissextile(année) {
    return année % 4 === 0 && (année % 100 !== 0 || année % 400 === 0);
}

function showWeekSelected() {
    var dateInput = document.getElementById("Sstart").value;
    var date = new Date(dateInput);
    var année = date.getFullYear();
    var premierJour = new Date(date);

    var jourSemaine = date.getDay();
    
    // Si le jour de la semaine est dimanche (0), ajuster pour que la semaine commence par lundi (1)
    if (jourSemaine === 0) {
        premierJour.setDate(date.getDate() - 6); // Reculer de 6 jours pour arriver à lundi
    } else {
        premierJour.setDate(date.getDate() - (jourSemaine - 1)); // Reculer pour arriver à lundi
    }

    var joursAbrégés = ["L", "M", "M", "J", "V", "S", "D"]; // Jours de la semaine abrégés
    var numérosJours = [];
    var joursLongs = [];
    for (var i = 0; i < 7; i++) {
        var jour = new Date(premierJour);
        jour.setDate(premierJour.getDate() + i);
        if (jour.getMonth() === 1 && estBissextile(année) && 28 === jour.getDate()) {
            jour.setDate(29); // Si c'est février dans une année bissextile, ajuster à 29 jours
        }
        var jourAbrégé = joursAbrégés[i] + (jour.getDate() < 10 ? '0' : '') + jour.getDate();
        var jourLong = jour.toLocaleDateString('fr-FR', { weekday: 'long', day: '2-digit', month: 'long', year: 'numeric' });
        numérosJours.push(jourAbrégé);
        joursLongs.push(jourLong);
    }
    numérosJours.forEach(function(jour, index) {
        $('.detJ' + (index + 1)).text(jour);
    });
   for (let i = 1; i < 7; i++) {
        <?php foreach($EmplDtls as $EmplDtl): ?>
        joursLongs.forEach(function(jour, index) {
            $('#detJ'+ (index + 1)+<?= $EmplDtl->NumMatriEmploye(); ?>).val(jour+ '.');
        });
        <?php endforeach; ?>
    }
}
function extractDATA(e) {
    var files = e.target.files;
    var f = files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        var data = new Uint8Array(e.target.result);
        var workbook = XLSX.read(data, { type: 'array' });
        var sheet = workbook.Sheets[workbook.SheetNames[0]];

        // Tableau pour stocker les données
        var dataArr = [];

        // Itération à travers chaque ligne à partir de la deuxième ligne
        for (var i = 2; ; i++) {
            var row = {};
            var cellInit = sheet['A' + i];
            if (!cellInit || !cellInit.v) break; // Sortir de la boucle si la cellule est vide
            row.INIT = cellInit.v;
            row.NUM = sheet['B' + i] ? sheet['B' + i].v : '';
            row.NOM = sheet['C' + i] ? sheet['C' + i].v : '';
            row.PRENOM = sheet['D' + i] ? sheet['D' + i].v : '';
            row.Fonction = sheet['E' + i] ? sheet['E' + i].v : '';
            row.DN = sheet['F' + i] ? convertUnixTimestamp(sheet['F' + i].v) : ''; // Convertir le timestamp Unix en date
            row.ADRESSE = sheet['G' + i] ? sheet['G' + i].v : '';
            row.CIN = sheet['H' + i] ? sheet['H' + i].v : '';
            row.DateEmb = sheet['I' + i] ? convertUnixTimestamp(sheet['I' + i].v) : ''; // Convertir le timestamp Unix en date
            row.SAL_DU = sheet['J' + i] ? sheet['J' + i].v : '';
            row.NBRE_H = sheet['K' + i] ? sheet['K' + i].v : '';
            row.MT_SAL = sheet['L' + i] ? sheet['L' + i].v : '';
            row.DD = sheet['M' + i] ? sheet['M' + i].v : '';
            row.SECTION = sheet['N' + i] ? sheet['N' + i].v : '';
            row.CLASS = sheet['O' + i] ? sheet['O' + i].v : '';
            row.SalBase = sheet['P' + i] ? sheet['P' + i].v : '';
            row.TH = sheet['Q' + i] ? sheet['Q' + i].v : '';
            row.INDICE = sheet['R' + i] ? sheet['R' + i].v : '';
            row.Sexe = sheet['S' + i] ? sheet['S' + i].v : '';
            row.NCnaPS = sheet['T' + i] ? sheet['T' + i].v : '';

            // Ajouter la ligne au tableau de données
            dataArr.push(row);
        }

        // Utilisez le tableau de données comme vous le souhaitez
        console.log(dataArr);
    };
    reader.readAsArrayBuffer(f);
}

function convertUnixTimestamp(timestamp) {
    if (!timestamp) return '';
    return new Date(timestamp * 1000).toLocaleDateString();
}



/*
        console.log('NumCnaps'+NCnaPS);
        console.log(' info = '+ INIT );
        console.log(' info = '+ NUM );
        console.log(' info = '+ NOM );
        console.log(' info = '+ PRENOM );
        console.log(' info = '+ Fonction );
        console.log(' info = '+ DN );
        console.log(' info = '+ ADRESSE );
        console.log(' info = '+ CIN );
        console.log(' info = '+ DateEmb );
        console.log(' info = '+ SAL_DU );
        console.log(' info = '+ NBRE_H );
        console.log(' info = '+ MT_SAL );
        console.log(' info = '+ DD );
        console.log(' info = '+ SECTION );
        console.log(' info = '+ CLASS );
        console.log(' info = '+ SalBase );
        console.log(' info = '+ TH );
        console.log(' info = '+ INDICE );
        console.log(' info = '+ Sexe );
        console.log(' info = '+ NCnaPS );*/


<?php require_once 'header.php'; ?>
    <main >
        <div class="row">
            <!---formulaire d'ajout nouveau employé--->
            <div class=" needs-validation">
                <div class="mb-3 display-6 text-center"> <strong><span class="bi-plus-circle"></span></strong></div>
                <div class="row" style="margin:auto 30px;">
                    <div class="col-md-8 display-6 right">Ajout nouveau employé</div>
                    <div class="col-md-4 display-4 mt-0 right">
                        <a href="#" aria-label="Cliquez pour uploader votre fichier Excel" title="Cliquez pour uploader votre fichier Excel" class="upload-link" style="cursor: pointer!important;">
                            <span class="bi bi-cloud-arrow-up" style="cursor: pointer;"></span>
                            <form action="AddEmploye" method="post" enctype="multipart/form-data" class="fileToUpload">
                                <input type="hidden" name="Add_By_Exraction">
                                <input type="file" name="fileToUpload" id="inputFile" accept=".xlsx, .xls" class="file-input">
                            </form>
                        </a>
                    </div>
                </div>
                <form class="needs-validation" action="AddEmploye" method="post" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Informations Personnelles -->
                            <div class="form-section">
                                <div class="section-title">Informations Personnelles</div>
                                <div class="form-row row">
                                    <div class="form-group col-md-6">
                                        <label for="Referencement" class="form-label">Nom(s) <sup class="required">*</sup></label>
                                        <input name="Nom" type="text" id="Nom" class="form-control form-control-sm" required placeholder="ex : JEAN NIRINA PASCAL" autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prenom" class="form-label">Prénom(s) <sup class="required">*</sup></label>
                                        <input name="Prenom" type="text" id="Prenom" class="form-control form-control-sm" required placeholder="ex : Robin">
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-6">
                                        <label for="DateNaissEmploye" class="form-label">Date de naissance <sup class="required">*</sup></label>
                                        <input name="DateNaissEmploye" type="date" id="DateNaissEmploye" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="LieuNaissEmploye">Lieu de naissance <sup class="required">*</sup></label>
                                        <input name="LieuNaissEmploye" type="text" id="LieuNaissEmploye" class="form-control form-control-sm mt-2" placeholder="Analakely">
                                        <div class="row">
                                            <div class="col-md-6" id="suggestions"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-6">
                                        <label for="AdresseEmploye" class="form-label">Adresse <sup class="required">*</sup></label>
                                        <input name="AdresseEmploye" type="text" id="AdresseEmploye" class="form-control form-control-sm" required placeholder="ex : II N ZE Tsimbazaza ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Contact" class="form-label">Contact</label>
                                        <input name="Contact" type="number" id="Contact" class="form-control form-control-sm" maxlength="10" placeholder="ex : 033 XX XXX XX">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Informations Administratives -->
                            <div class="form-section">
                                <div class="section-title">Informations Administratives</div>
                                <div class="form-row row">
                                    <div class="form-group col-md-4">
                                        <label for="init" class="form-label">Initiale <sup class="required">*</sup></label>
                                        <input name="init" type="text" id="init" class="form-control form-control-sm" placeholder="ex : M" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="NumMatriEmploye" class="form-label">N° Marticule<sup class="required">*</sup></label>
                                        <input name="NumMatriEmploye" type="number" id="NumMatriEmploye" class="form-control form-control-sm" required placeholder="ex : 0101">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="IndiceEmploye" class="form-label">Indice <sup class="required">*</sup></label>
                                        <input name="IndiceEmploye" type="number" id="IndiceEmploye" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-6">
                                        <label for="NumCIN" class="form-label">N° CIN <sup class="required">*</sup></label>
                                        <input name="NumCIN" type="number" id="NumCIN" class="form-control form-control-sm" required placeholder="ex : 101 251 *** *** ***">       
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NumCnapsEmploye" class="form-label">N° CNAPS <sup class="required">*</sup></label>
                                        <input name="NumCnapsEmploye" type="number" id="NumCnapsEmploye" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Informations Professionnelles -->
                        <div class="col-md-6">
                            <div class="form-section">
                                <div class="section-title">Informations Professionnelles</div>
                                <div class="form-row row">
                                    <div class="form-group col-md-4">
                                        <label for="DateEmbaucheEmploye" class="form-label">Date d'embauche <sup class="required">*</sup></label>
                                        <input name="DateEmbaucheEmploye" type="date" id="DateEmbaucheEmploye" class="form-control form-control-sm" onchange="sameValueContrat()" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="DateDemissionEmploye" class="form-label">Date de démission</label>
                                        <input name="DateDemissionEmploye" type="date" id="DateDemissionEmploye" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="FonctionEmploye" class="form-label">Fonction <sup class="required">*</sup></label>
                                        <select class="form-select form-select-sm" name="FonctionEmploye" id="FonctionEmploye" required>
                                            <option value="AGENT CONTRÔLE QUALITE">AGENT CONTRÔLE QUALITE</option>
                                            <option value="AGENT QUALITE PRODUCTION">AGENT QUALITE PRODUCTION</option>
                                            <option value="AIDE MECANICIEN">AIDE MECANICIEN</option>
                                            <option value="BRODERIE">BRODERIE</option>
                                            <option value="BRODEUSE">BRODEUSE</option>
                                            <option value="CHEF DE CHAINE">CHEF DE CHAINE</option>
                                            <option value="CHEF COUPE">CHEF COUPE</option>
                                            <option value="CHEF ACCESSOIRES">CHEF ACCESSOIRES</option>
                                            <option value="CUISINIER">CUISINIER</option>
                                            <option value="FEMME DE MENAGE">FEMME DE MENAGE</option>
                                            <option selected value="MACHINISTE">MACHINISTE</option>
                                            <option value="MECANICIEN">MECANICIEN</option>
                                            <option value="PETITE MAIN">PETITE MAIN</option>
                                            <option value="RESPONSABLE ADMINISTRATIF">RESPONSABLE ADMINISTRATIF</option>
                                            <option value="SECRETAIRE">SECRETAIRE</option>
                                            <option id="OtherFonction" value="" onclick="document.getElementById('otherFonctionInput').removeAttribute('hidden','hidden');">AUTRE</option>
                                        </select>
                                        <input id="otherFonctionInput" type="text" class="form-control form-control-sm mt-1" placeholder="Autre fonction" oninput="document.getElementById('OtherFonction').value('this.value()');">
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-6">
                                        <label for="SectionEmploye" class="form-label">Section <sup class="required">*</sup></label>
                                        <select class="form-select form-select-sm" name="SectionEmploye" required>
                                            <option value="B">B</option>
                                            <option selected value="CHEF">CHEF</option>
                                            <option value="M">M</option>
                                            <option value="PM">PM</option>
                                            <option value="QLT">QLT</option>
                                            <option value="AUTRE">AUTRE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ClassEmploye" class="form-label">Class <sup class="required">*</sup></label>
                                        <select class="form-select form-select-sm" name="ClassEmploye" id="ClassEmploye" required>
                                            <option selected value="OP1A">Ouvrier Professionnel 1 A</option>
                                            <option value="OP2A">Ouvrier Professionnel 2 A</option>
                                            <option value="OP1B">Ouvrier Professionnel 1 B</option>
                                            <option value="OP2B">Ouvrier Professionnel 1 B</option>
                                            <option value="OS1">Ouvrier Spécialisé 1</option>
                                            <option value="OS2">Ouvrier Spécialisé 2</option>
                                            <option value="OS3">Ouvrier Spécialisé 3</option>
                                            <option value="M1">Main 1</option>
                                            <option value="M2">Main 2</option>
                                            <option value="HC">HC</option>
                                            <option value="2A">2A</option>
                                            <option value="3A">3A</option>
                                            <option value="4A">4A</option>
                                            <option value="5A">5A</option>
                                            <option value="HC">HC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rémuneration -->
                        <div class="col-md-6">
                            <div class="form-section">
                                <div class="section-title">Rémuneration <sup class="required">*</sup></div>
                                <div class="form-row row">
                                    <div class="form-group col-md-4">
                                        <label for="SalaryBaseEmploye" class="form-label">Salaire de base (Ar)</label>
                                        <input name="SalaryBaseEmploye" type="number" id="SalaryBaseEmploye" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-2">
                                        <label for="TauxHeureEmploye" class="form-label">TH</label>
                                        <input name="TauxHeureEmploye" type="text" id="TauxHeureEmploye" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="THS30">THS30</label>
                                        <input name="THS30" type="text" id="THS30" class="form-control form-control-sm mt-2" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="THS50">THS50</label>
                                        <input name="THS50" type="text" id="THS50" class="form-control form-control-sm mt-2" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="THM40">THM40</label>
                                        <input name="THM40" type="text" id="THM40" class="form-control form-control-sm mt-2" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="THM50">THM50</label>
                                        <input name="THM50" type="text" id="THM50" class="form-control form-control-sm mt-2" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="THM100">THM100</label>
                                        <input name="THM100" type="text" id="THM100" class="form-control form-control-sm mt-2" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Situation Familiale //Etat Civil -->
                        <div class="col-md-12">
                            <div class="form-section">
                                <div class="section-title" style="text-transform: capitalize;">Informations Familliale et civile</div>
                                <div class="form-row row">
                                    <div class="form-group col-md-4">
                                        <label for="SexeEmploye">Sexe <sup class="required">*</sup></label>
                                        <br>
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" value="H" name="SexeEmploye" required>Homme
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="F" name="SexeEmploye" required>Femme
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="EtatCivilEmploye">EtatCivilEmploye</label>
                                        <select class="form-control form-control-sm mt-2" name="EtatCivilEmploye">
                                            <option selected value="Marié(e)">Marié(e)</option>
                                            <option value="Célibataire">Célibataire</option>
                                            <option value="Divorcé(e)">Divorcé(e)</option>
                                            <option value="Veuf(ve)">Veuf(ve)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="NomConjointe" class="form-label">Nom conjoint(e) inscrit à la mairie</label>
                                        <input name="NomConjointe" type="texte" id="NomConjointe" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Nomdupere" class="form-label">Nom du Père</label>
                                        <input name="Nomdupere" type="texte" id="Nomdupere" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Nomdelamere" class="form-label">Nom de la Mère</label>
                                        <input name="Nomdelamere" type="texte" id="Nomdelamere" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="NbrEnfantEmploye" class="form-label">Nombre d'enfant</label>
                                        <input name="NbrEnfantEmploye" type="number" id="NbrEnfantEmploye" class="form-control form-control-sm" value="0">
                                    </div>
                                    <div class="form-group col-md-4 nameChild1">
                                        <label for="NomEnf1" class="form-label">Prénom de l'enfant</label>
                                        <input name="NomEnf1" type="texte" id="NomEnf1" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4 nameChild2">
                                        <label for="NomEnf2" class="form-label">Prénom de l'enfant</label>
                                        <input name="NomEnf2" type="texte" id="NomEnf2" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4 nameChild3">
                                        <label for="NomEnf3" class="form-label">Prénom de l'enfant</label>
                                        <input name="NomEnf3" type="texte" id="NomEnf3" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-md-4 birthChild1">
                                        <label for="DateNEnf1" class="form-label">Date de naissance enfant</label>
                                        <input name="DateNEnf1" type="date" id="DateNEnf1" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4 birthChild2">
                                        <label for="DateNEnf2" class="form-label">Date de naissance enfant</label>
                                        <input name="DateNEnf2" type="date" id="DateNEnf2" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4 birthChild3">
                                        <label for="DateNEnf3" class="form-label">Date de naissance enfant</label>
                                        <input name="DateNEnf3" type="date" id="DateNEnf3" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="NameContactEmergencyEmploye" class="form-label">Presonne à contacter ne cas d'urgence</label>
                                        <input name="NameContactEmergencyEmploye" type="text" id="NameContactEmergencyEmploye" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ContactEmergencyEmploye" class="form-label">Contact d'urgence</label>
                                        <input name="ContactEmergencyEmploye" type="number" id="ContactEmergencyEmploye" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="CarteDeVaccination" class="form-label">N° Carte de vaccination</label>
                                        <input name="CarteDeVaccination" type="number" id="CarteDeVaccination" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Contrat -->
                            <div class="form-section">
                                <div class="section-title">Concernant le contrat</div>
                                <div class="form-row row">
                                    <div class="form-group col-md-4">
                                        <label for="TypeContratEmploye" class="form-label">Type de contrat <sup class="required">*</sup></label>
                                        <select id="TypeContratEmploye" class="form-select form-select-sm" name="TypeContratEmploye" required>
                                            <option> </option>
                                            <option value="IND">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Essai">ESSAI</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="durationCDDEmploye" id="durationCDDEmployeLabel" class="form-label">Durée CDD (ans)</label>
                                        <input name="durationCDDEmploye" type="number" id="durationCDDEmploye" class="form-control form-control-sm" placeholder="ex : 2.5" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="CDDMotifEmploye" id="CDDMotifEmployeLabel" class="form-label">Motif CDD</label>
                                        <input name="CDDMotifEmploye" type="text" id="CDDMotifEmploye" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-section">
                                <div class="section-title">Imprimer contrat</div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="AntanananarivoLe" id="AntanananarivoLeLabel" class="form-label">Fait le </label>
                                        <input name="AntanananarivoLe" type="date" id="AntanananarivoLe" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn btn-print">
                                            <i id="printButton" class="bi-printer btn-print-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Autres Informations -->
                    <div class="form-section">
                        <div class="section-title">Autres Informations</div>
                        <div class="form-row row">
                            <div class="form-group col-md-4">
                                <label for="DiplomEmploye" class="form-label">Diplôme</label>
                                <input name="DiplomEmploye" type="text" id="DiplomEmploye" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="LastStepSchool" class="form-label">Niveau d'étude</label>
                                <input name="LastStepSchool" type="text" id="LastStepSchool" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="SpecCout" class="form-label">Connaissance en matière de coûture</label>
                                <input name="SpecCout" type="text" id="SpecCout" class="form-control form-control-sm" placeholder="maîtrise machine industrielle, ...">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="OtherWorkKnow" class="form-label">Autre spécialité</label>
                                <input name="OtherWorkKnow" type="text" id="OtherWorkKnow" class="form-control form-control-sm" placeholder="broderie, nouage">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="LastWorkPlace" class="form-label">Nom/adresse du dernier emploi</label>
                                <input name="LastWorkPlace" type="text" id="LastWorkPlace" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="healthEmploye" class="form-label">Déscription</label>
                                <textarea cols="20" rows="8" name="healthEmploye" type="text" id="healthEmploye" class="form-control form-control-sm" placeholder="ex : Autre information comme allérgique au cacahouette, ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row row right">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="Add_By_Form">Enregister</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="sectionToPrint" id="ContratCDI" style="display: none;">
            <div class="row">
                <div class="col-12" style="text-align: left;">
                    <img width="300" height="100" src="<?php echo URL . "content/img/logo index oi imprimable.png "; ?>" alt="Logo">
                </div>
            </div>
            <div class="row c b">
                <p>
                    <span style="margin: 0; padding: 0;border-bottom: 1px solid black;">CONTRAT DE TRAVAIL</span>
                </p>
            </div>
            <div class="row">
                <p>
                    Entre les soussignés :
                    <br> Société A Responsabilité Limitée INDEX-OI, dont le siège social se trouve à Antanimena, Antananarivo, Lot IVS 2, 104 Avenue Lénine, représentée par sa Gérante,<span id="gerant1"></span>
                    <div style="text-align: right;">d’une part</div>
                </p>
            </div>
            <div class="row">
                <p>
                    Et,
                    <br>
                    <span class="NameComplet"></span> né(e) le <span class="DN"> </span>, titulaire de la carte d’identité nationale n° <span class="CinContrat"> </span> , domicilié(e) au Lot <span class="AdresseContract"></span>.
                </p>
            </div>
            <div class="row" style="text-align: right;">
                <p>
                    d’autre part
                </p>
            </div>
            <div class="row c">IL EST CONVENU ET ARRETE CE QUI SUIT</div>
            <div class="row">
                <span class="b"><span class="uline">Article 1 </span>: Objet </span>
                <br> Le présent contrat a pour objet de fixer les conditions d’emploi de <span class="NameComplet"></span>.
                <span class="NameComplet"></span> est recruté(e) en qualité de <span class="FonctionContrat"></span>. Il (Elle) est classé(e) dans la catégorie professionnelle <span class="ClassContrat"></span>.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 2 </span>: Durée </span>
                <br>Le présent contrat est établi pour <span class="b" style="border-bottom: 1px solid black;"> UNE DUREE INDETERMINEE </span> et prend effet à compter du <span class="DateEmbContrat"></span>.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 3 </span>: Lieu de travail </span>
                <br>Le lieu d’emploi est au Lot IVS 2, 104 Avenue Lénine, Antananarivo.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 4 </span>: Rémunération </span>
                <br><span class="NameComplet"></span> percevra un salaire de base mensuel de <span class="SBContrat"></span> Ar.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 5 </span>: Congé </span>
                <br>
                <span class="NameComplet"></span> aura droit à un congé de deux jours et demi calendaires par mois de service effectif. Le congé ne pourra être remplacé par une indemnité compensatrice. Toutefois, en cas de rupture de contrat, avant que
                le travailleur ait acquit droit de jouissance au congé, il lui sera alloué, par la Société à la place du congé, une indemnité, calculée d’après la durée à laquelle il pourra prétendre proportionnellement au temps de service qu’il aura
                effectué chez l’Employeur.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 6 </span>: Soins médicaux </span>
                <br>
                <span class="NameComplet"></span> sera déclaré(e) à l’Organisation Sanitaire du lieu de travail pour les soins médicaux.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 7 </span>: Résiliation du contrat </span>
                <br> Le présent contrat pourra être résilié à tout moment par l’une ou l’autre partie moyennant un préavis défini suivant la législation du travail en vigueur.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 8 </span>: Règlementations </span>
                <br>
                <span class="NameComplet"></span> est soumis(e) aux règlementations édictées par :
                <ul style="list-style-type: square;">
                    <li>La législation du travail et des lois sociales en vigueur à Madagascar et ses textes d’application, de modifications et d’additifs ultérieurs ;</li>
                    <li>Le règlement intérieur régissant la société INDEX-OI.</li>
                </ul>
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 9 </span>: Juridiction </span>
                <br> Tout différend ou litige relatif à l’exécution du présent contrat doit être réglé à l’amiable avant d’être soumis à l’arbitrage du Tribunal d’Antananarivo.
                <br>Fait en deux exemplaires originaux.
            </div>
            <div class="row" style="text-align: right;">
                Antananarivo, le <span class="AntanananarivoLe"></span>
            </div>
            <div class="row" style="display: flex; justify-content: space-between;">
                <div>Lu et approuvé </div>
                <div style="margin-right: 25%;">
                    <div>Lu et approuvé</div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row" style="display: flex; justify-content: space-between;">
                <div><span class="NameComplet"></span></div>
                <div style="margin-right: 100px;">
                    <div>Madame RAHARIVAO</div>
                </div>
            </div>
        </div>
        <div class="sectionToPrint" id="ContratCDD" style="display: none;">
            <div class="row">
                <div style="text-align: left;">
                    <img width="300" height="100" src="<?php echo URL . "content/img/logo index oi imprimable.png "; ?>" alt="Logo">
                </div>
            </div>
            <div class="row c b">
                <p>
                    <span style="margin: 0; padding: 0;border-bottom: 1px solid black;">CONTRAT DE TRAVAIL</span>
                </p>
            </div>
            <div class="row">
                <p>
                    Entre les soussignés :
                    <br> Société A Responsabilité Limitée INDEX-OI, dont le siège social se trouve à Antanimena, Antananarivo, Lot IVS 2, 104 Avenue Lénine, représentée par sa Gérante,<span id="gerant1"></span>
                    <div style="text-align: right;">d’une part</div>
                </p>
            </div>
            <div class="row">
                <p>
                    Et,
                    <br>
                    <span class="NameComplet"></span> né(e) le <span class="DN"> </span>, titulaire de la carte d’identité nationale n° <span class="CinContrat"> </span> , domicilié(e) au Lot <span class="AdresseContract"></span>.
                </p>
            </div>
            <div class="row" style="text-align: right;">
                <p>
                    d’autre part
                </p>
            </div>
            <div class="row c">IL EST CONVENU ET ARRETE CE QUI SUIT</div>
            <div class="row">
                <span class="b"><span class="uline">Article 1 </span>: Objet </span>
                <br> Le présent contrat a pour objet de fixer les conditions d’emploi de <span class="NameComplet"></span>.
                <span class="NameComplet"></span> est recruté(e) en qualité de <span class="FonctionContrat"></span>. Il (Elle) est classé(e) dans la catégorie professionnelle <span class="ClassContrat"></span>.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 2 </span>: Durée </span>
                <br>Le présent contrat est établi pour une durée de <span class="b DurationCDD" style="border-bottom: 1px solid black;"></span> et prend effet à compter du <span class="DateEmbContrat"></span>.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 3 </span>: Lieu de travail </span>
                <br>Le lieu d’emploi est au Lot IVS 2, 104 Avenue Lénine, Antananarivo.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 4 </span>: Rémunération </span>
                <br><span class="NameComplet"></span> percevra un salaire de base mensuel de <span class="SBContrat"></span> Ar.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 5 </span>: Congé </span>
                <br>
                <span class="NameComplet"></span> aura droit à un congé de deux jours et demi calendaires par mois de service effectif. Le congé ne pourra être remplacé par une indemnité compensatrice. Toutefois, en cas de rupture de contrat, avant que
                le travailleur ait acquit droit de jouissance au congé, il lui sera alloué, par la Société à la place du congé, une indemnité, calculée d’après la durée à laquelle il pourra prétendre proportionnellement au temps de service qu’il aura
                effectué chez l’Employeur.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 6 </span>: Soins médicaux </span>
                <br>
                <span class="NameComplet"></span> sera déclaré(e) à l’Organisation Sanitaire du lieu de travail pour les soins médicaux.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 7 </span>: Règlementations </span>
                <br>
                <span class="NameComplet"></span> est soumis(e) aux règlementations édictées par :
                <ul style="list-style-type: square;">
                    <li>La législation du travail et des lois sociales en vigueur à Madagascar et ses textes d’application, de modifications et d’additifs ultérieurs ;</li>
                    <li>Le règlement intérieur régissant la société INDEX-OI.</li>
                </ul>
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 8 </span>: Juridiction </span>
                <br> Tout différend ou litige relatif à l’exécution du présent contrat doit être réglé à l’amiable avant d’être soumis à l’arbitrage du Tribunal d’Antananarivo.
                <br>Fait en deux exemplaires originaux.
            </div>
            <div class="row" style="text-align: right;">
                Antananarivo, le <span class="AntanananarivoLe"></span>
            </div>
            <div class="row" style="display: flex; justify-content: space-between;">
                <div>Lu et approuvé </div>
                <div style="margin-right: 25%;">
                    <div>Lu et approuvé</div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row" style="display: flex; justify-content: space-between;">
                <div><span class="NameComplet"></span></div>
                <div style="margin-right: 100px;">
                    <div>Madame RAHARIVAO</div>
                </div>
            </div>
        </div>
        <div class="sectionToPrint" id="ContratEssai" style="display: none;">
            <div class="row">
                <div style="text-align: left;">
                    <img width="300" height="100" src="<?php echo URL . "content/img/logo index oi imprimable.png "; ?>" alt="Logo">
                </div>
            </div>
            <div class="row c b">
                <p>
                    <span style="margin: 0; padding: 0;border-bottom: 1px solid black;">CONTRAT DE TRAVAIL</span>
                </p>
            </div>
            <div class="row">
                <p>
                    Entre les soussignés :
                    <br> Société A Responsabilité Limitée INDEX-OI, dont le siège social se trouve à Antanimena, Antananarivo, Lot IVS 2, 104 Avenue Lénine, représentée par sa Gérante,<span id="gerant1"></span>
                    <div style="text-align: right;">d’une part</div>
                </p>
            </div>
            <div class="row">
                <p>
                    Et,
                    <br>
                    <span class="NameComplet"></span> né(e) le <span class="DN"> </span>, titulaire de la carte d’identité nationale n° <span class="CinContrat"> </span> , domicilié(e) au Lot <span class="AdresseContract"></span>.
                </p>
            </div>
            <div class="row" style="text-align: right;">
                <p>
                    d’autre part
                </p>
            </div>
            <div class="row c">IL EST CONVENU ET ARRETE CE QUI SUIT</div>
            <div class="row">
                <span class="b"><span class="uline">Article 1 </span>: Objet </span>
                <br> Le présent contrat a pour objet de fixer les conditions d’emploi de <span class="NameComplet"></span>.
                <span class="NameComplet"></span> est recruté(e) en qualité de <span class="FonctionContrat"></span>. Il (Elle) est classé(e) dans la catégorie professionnelle <span class="ClassContrat"></span>.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 2 </span>: Durée </span>
                <br> La période d’essai est fixée à <span class="b DurationEssaie" style="border-bottom: 1px solid black;"></span> à partir du <span class="DateEmbContrat"></span>, durant laquelle le contrat pourra être dénoncé par l’une des
                deux parties sans préavis.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 3 </span>: Lieu de travail </span>
                <br>Le lieu d’emploi est au Lot IVS 2, 104 Avenue Lénine, Antananarivo.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 4 </span>: Rémunération </span>
                <br><span class="NameComplet"></span> percevra un salaire de base mensuel de <span class="SBContrat"></span> Ar.
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 5 </span>: Règlementations </span>
                <br>
                <span class="NameComplet"></span> est soumis(e) aux règlementations édictées par :
                <ul style="list-style-type: square;">
                    <li>La législation du travail et des lois sociales en vigueur à Madagascar et ses textes d’application, de modifications et d’additifs ultérieurs ;</li>
                    <li>Le règlement intérieur régissant la société INDEX-OI.</li>
                </ul>
            </div>
            <div class="row">
                <span class="b"><span class="uline">Article 6 </span>: Juridiction </span>
                <br> Tout différend ou litige relatif à l’exécution du présent contrat doit être réglé à l’amiable avant d’être soumis à l’arbitrage du Tribunal d’Antananarivo.
                <br>Fait en deux exemplaires originaux.
            </div>
            <div class="row" style="text-align: right;">
                Antananarivo, le <span class="AntanananarivoLe"></span>
            </div>
            <div class="row" style="display: flex; justify-content: space-between;">
                <div>Lu et approuvé </div>
                <div style="margin-right: 25%;">
                    <div>Lu et approuvé</div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row" style="display: flex; justify-content: space-between;">
                <div><span class="NameComplet"></span></div>
                <div style="margin-right: 100px;">
                    <div>Madame RAHARIVAO</div>
                </div>
            </div>
        </div>
    </main>
    <script class="<?php echo URL . "content/js/customized/Autocompleted_input.js "; ?>"></script>
    <script id="JQthor">
        $('#dropdownEmploye').addClass('active-nav-bar');
        //validation forms
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        //Calcule automatique des taux horaire, suppl, majoré
        $(document).ready(function() {
            $('#SalaryBaseEmploye').on('input', function() {
                var salaryBase = $(this).val();
                if (!isNaN(salaryBase)) {
                    var salaryBaseNumber = parseFloat(salaryBase);
                    // Calcul taux horaire  = Diviser la valeur par 173,33h car 1 volana = 173,33h
                    let tauxHeure = Math.ceil(salaryBaseNumber / 173.33 * 100) / 100; // Arrondi au supérieur avec 2 chiffres après la virgule
                    $('#TauxHeureEmploye').val(tauxHeure.toFixed(2));
                    // Calcul heuresup à 30% = TH*1.3
                    let th30 = tauxHeure * 1.3;
                    $('#THS30').val(th30.toFixed(0));
                    // Calcul heuresup à 50% = TH*1.5
                    let th50 = tauxHeure * 1.5;
                    $('#THS50').val(th50.toFixed(0));
                    // Calcul heureMajoré à 40% = TH*0.4
                    let thm40 = tauxHeure * 0.4;
                    $('#THM40').val(thm40.toFixed(0));
                    // Calcul heureMajoré à 50% = TH*0.5
                    let thm50 = tauxHeure * 0.5;
                    $('#THM50').val(thm50.toFixed(0));
                    // Calcul heureMajoré à 50% = TH*0.5
                    let thm100 = tauxHeure * 2;
                    $('#THM100').val(thm100.toFixed(0));
                } else {
                    $('#TauxHeureEmploye').val('Veuillez entrer un nombre valide');
                }
            });
            $('#NbrEnfantEmploye').on('input', function() {
                if ($(this).val() == 1) {
                    //suppression input Nom d el'enfant
                    $('.nameChild2').hide('slow');
                    $('#NomEnf2').removeAttr('name');
                    $('.nameChild3').hide('slow');
                    $('#NomEnf3').removeAttr('name');
                    //suppression input Date N Enfant
                    $('.birthChild2').hide('slow');
                    $('#DateNEnf2').removeAttr('name');
                    $('.birthChild3').hide('slow');
                    $('#DateNEnf3').removeAttr('name');
                } else if ($(this).val() == 2) {
                    //suppression input Nom d el'enfant
                    $('.nameChild2').show('slow');
                    $('#NomEnf2').attr('name', 'NomEnf2');
                    $('.nameChild3').hide('slow');
                    $('#NomEnf3').removeAttr('name');
                    //suppression input Date N Enfant
                    $('.birthChild2').show('slow');
                    $('#DateNEnf2').attr('name', 'DateNEnf2');
                    $('.birthChild3').hide('slow');
                    $('#DateNEnf3').removeAttr('name');
                } else {
                    $('.nameChild3').show('slow');
                    $('#NomEnf3').attr('name', 'NomEnf3');
                    //suppression input Date N Enfant
                    $('.birthChild3').show('slow');
                    $('#DateNEnf3').attr('name', 'DateNEnf3');
                }
            });
        });
        //envoie fichier exporté
        $('.file-input').on('change', function() {
            $(this).closest('form').submit();
        });
        //hidden cdd if IND
        $('#TypeContratEmploye').change(function(){
            if($(this).val()==="IND")
            {
                $('#durationCDDEmployeLabel').hide();
                $('#durationCDDEmploye').hide();
                $('#CDDMotifEmployeLabel').hide();
                $('#CDDMotifEmploye').hide();
                //desactivation de l'input DuratioCDD
                $('#durationCDDEmploye').attr('disabled', 'disabled');
            }
            else if($(this).val()==="CDD")
            {
                $('#durationCDDEmployeLabel').show();
                $('#durationCDDEmploye').show();
                $('#durationCDDEmployeLabel').text("Durée CDD (ans)");
                $('#durationCDDEmploye').removeAttr('disabled');
                $('#CDDMotifEmploye').removeAttr('disabled');
                $('#CDDMotifEmployeLabel').show();
                $('#CDDMotifEmploye').show();
            }
            else if($(this).val()==="Essai")
            {
                $('#durationCDDEmployeLabel').show();
                $('#durationCDDEmployeLabel').text("Essai de (mois)");
                $('#durationCDDEmploye').show();
                $('#CDDMotifEmployeLabel').hide();
                $('#CDDMotifEmploye').attr('disabled', 'disabled');
                $('#CDDMotifEmploye').hide();
            }
        });
        //impression contrat
        $('#printButton').click(function() {
            // Déterminant si Contrat IND ou CDD ou contrat d'essai 
            var content; // Defieitio de content pour eviter les ereues
            if ($('#TypeContratEmploye').val() === "IND") {
                content = $('#ContratCDI').clone();
            } else if ($('#TypeContratEmploye').val() === "CDD") {
                content = $('#ContratCDD').clone();
                content.find('.DurationCDD').text(function() {
                    var DurationValue = parseInt($('#durationCDDEmploye').val());
                    return nombreEnLettres(DurationValue) + " (" + DurationValue + ") an" + (DurationValue > 1 ? "s" : "");
                });
            } else if ($('#TypeContratEmploye').val() === "Essai") {
                content = $('#ContratEssai').clone();
                content.find('.DurationEssaie').text(function() {
                    var EssaiDuration = parseInt($('#durationCDDEmploye').val());
                    if(EssaiDuration)
                        return nombreEnLettres(EssaiDuration) + " (" + EssaiDuration + ") mois";
                    else
                        return "SIX (06) mois"
                });
            }
            // Construire le document HTML à imprimer
            var printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write('<html>');
            printWindow.document.write('<head><title>Contrat ' + $('#Nom').val() + ' ' + $('#Prenom').val() + '</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">');
            printWindow.document.write("<style>@page {margin: 1cm!important;}body{padding:1.2cm;font-family:Helvetica!important;}.sectionToPrint{font-size:12px}.uline{border-bottom:1px solid black;margin-bottom:90px;}.b{font-weight:bold}.c{text-align:center;justify-content:center}.r{text-align:right}.l{text-align:left;}.row{margin-bottom:15px;}</style>");
            printWindow.document.write('</head>');
            printWindow.document.write('<body>');
    
            // Remplacez les éléments par leurs valeurs
            // Nom Complet
            content.find('.NameComplet').text(function() {
                var selectedValue = $('input[name="SexeEmploye"]:checked').val();
                if (selectedValue === "H") {
                    return 'Monsieur ' + $('#Nom').val() + ' ' + $('#Prenom').val();
                } else if (selectedValue === "F") {
                    return 'Madame ' + $('#Nom').val() + ' ' + $('#Prenom').val();
                } else {
                    return 'Monsieur/Madame ' + $('#Nom').val() + ' ' + $('#Prenom').val();
                }
            });
    
            // Date de naissance
            content.find('.DN').text(function() {
                var DNValue = $('#DateNaissEmploye').val(); // input type date
                // Utilisez la fonction formatDate correctement
                DNValue = formatDate(DNValue);
                return DNValue;
            });
            // CIN
            content.find('.CinContrat').text(function() {
                var CINValu = $('#NumCIN').val();
                return CINValu;
            });
            // Adresse
            content.find('.AdresseContract').text(function() {
                var AdresseValue = $('#AdresseEmploye').val();
                return AdresseValue;
            });
            // Fonction
            content.find('.FonctionContrat').text(function() {
                var FonctionValue = $('#FonctionEmploye').val(); 
                return FonctionValue;
            });
            // Class
            content.find('.ClassContrat').text(function() {
                var ClassValue = $('#ClassEmploye').val();
                return ClassValue;
            });
            // Date d'embauche
            content.find('.DateEmbContrat').text(function() {
                var EmbValue = $('#DateEmbaucheEmploye').val();
                EmbValue = formatDate(EmbValue);
                return EmbValue;
            });
            // Salaire de base
            content.find('.SBContrat').text(function() {
                var SBValue = $('#SalaryBaseEmploye').val();
                return SBValue;
            });
            // Antanananarivo Fait le 'Date'
            content.find('.AntanananarivoLe').text(function() {
                var AntanananarivoLe = $('#AntanananarivoLe').val();
                AntanananarivoLe = formatDate(AntanananarivoLe);
                return AntanananarivoLe;
            });
    
            // Ajoutez le contenu cloné à la nouvelle fenêtre
            printWindow.document.write(content.html());
            printWindow.document.write('</body>');
            printWindow.document.write('</html>');
    
            // Fermer le document et lancer l'impression
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        });
        // Fonction de formatage de date
        function formatDate(DateAformater) {
            const date = new Date(DateAformater);
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            let formattedDate = date.toLocaleDateString('fr-FR', options);
            return formattedDate;
        }
        //Fonction pour la durée de CDD 
        function nombreEnLettres(nombre) {
            const unites = ['', 'UN', 'DEUX', 'TROIS', 'QUATRE', 'CINQ', 'SIX', 'SEPT', 'HUIT', 'NEUF', 'DIX', 'ONZE', 'DOUZE', 'TREIZE', 'QUATORZE', 'QUINZE', 'SEIZE', 'DIX-SEPT', 'DIX-HUIT', 'DIX-NEUF'];
            const dizaines = ['', '', 'VINGT', 'TRENTE', 'QUARANTE', 'CINQUANTE', 'SOIXANTE', 'SOIXANTE-DIX', 'QUATRE-VINGT', 'QUATRE-VINGT-DIX'];
    
            if (nombre === 0) {
                return 'ZERO';
            } else if (nombre < 20) {
                return unites[nombre];
            } else if (nombre < 100) {
                return dizaines[Math.floor(nombre / 10)] + (nombre % 10 !== 0 ? '-' + unites[nombre % 10] : '');
            } else {
                return 'Nombre non géré';
            }
        }
        //Fonction pour mettre même valeur date d'embauche date contrat (seulement par defaut pout niquer ta mère)
        function sameValueContrat(){
                var DateE = $('#DateEmbaucheEmploye').val();
                var DateE = new Date(DateE);
                const day = String(DateE.getDate()).padStart(2, '0');
                const month = String(DateE.getMonth() + 1).padStart(2, '0');
                const year = DateE.getFullYear();
                $('#AntanananarivoLe').val(year+'-'+month+'-'+day);
        }
    </script>
    <script class="villeAUTOSUGGER">
        // JavaScript pour gérer l'auto-complétion lieu
        let input = document.getElementById('LieuNaissEmploye');
        let suggestionsContainer = document.getElementById('suggestions');
    
        input.addEventListener('input', () => {
            let query = input.value;
    
            if (query.length > 0) {
                fetch(`https://nominatim.openstreetmap.org/search?format=json&countrycodes=mg&q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        displaySuggestions(data);
                    })
                    .catch(error => {
                        console.error('Error fetching suggestions:', error);
                    });
            } else {
                suggestionsContainer.innerHTML = '';
            }
        });
    
        function displaySuggestions(predictions) {
            suggestionsContainer.innerHTML = '';
    
            predictions.forEach(prediction => {
                let suggestionItem = document.createElement('div');
                suggestionItem.textContent = prediction.display_name;
                suggestionItem.addEventListener('click', () => {
                    input.value = prediction.display_name;
                    suggestionsContainer.innerHTML = '';
                });
    
                suggestionsContainer.appendChild(suggestionItem);
            });
        }
    </script>
    <?php require_once 'footer.php'; ?>

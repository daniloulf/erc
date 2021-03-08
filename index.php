<!DOCTYPE html>
<html lang="de">
    <head>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="This is a simple simulator which generates elections for 7 different parties." />
        <meta name="author" content="Danilo Ulf Mattick" />
        <meta name="keywords" content="eclection, votes, vote, non-voters, parties, value, fun, bootstrap" />
        
        <title>Election Result Comparator @dum-planet.de</title>
        
        <!-- Icons -->
        <link rel="shortcut icon" type="image/x-icon" size="16x16" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00424a">
        <meta name="msapplication-TileColor" content="#00424a">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png">
        <meta name="theme-color" content="#00424a">
        
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet" />

         <!-- User  CSS -->
        <link href="css/fonts.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <header>
				<div class="container">
					<h1>
						Election Result Comparator
					</h1>
					<h2>
						Ein Szenariogenerator für Wahlen!
					<h2>
				</div>
			</header>
            
            <!-- Content -->
            
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<form id="erc">
							<label class="form-label">Wahlberechtigte Gesamtbürger</label>
							<input class="form-control form-control-sm" value="1000" title="Geben Sie eine Zahl von 1000 bis 999.999.999 ein." type="number" min="1000" max="999999999" id="citizens-total" required />
							
							<label class="form-label">Ungültige Stimmen in (%)</label>
							<input class="form-control form-control-sm" value="1" title="Geben Sie eine Zahl von 1 bis 100 ein." type="number" min="1" max="" id="invalid-votes" required />
							
							<label class="form-label">Wahlbeteildigung in (%)</label>
							<input class="form-control form-control-sm" value="50" title="Geben Sie eine Zahl zwischen 1 und 100 ein." type="number" min="1" max="100" id="voting-citizens" required />
							
							<label class="form-label">Partei 1</label>
							<input class="form-control form-control-sm" value="CDU" title="Geben Sie nur 3 bis 6 Buchstaben ein." class="parties" type="text" min="3" max="6" id="party1" required /> 
							
							<label class="form-label">Partei 2</label>
							<input class="form-control form-control-sm" value="SPD" title="Geben Sie nur 3 bis 6 Buchstaben ein." class="parties" type="text" min="3" max="6" id="party2" required /> 
							
							<label class="form-label">Partei 3</label>
							<input class="form-control form-control-sm" value="FDP" title="Geben Sie nur 3 bis 6 Buchstaben ein." class="parties" type="text" min="3" max="6" id="party3" required /> 
							
							<label class="form-label">Partei 4</label>
							<input class="form-control form-control-sm" value="Grüne" title="Geben Sie nur 3 bis 6 Buchstaben ein." class="parties" type="text" min="3" max="6" id="party4" required /> 
							
							<label class="form-label">Partei 5</label>
							<input class="form-control form-control-sm" value="Linke" title="Geben Sie nur 3 bis 6 Buchstaben ein." class="parties" type="text" min="3" max="6" id="party5" required /> 
							
							<label class="form-label">Partei 6</label>
							<input class="form-control form-control-sm" value="Partei" title="Geben Sie nur 3 bis 6 Buchstaben ein." class="parties" type="text" min="3" max="6" id="party6" required /> 
							
							<label class="form-label">Partei 7</label>
							<input class="form-control form-control-sm" value="AFD" title="Geben Sie nur 3 bis 6 Buchstaben ein." class="parties" type="text" min="3" max="6" id="party7" required /> 
						</form>
					</div><!-- End of col 1 -->
					<div class="col-lg-6">
						<div id="content" class="teaser">
							<h3>Willkommen zum Wahlstimmer Vergleicher</h3>
							<p>
								Dieses Projekt bietet Ihnen die Möglichkeit zu sehen, welche Auswirkungen Nicht-Wähler bei einer Wahl auf das Wahlergebnis haben. &mdash; Anhand des Vergleiches zwischen den Ausgaben <i>Ergebnisse mit Wahlberechtigten ohne Nicht-Wähler</i>  (100% Wahlbeteildigung) und <i>Ergebnis mit Wahlberechtigten mit Nicht-Wählern</i> können sie die Beeinflussung der Wahlergebnisse durch Nicht-Wähler sehen. Die Zahlenwerte werden immer zufällig generiert. Es geht beim Wahlergebnis lediglich darum den Unterschied zwischen Wählberechtigten und Nichtwählern aufzuzeigen.
							</p>
							
							<h4>Anleitung</h4>
							<p>
								Füllen Sie Bitte die erforderlichen Felder aus. Während der Eingabe werden Ihre Werte überprüft, wenn alle Eingaben den Vorgaben entsprechen wird dieser Text geändert. Fahren sie Länger mit der Maus über ein Feld können sie nach kurzer Verweildauer Informationen zu jeweiligen Eingabebereich erhalten. Nach der ersten Bearbeitung können Sie Werte in Echtzeit ändern und das Ergebnis sehen. 
							</p>
						</div><!-- End of Teaser -->
						<div id="content" class="result">
							<h3>Basiswerte</h3>
							<p>Wahlberechtigte: <span id="voters"></span> davon ungültige Wählerstimmen: <span id="invalid-voters"></span></p>
							<p>Nichtwähler in <span id="non-voters"></span>% sind anteilig <span id="non-voters-number"></span> Stimmen</p>
							
							<h3>Ergebnis mit Wahlberechtigten exkl. Nicht-Wähler</h3>
								<p>
									Diese Wahlergebnisse entsprechen einer Wahl, wenn die Nicht-Wähler nicht ihre Stimmzettel ungültig machen.
								</p>
								<table>
									<tr>
										<td class="parties" id="p1_name"></td>
										<td class="parties" id="p2_name"></td>
										<td class="parties" id="p3_name"></td>
										<td class="parties" id="p4_name"></td>
										<td class="parties" id="p5_name"></td>
										<td class="parties" id="p6_name"></td>
										<td class="parties" id="p7_name"></td>
									</tr>
									<tr>
										<td id="p1_result"></td>
										<td id="p2_result"></td>
										<td id="p3_result"></td>
										<td id="p4_result"></td>
										<td id="p5_result"></td>
										<td id="p6_result"></td>
										<td id="p7_result"></td>
									</tr>
									<tr>
										<td id="p1_number"></td>
										<td id="p2_number"></td>
										<td id="p3_number"></td>
										<td id="p4_number"></td>
										<td id="p5_number"></td>
										<td id="p6_number"></td>
										<td id="p7_number"></td>
									</tr>
								</table>
					
							
							<h3>Ergebnis mit Wahlberechtigten inkl. Nicht-Wähler</h3>
								<p>
									Diese Wahlergebnisse berücksichtigen die Nicht-Wähler zum Beispiel durch das ungültig machen Ihrer Stimmzettel.
								</p>
								<table>
									<tr>
										<td class="parties" id="p1_name_2"></td>
										<td class="parties" id="p2_name_2"></td>
										<td class="parties" id="p3_name_2"></td>
										<td class="parties" id="p4_name_2"></td>
										<td class="parties" id="p5_name_2"></td>
										<td class="parties" id="p6_name_2"></td>
										<td class="parties" id="p7_name_2"></td>
									</tr>
									<tr>
										<td id="p1_result_2"></td>
										<td id="p2_result_2"></td>
										<td id="p3_result_2"></td>
										<td id="p4_result_2"></td>
										<td id="p5_result_2"></td>
										<td id="p6_result_2"></td>
										<td id="p7_result_2"></td>
									</tr>
									<tr>
										<td id="p1_number_2"></td>
										<td id="p2_number_2"></td>
										<td id="p3_number_2"></td>
										<td id="p4_number_2"></td>
										<td id="p5_number_2"></td>
										<td id="p6_number_2"></td>
										<td id="p7_number_2"></td>
									</tr>
								</table>
						</div>
					</div><!-- End of RESULTS -->
					<div class="col-lg-12">
						<p class="error_msg"></p>
					</div><!-- End of ERROR -->
				</div><!-- End of col row -->
			</div><!-- End of container -->
            			
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<p>&copy; Danilo Ulf Mattick &mdash; All rights reserved! &mdash; <a href="https://github.com/daniloulf/erc">fork it</a>
						</div>
					</div>
				</div>
			</footer>
            
        </div><!-- End Wrapper -->
		
		<!-- Javascript jQuery -->
	    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	    <script src="./js/validation.min.js"></script>
	    
	    <!-- User JS -->
	    <script src="js/myscript.js"></script>
		
    </body>
</html>
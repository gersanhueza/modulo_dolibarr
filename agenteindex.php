<?php
/* Copyright (C) 2001-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2015      Jean-François Ferry	<jfefe@aternatik.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       htdocs/modulebuilder/template/agenteindex.php
 *	\ingroup    agente
 *	\brief      Home page of agente top menu
 */

// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER["CONTEXT_DOCUMENT_ROOT"])) {
	$res = @include $_SERVER["CONTEXT_DOCUMENT_ROOT"]."/main.inc.php";
}
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME']; $tmp2 = realpath(__FILE__); $i = strlen($tmp) - 1; $j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) {
	$i--; $j--;
}
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1))."/main.inc.php")) {
	$res = @include substr($tmp, 0, ($i + 1))."/main.inc.php";
}
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php")) {
	$res = @include dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php";
}
// Try main.inc.php using relative path
if (!$res && file_exists("../main.inc.php")) {
	$res = @include "../main.inc.php";
}
if (!$res && file_exists("../../main.inc.php")) {
	$res = @include "../../main.inc.php";
}
if (!$res && file_exists("../../../main.inc.php")) {
	$res = @include "../../../main.inc.php";
}
if (!$res) {
	die("Include of main fails");
}

require_once DOL_DOCUMENT_ROOT.'/core/class/html.formfile.class.php';

// Load translation files required by the page
$langs->loadLangs(array("agente@agente"));

$action = GETPOST('action', 'aZ09');

$max = 5;
$now = dol_now();

// Security check - Protection if external user
$socid = GETPOST('socid', 'int');
if (isset($user->socid) && $user->socid > 0) {
	$action = '';
	$socid = $user->socid;
}

// Security check (enable the most restrictive one)
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
//if (!isModEnabled('agente')) {
//	accessforbidden('Module not enabled');
//}
//if (! $user->hasRight('agente', 'myobject', 'read')) {
//	accessforbidden();
//}
//restrictedArea($user, 'agente', 0, 'agente_myobject', 'myobject', '', 'rowid');
//if (empty($user->admin)) {
//	accessforbidden('Must be admin');
//}


/*
 * Actions
 */

// None


/*
 * View
 */

$form = new Form($db);
$formfile = new FormFile($db);

llxHeader("", $langs->trans("SCRIPT AGENTE"));

print load_fiche_titre($langs->trans("SCRIPT AGENTE"), '', 'agente.png@agente');

print '<div class="fichecenter">

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	

	<link rel="stylesheet" type="text/css"
	href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>

	
<form action="" method="POST" accept-charset="ISO-8859-1" id="frmingresar">
<!-- PRIMER CUADRO-->
<div class="container-fluid my-2">
<div class="row border border-secondary rounded mx-0 shadow-sm py-3 fondo_cuadro">
  <div class="col">
	
	<label>Nombres</label>
	<input name="nombres" type="name" class="form-control" value="" size="32" id="nombres" >

	<label class="my-2">Nombre de la Compañia</label>
	<input name="nombre_compania" type="name" class="form-control" value="" size="32" id="nombre_compania" />


  </div>

  <div class="col">

	  <label>Apellidos</label>
	<input name="apellidos" type="name" class="form-control" value="" size="32" id="apellidos" />
 
	<label class="my-2">Telefono Cliente</label>
	<input name="phone" type="number" class="form-control" value="" size="32" id="phone" />

  </div>

  <div class="col">

	  <label>Documento de Identificacion</label>
	<input name="dni" type="name" class="form-control" value="" size="32" id="dni" />   
	
  </div>

  <div class="col">

	<label>Correo Electrónico</label>
	<input name="email" type="email" class="form-control" value="" size="32" id="email" />

	
  </div>
</div>
</div>

<!-- SEGUNDO CUADRO-->

<div class="container-fluid my-2">
<div class="row border border-secondary rounded mx-0 shadow-sm py-3 fondo_cuadro">
  <div class="col">

  <label>Servicio</label>
  <select name="servicio_icontec" id="servicio_icontec" class="form-select">
	<option value=""></option>
	<option value="Informacion de Servicio">1.- Informacion de Servicio</option>
	<option value="PQRs">2.- PQRs</option>
	<option value="Proveedores">3.- Proveedores</option>
	<option value="Prácticas indebidas, Comportamientos irregulares o Actividades en contra de las politicas de INCONTEC">4.- Prácticas indebidas, Comportamientos irregulares o Actividades en contra de las politicas de INCONTEC</option>
	<option value="Para Comunicarse con una extensión">5.- Para Comunicarse con una extensión</option>
	<option value="Para contactarte a través de Whatsapp">6.- Para contactarte a través de Whatsapp</option>
	<option value="Sin Clasificación">7.- Sin Clasificación</option>
	
  </select>

  <label class="my-2">Opción que deseas gestionar</label>
  <select name="opcion_gestion" id="opcion_gestion" class="form-select">
	<option value="" selected="selected"></option>
	<option value="Afiliados">Afiliados</option>
	<option value="Acraditación Salud">Acraditación Salud</option>
	<option value="Certificación Procesos y Servicios">Certificación Procesos y Servicios</option>
	<option value="Certificación Productos">Certificación Productos</option>
	<option value="Certificación Sistemas">Certificación Sistemas</option>
	<option value="Cooperación y Proyectos Especiales">Cooperación y Proyectos Especiales</option>
	<option value="Educación">Educación</option>
	<option value="General">General</option>
	<option value="Inspección">Inspección</option>
	<option value="Laboratorios">Laboratorios</option>
	<option value="Normalización">Normalización</option>
	<option value="Normas y Publicaciones">Normas y Publicaciones</option>
	<option value="Proveedores">Proveedores</option>
	<option value="Validación y Verificación">Validación y Verificación</option>
	<option value="Proyecto Sura">Proyecto Sura</option>
  </select>

  <label class="my-2">Estados</label>
  <select name="estados" id="estados" class="form-select">
	<option value="" selected="selected"></option>
	<option value="Sin Clasificar">Sin Clasificar</option>
	<option value="Se Contacto al Cliente">Se Contacto al Cliente</option>
	<option value="Se Envió Cotización">Se Envió Cotización</option>
	<option value="Generar Negociación">Generar Negociación</option>
	<option value="Prospecto no útil">Prospecto no útil</option>
  </select>

  </div>

  <div class="col">

  <label>Tipo</label>
  <select name="tipo_icontec" id="tipo_icontec" class="form-select">
	<option value="" selected="selected"></option>
	<option value="Administrativo">Administrativo</option>
	<option value="Servicios">Servicios</option>
	<option value="Servicio al cliente">Servicio al Cliente</option>
  </select>

  <label class="my-2">Tipo de Solicitud</label>
  <select name="tipo_solicitud" id="tipo_solicitud" class="form-select">
	<option value="" selected="selected"></option>
	<option value="No Aplica">No Aplica</option>
	<option value="Comunicación con la Regional">Comunicación con la Regional</option>
	<option value="Comunicación con la Filial">Comunicación con la Filial</option>
	<option value="Compra: Afiliación(Solo Colombia)">Compra: Afiliación(Solo Colombia)</option>
	<option value="Educación Linea Abierta/Virtual">Educación Linea Abierta/Virtual</option>
  </select>

  <label class="my-2">Prospecto</label>
  <select name="prospecto" id="prospecto" class="form-select">
	<option value="No" selected="selected">No</option>
	<option value="Si">Si</option>

  </select>


  </div>

  <div class="col">

  <label>Clase de Contacto</label>
  <select name="clase_contacto" id="clase_contacto" class="form-select">
	<option value="" selected="selected"></option>
	<option value="Chat">Chat</option>
	<option value="Formulario">Formulario</option>
	<option value="Whatsapp">Whatsapp</option>
	<option value="Mail">Mail</option>
	<option value="SMS">SMS</option>
  </select>

  <label class="my-2">Regional / Filial</label>
  <select name="regional" id="regional" class="form-select">
	<option value="" selected="selected"></option>
	<option value="No Aplica">No Aplica</option>
	<option value="Centro y Sur Oriente">Centro y Sur Oriente</option>
	<option value="Antioquia, Chocó y Eje Cafetero">Antioquia, Chocó y Eje Cafetero</option>
	<option value="Sur Occidente">Sur Occidente</option>
	<option value="Caribe">Caribe</option>
	<option value="Ecuador">Ecuador</option>
	<option value="Mail">Mail</option>
	<option value="Chile">Chile</option>
	<option value="México">México</option>
	<option value="Bolivia">Bolivia</option>
	<option value="Perú">Perú</option>
	<option value="El Salvador">El Salvador</option>
	<option value="Honduras">Honduras</option>
	<option value="Nicaragua">Nicaragua</option>
	<option value="Costa Rica">Costa Rica</option>
	<option value="Oriente">Oriente</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Otros Paises">Otros Paises</option>
  </select>
  
  </div>

  <div class="col">

  <label>Categoria de Contacto</label>
  <select name="categoria_contacto" id="categoria_contacto" class="form-select">
	<option value="" selected="selected"></option>
	<option value="General">General</option>
	<option value="Cartera">Cartera</option>
	<option value="Comunicación">Comunicación</option>
	<option value="Campaña">Campaña</option>
	<option value="Información Servicio">Información Servicio</option>
	<option value="Portafolio Servicios">Portafolio Servicios</option>
	<option value="Solicitud Servicio">Solicitud Servicio</option>
	<option value="Programación otorgamiento/Renovación del Servicio">Programación otorgamiento/Renovación del Servicio</option>
	<option value="Actualizacion datos">Actualizacion datos</option>
	<option value="Felicitación">Felicitación</option>
	<option value="Queja">Queja</option>
	<option value="Queja de tercero">Queja de tercero</option>
	<option value="Sugerencia">Sugerencia</option>
	<option value="Tienda Virtual">Tienda Virtual</option>
	<option value="Linea ética">Linea ética</option>
	<option value="Seguimiento">Seguimiento</option>
  </select>

  <label class="my-2">Contacto Destinatario Gestión</label>
  <select name="contacto_destinatario" id="contacto_destinatario" class="form-select">
	<option value="" selected="selected"></option>
	
  </select>


  <input name="vendedor" id="vendedor" type="hidden" value=""/>
  <input name="servicio" type="hidden" value="" id="servicio"/>

  <input name="session_axios" type="hidden" id="session_axios" value="">
  <input name="record_url_axios" type="hidden" id="record_url_axios" value="">      
  <input name="login" type="hidden" id="login" value="">  
  <input name="id_login" type="hidden" id="id_login" value="">  

  </div>

  <div class="col-12">

	<label class="my-2">Observación</label>
	<br>
	<textarea class="form-control" style="resize: none;" cols="128" rows="2" id="observacion" name="observacion"></textarea>

  </div>

</div>
</div> 

<div class="container-fluid">
<div class="row">
  <div class="col">

	<button type="submit" class="btn btn-primary w-100" id="btn_ingresar">INGRESAR</button>

  </div>
</div>    
</div>

</form>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.10/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="js/ingresar_registro.js"></script>
	
</body>
</html>

<div class="fichethirdleft">';


/* BEGIN MODULEBUILDER DRAFT MYOBJECT
// Draft MyObject
if (isModEnabled('agente') && $user->rights->agente->read)
{
	$langs->load("orders");

	$sql = "SELECT c.rowid, c.ref, c.ref_client, c.total_ht, c.tva as total_tva, c.total_ttc, s.rowid as socid, s.nom as name, s.client, s.canvas";
	$sql.= ", s.code_client";
	$sql.= " FROM ".MAIN_DB_PREFIX."commande as c";
	$sql.= ", ".MAIN_DB_PREFIX."societe as s";
	if (! $user->rights->societe->client->voir && ! $socid) $sql.= ", ".MAIN_DB_PREFIX."societe_commerciaux as sc";
	$sql.= " WHERE c.fk_soc = s.rowid";
	$sql.= " AND c.fk_statut = 0";
	$sql.= " AND c.entity IN (".getEntity('commande').")";
	if (! $user->rights->societe->client->voir && ! $socid) $sql.= " AND s.rowid = sc.fk_soc AND sc.fk_user = ".((int) $user->id);
	if ($socid)	$sql.= " AND c.fk_soc = ".((int) $socid);

	$resql = $db->query($sql);
	if ($resql)
	{
		$total = 0;
		$num = $db->num_rows($resql);

		print '<table class="noborder centpercent">';
		print '<tr class="liste_titre">';
		print '<th colspan="3">'.$langs->trans("DraftMyObjects").($num?'<span class="badge marginleftonlyshort">'.$num.'</span>':'').'</th></tr>';

		$var = true;
		if ($num > 0)
		{
			$i = 0;
			while ($i < $num)
			{

				$obj = $db->fetch_object($resql);
				print '<tr class="oddeven"><td class="nowrap">';

				$myobjectstatic->id=$obj->rowid;
				$myobjectstatic->ref=$obj->ref;
				$myobjectstatic->ref_client=$obj->ref_client;
				$myobjectstatic->total_ht = $obj->total_ht;
				$myobjectstatic->total_tva = $obj->total_tva;
				$myobjectstatic->total_ttc = $obj->total_ttc;

				print $myobjectstatic->getNomUrl(1);
				print '</td>';
				print '<td class="nowrap">';
				print '</td>';
				print '<td class="right" class="nowrap">'.price($obj->total_ttc).'</td></tr>';
				$i++;
				$total += $obj->total_ttc;
			}
			if ($total>0)
			{

				print '<tr class="liste_total"><td>'.$langs->trans("Total").'</td><td colspan="2" class="right">'.price($total)."</td></tr>";
			}
		}
		else
		{

			print '<tr class="oddeven"><td colspan="3" class="opacitymedium">'.$langs->trans("NoOrder").'</td></tr>';
		}
		print "</table><br>";

		$db->free($resql);
	}
	else
	{
		dol_print_error($db);
	}
}
END MODULEBUILDER DRAFT MYOBJECT */


print '</div><div class="fichetwothirdright">';


$NBMAX = $conf->global->MAIN_SIZE_SHORTLIST_LIMIT;
$max = $conf->global->MAIN_SIZE_SHORTLIST_LIMIT;

/* BEGIN MODULEBUILDER LASTMODIFIED MYOBJECT
// Last modified myobject
if (isModEnabled('agente') && $user->rights->agente->read)
{
	$sql = "SELECT s.rowid, s.ref, s.label, s.date_creation, s.tms";
	$sql.= " FROM ".MAIN_DB_PREFIX."agente_myobject as s";
	//if (! $user->rights->societe->client->voir && ! $socid) $sql.= ", ".MAIN_DB_PREFIX."societe_commerciaux as sc";
	$sql.= " WHERE s.entity IN (".getEntity($myobjectstatic->element).")";
	//if (! $user->rights->societe->client->voir && ! $socid) $sql.= " AND s.rowid = sc.fk_soc AND sc.fk_user = ".((int) $user->id);
	//if ($socid)	$sql.= " AND s.rowid = $socid";
	$sql .= " ORDER BY s.tms DESC";
	$sql .= $db->plimit($max, 0);

	$resql = $db->query($sql);
	if ($resql)
	{
		$num = $db->num_rows($resql);
		$i = 0;

		print '<table class="noborder centpercent">';
		print '<tr class="liste_titre">';
		print '<th colspan="2">';
		print $langs->trans("BoxTitleLatestModifiedMyObjects", $max);
		print '</th>';
		print '<th class="right">'.$langs->trans("DateModificationShort").'</th>';
		print '</tr>';
		if ($num)
		{
			while ($i < $num)
			{
				$objp = $db->fetch_object($resql);

				$myobjectstatic->id=$objp->rowid;
				$myobjectstatic->ref=$objp->ref;
				$myobjectstatic->label=$objp->label;
				$myobjectstatic->status = $objp->status;

				print '<tr class="oddeven">';
				print '<td class="nowrap">'.$myobjectstatic->getNomUrl(1).'</td>';
				print '<td class="right nowrap">';
				print "</td>";
				print '<td class="right nowrap">'.dol_print_date($db->jdate($objp->tms), 'day')."</td>";
				print '</tr>';
				$i++;
			}

			$db->free($resql);
		} else {
			print '<tr class="oddeven"><td colspan="3" class="opacitymedium">'.$langs->trans("None").'</td></tr>';
		}
		print "</table><br>";
	}
}
*/

print '</div></div>';

// End of page
llxFooter();
$db->close();

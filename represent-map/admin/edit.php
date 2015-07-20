<?php
include "header.php";


if(isset($_GET['place_id'])) {
  $place_id = htmlspecialchars($_GET['place_id']); 
} else if(isset($_POST['place_id'])) {
  $place_id = htmlspecialchars($_POST['place_id']);
} else {
  exit; 
}


// get place info
$place_query = mysql_query("SELECT * FROM places WHERE id='$place_id' LIMIT 1");
if(mysql_num_rows($place_query) != 1) { exit; }
$place = mysql_fetch_assoc($place_query);


// do place edit if requested
if($task == "doedit") {
  $title = str_replace( "'", "\\'", str_replace( "\\", "\\\\", $_POST['title'] ) );
  $type = $_POST['type'];
  $address = str_replace( "'", "\\'", str_replace( "\\", "\\\\", $_POST['address'] ) );
  $uri = $_POST['uri'];
  $description = str_replace( "'", "\\'", str_replace( "\\", "\\\\", $_POST['description'] ) );
  $owner_name = str_replace( "'", "\\'", str_replace( "\\", "\\\\", $_POST['owner_name'] ) );
  $owner_email = $_POST['owner_email'];
  $lat = (float) $_POST['lat'];
  $lng = (float) $_POST['lng'];
  
  mysql_query("UPDATE places SET title='$title', type='$type', address='$address', uri='$uri', lat='$lat', lng='$lng', description='$description', owner_name='$owner_name', owner_email='$owner_email' WHERE id='$place_id' LIMIT 1") or die(mysql_error());
  
  // geocode
  //$hide_geocode_output = true;
  //include "../geocode.php";
  
  header("Location: index.php?view=$view&search=$search&p=$p");
  exit;
}

?>



<? echo $admin_head; ?>

<form id="admin" class="form-horizontal" action="edit.php" method="post">
  <h1>
    Edit Place
  </h1>
  <fieldset>
    <div class="control-group">
      <label class="control-label" for="">Title</label>
      <div class="controls">
        <input type="text" class="input input-xlarge" name="title" value="<?=$place[title]?>" id="">
      </div>
    </div>
     <div class="control-group">
       <label class="control-label" for="">Type</label>
       <div class="controls">
-        <select class="input input-xlarge" name="type">
			  <option<? if($place[type] == "aberdeen-angus" {?> selected="selected"<? } ?>>Bovino - Aberdeen Angus</option>
              <option<? if($place[type] == "ankole-watusi" {?> selected="selected"<? } ?>>Bovino - Ankole-Watusi</option>
              <option<? if($place[type] == "belted-galloway" {?> selected="selected"<? } ?>>Bovino - Belted Galloway</option>
              <option<? if($place[type] == "bonsmara" {?> selected="selected"<? } ?>>Bovino - Bonsmara</option>
              <option<? if($place[type] == "brahman" {?> selected="selected"<? } ?>>Bovino - Brahman</option>
              <option<? if($place[type] == "brangus" {?> selected="selected"<? } ?>>Bovino - Brangus</option>
              <option<? if($place[type] == "brown-swiss" {?> selected="selected"<? } ?>>Bovino - Brown Swiss</option>
              <option<? if($place[type] == "caracu" {?> selected="selected"<? } ?>>Bovino - Caracu</option>
              <option<? if($place[type] == "charoles" {?> selected="selected"<? } ?>>Bovino - Charoles</option>
              <option<? if($place[type] == "devon" {?> selected="selected"<? } ?>>Bovino - Devon</option>
              <option<? if($place[type] == "gir-mocha" {?> selected="selected"<? } ?>>Bovino - Gir Mocha</option>
              <option<? if($place[type] == "hereford" {?> selected="selected"<? } ?>>Bovino - Hereford</option>
              <option<? if($place[type] == "holstein-frisia" {?> selected="selected"<? } ?>>Bovino - Holstein-Frisia</option>
              <option<? if($place[type] == "jersey" {?> selected="selected"<? } ?>>Bovino - Jersey</option>
              <option<? if($place[type] == "limousin" {?> selected="selected"<? } ?>>Bovino - Limousin</option>
              <option<? if($place[type] == "marchigiana" {?> selected="selected"<? } ?>>Bovino - Marchigiana</option>
              <option<? if($place[type] == "nelore" {?> selected="selected"<? } ?>>Bovino - Nelore</option>
              <option<? if($place[type] == "red-angus" {?> selected="selected"<? } ?>>Bovino - Red Angus</option>
              <option<? if($place[type] == "senepol" {?> selected="selected"<? } ?>>Bovino - Senepol</option>
              <option<? if($place[type] == "shorthorn" {?> selected="selected"<? } ?>>Bovino - Shorthorn</option>
              <option<? if($place[type] == "simental" {?> selected="selected"<? } ?>>Bovino - Simental</option>
              <option<? if($place[type] == "africana" {?> selected="selected"<? } ?>>Ovino - Africana</option>
              <option<? if($place[type] == "assaf" {?> selected="selected"<? } ?>>Ovino - Assaf</option>
              <option<? if($place[type] == "barbados-blackbelly" {?> selected="selected"<? } ?>>Ovino - Barbados Blackbelly</option>
              <option<? if($place[type] == "bergamacia" {?> selected="selected"<? } ?>>Ovino - Bergamácia</option>
              <option<? if($place[type] == "brazilian-somali" {?> selected="selected"<? } ?>>Ovino - Brazilian Somali</option>
              <option<? if($place[type] == "cabeca-preta-persa" {?> selected="selected"<? } ?>>Ovino - Cabeça Preta Persa</option>
              <option<? if($place[type] == "cara-preta-lituana" {?> selected="selected"<? } ?>>Ovino - Cara Preta Lituana</option>
              <option<? if($place[type] == "columbia" {?> selected="selected"<? } ?>>Ovino - Columbia</option>
              <option<? if($place[type] == "coopworth" {?> selected="selected"<? } ?>>Ovino - Coopworth</option>
              <option<? if($place[type] == "corriedale" {?> selected="selected"<? } ?>>Ovino - Corriedale</option>
              <option<? if($place[type] == "damara" {?> selected="selected"<? } ?>>Ovino - Damara</option>
              <option<? if($place[type] == "dorper" {?> selected="selected"<? } ?>>Ovino - Dorper</option>
              <option<? if($place[type] == "dorset" {?> selected="selected"<? } ?>>Ovino - Dorset</option>
              <option<? if($place[type] == "east-friesian" {?> selected="selected"<? } ?>>Ovino - East Friesian</option>
              <option<? if($place[type] == "finnsheep" {?> selected="selected"<? } ?>>Ovino - Finnsheep</option>
              <option<? if($place[type] == "guaipecas-brasiliensis" {?> selected="selected"<? } ?>>Ovino - Guaipecas Brasiliensis</option>
              <option<? if($place[type] == "hampshire" {?> selected="selected"<? } ?>>Ovino - Hampshire</option>
              <option<? if($place[type] == "icelandic" {?> selected="selected"<? } ?>>Ovino - Icelandic</option>
              <option<? if($place[type] == "ile-de-france" {?> selected="selected"<? } ?>>Ovino - Ile de France</option>
              <option<? if($place[type] == "katahdin" {?> selected="selected"<? } ?>>Ovino - Katahdin</option>
              <option<? if($place[type] == "lacaune" {?> selected="selected"<? } ?>>Ovino - Lacaune</option>
              <option<? if($place[type] == "lincoln" {?> selected="selected"<? } ?>>Ovino - Lincoln</option>
              <option<? if($place[type] == "masai" {?> selected="selected"<? } ?>>Ovino - Masai</option>
              <option<? if($place[type] == "merino" {?> selected="selected"<? } ?>>Ovino - Merino</option>
              <option<? if($place[type] == "morada-nova" {?> selected="selected"<? } ?>>Ovino - Morada Nova</option>
              <option<? if($place[type] == "pelibuey" {?> selected="selected"<? } ?>>Ovino - Pelibuey</option>
              <option<? if($place[type] == "polypay" {?> selected="selected"<? } ?>>Ovino - Polypay</option>
              <option<? if($place[type] == "rabo-largo" {?> selected="selected"<? } ?>>Ovino - Rabo Largo</option>
              <option<? if($place[type] == "rambouillet" {?> selected="selected"<? } ?>>Ovino - Rambouillet</option>
              <option<? if($place[type] == "romney" {?> selected="selected"<? } ?>>Ovino - Romney</option>
              <option<? if($place[type] == "royal-white" {?> selected="selected"<? } ?>>Ovino - Royal White</option>
              <option<? if($place[type] == "sahel-type" {?> selected="selected"<? } ?>>Ovino - Sahel-type</option>
              <option<? if($place[type] == "santa-ines" {?> selected="selected"<? } ?>>Ovino - Santa Inês</option>
              <option<? if($place[type] == "soay" {?> selected="selected"<? } ?>>Ovino - Soay</option>
              <option<? if($place[type] == "somali" {?> selected="selected"<? } ?>>Ovino - Somali</option>
              <option<? if($place[type] == "southdown" {?> selected="selected"<? } ?>>Ovino - Southdown</option>
              <option<? if($place[type] == "st-croix" {?> selected="selected"<? } ?>>Ovino - St. Croix</option>
              <option<? if($place[type] == "suffolk" {?> selected="selected"<? } ?>>Ovino - Suffolk</option>
              <option<? if($place[type] == "texel" {?> selected="selected"<? } ?>>Ovino - Texel</option>
              <option<? if($place[type] == "touabire" {?> selected="selected"<? } ?>>Ovino - Touabire</option>
              <option<? if($place[type] == "uda" {?> selected="selected"<? } ?>>Ovino - Uda</option>
              <option<? if($place[type] == "west-african-dwarf" {?> selected="selected"<? } ?>>Ovino - West African Dwarf</option>
			  <option<? if($place[type] == "white-dorper" {?> selected="selected"<? } ?>>Ovino - White Dorper</option>
              <option<? if($place[type] == "alpina" {?> selected="selected"<? } ?>>Caprino - Alpina</option>
              <option<? if($place[type] == "anglo-nubiana" {?> selected="selected"<? } ?>>Caprino - Anglo-nubiana</option>
              <option<? if($place[type] == "angora" {?> selected="selected"<? } ?>>Caprino - Angorá</option>
              <option<? if($place[type] == "bhuj" {?> selected="selected"<? } ?>>Caprino - Bhuj</option>
              <option<? if($place[type] == "boer" {?> selected="selected"<? } ?>>Caprino - Boer</option>
              <option<? if($place[type] == "caninde" {?> selected="selected"<? } ?>>Caprino - Canindé</option>
              <option<? if($place[type] == "jamnapari" {?> selected="selected"<? } ?>>Caprino - Jamnapari</option>
              <option<? if($place[type] == "la-mancha-americana" {?> selected="selected"<? } ?>>'Caprino - La Mancha Americana</option>
              <option<? if($place[type] == "mambrina" {?> selected="selected"<? } ?>>Caprino - Mambrina</option>
              <option<? if($place[type] == "marota" {?> selected="selected"<? } ?>>Caprino - Marota</option>
              <option<? if($place[type] == "moxoto" {?> selected="selected"<? } ?>>Caprino - Moxotó</option>
              <option<? if($place[type] == "murciana" {?> selected="selected"<? } ?>>Caprino - Murciana</option>
              <option<? if($place[type] == "nubiana" {?> selected="selected"<? } ?>>Caprino - Nubiana</option>
              <option<? if($place[type] == "repartida" {?> selected="selected"<? } ?>>Caprino - Repartida</option>
              <option<? if($place[type] == "saanen" {?> selected="selected"<? } ?>>Caprino - Saanen</option>
              <option<? if($place[type] == "toggenburg" {?> selected="selected"<? } ?>>Caprino - Toggenburg</option>
-        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="">Endereço</label>
      <div class="controls">
        <input type="text" class="input input-xlarge" name="address" value="<?=$place[address]?>" id="">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="">URL</label>
      <div class="controls">
        <input type="text" class="input input-xlarge" name="uri" value="<?=$place[uri]?>" id="">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="">Descrição</label>
      <div class="controls">
        <textarea class="input input-xlarge" name="description"><?=$place[description]?></textarea>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="">Submitter Name</label>
      <div class="controls">
        <input type="text" class="input input-xlarge" name="owner_name" value="<?=$place[owner_name]?>" id="">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="">Submitter Email</label>
      <div class="controls">
        <input type="text" class="input input-xlarge" name="owner_email" value="<?=$place[owner_email]?>" id="">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="">Location</label>
      <div class="controls">
        <input type="hidden" name="lat" id="mylat" value="<?=$place[lat]?>"/>
        <input type="hidden" name="lng" id="mylng" value="<?=$place[lng]?>"/>
        <div id="map" style="width:80%;height:300px;">
        </div>
        <script type="text/javascript">
          var map = new google.maps.Map( document.getElementById('map'), {
            zoom: 17,
            center: new google.maps.LatLng( <?=$place[lat]?>, <?=$place[lng]?> ),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            streetViewControl: false,
            mapTypeControl: false
          });
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng( <?=$place[lat]?>, <?=$place[lng]?> ),
            map: map,
            draggable: true
          });
          google.maps.event.addListener(marker, 'dragend', function(e){
            document.getElementById('mylat').value = e.latLng.lat().toFixed(6);
            document.getElementById('mylng').value = e.latLng.lng().toFixed(6);
          });
        </script>
      </div>
    </div>    
    <div class="form-actions">
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <input type="hidden" name="task" value="doedit" />
      <input type="hidden" name="place_id" value="<?=$place[id]?>" />
      <input type="hidden" name="view" value="<?=$view?>" />
      <input type="hidden" name="search" value="<?=$search?>" />
      <input type="hidden" name="p" value="<?=$p?>" />
      <a href="index.php" class="btn" style="float: right;">Cancel</a>
    </div>
  </fieldset>
</form>



<? echo $admin_foot; ?>

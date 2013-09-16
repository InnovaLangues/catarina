
function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function verifNom(champ)
{
   if(champ.value.length < 1 || champ.value.length > 50)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifDescription(champ)
{
   if(champ.value.length < 1 || champ.value.length > 256)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifUrl(champ)
{
   if(champ.value.length < 1 || champ.value.length > 50)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifCategorie(champ)
{
   if(!$("input[name='categorie']:checked").val())
   {
      return false;
   }
   else
   {
      return true;
   }
}



function verifForm(f)
{
   var nomOk = verifNom(f.nom);
   var descriptionOk = verifDescription(f.description);
   var urlOk = verifUrl(f.url);
   var catOk = verifCategorie(f.categorie);

   if(nomOk && descriptionOk && urlOk && catOk)
      return true;
   else
   {
      alert("Veuillez renseigner le nom, l'url, la catégorie et la description");
      return false;
   }
}
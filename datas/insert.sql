INSERT INTO `cat_type`(`nom`) VALUES ("Outils logiciels facilitant la communication et la collaboration");
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Plateformes sociales",1);
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Blogs",2);
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Réseaux sociaux",2);
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Educatifs",4);
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Traditionnels",4);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Partage de documents",1);	  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Diffusion",7);	  
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Plateforme de curation",8);	  
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Site web",8);	  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Stockage et partage",7);
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création collaborative",7);	
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Traitement de texte",12);	
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Tableau",12);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Envois de messages",1);	
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Chat",15);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Outils de communication audio-visuelle",1);	
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Télé-conférence",17);
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Forums vocaux",17);
INSERT INTO `cat_type`(`nom`) VALUES ("Outils logiciels facilitant la conception");
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("De traitement de l'image",20);
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création d'images intéractives",21);
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création de bandes-dessinées",21);
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création de libres ou magazines",21);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("De traitement du son",20);	  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création audio",25);   
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Enregistrement et traitement du son",26);  
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Reconnaissance vocale",26);  
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Synthèse vocale",26);  	   
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création de podcasts",25);  
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("De traitement vidéo",20);	
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Narration numérique",31);    
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création et édition de films",31);  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création et édition de films d'animation",31);  
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Générateurs d'exercices",20);   
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Création d'autres supports pédagogiques",20);	  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Présentations",36);   	  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Tutoriels",36);  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Nuages de mots",36);  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Manuels (à partir de pdf, jpeg)",36);  
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Activités sur la morphologie",36);  	
INSERT INTO `cat_type`(`nom`) VALUES ("Outils matériels");
INSERT INTO `cat_type`(`nom`) VALUES ("Solutions intégrées pour l'apprentissage des langues");
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Dispositifs d'apprentissage des langues",43);	
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("S'appuyant sur les exerciseurs",44);	
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Mémoire, automatismes",45);	
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Avec activités créatives",45);			 
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Intégrant la dimension sociale",44);			 
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Avec exerciseurs",48);		 
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Avec traduction des expressions non connues",48);		
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Sites de mise en relation tandem",48);	
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Plateforme visant la pratique orale",48);	
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Dépendant d'un organisme de formation (Grenoble)",44);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Plateformes d'apprentissage de vocabulaire",43);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Répertoires d'activités",43);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Ensemble de ressources dans une langue étrangère en particulier",43);
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Logiciels traitant une langue en particulier",43);   
INSERT INTO `cat_type`(`nom`) VALUES ("Outils logiciels servant d'appui pour l'apprentissage en autonomie");
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Dictionnaires et traducteurs",58);	
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Dictionnaires visuels sémantiques",58);
INSERT INTO `cat_type`(`nom`) VALUES ("Répertoires d'objets d'apprentissage");
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Objets multimédias",61);	
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Audio",62);	
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Podcasts dans différentes langues",63);	
            INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Répertoires de podcasts",64);	
         INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Musiques et chansons",63);			
            INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Clips version karaoké",66);				
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Videos",62);				
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Textes",62);	  
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Objets pédagogiques",61);				
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Dossiers de séances de cours",70);				
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Cours audio",70);			
      INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Exercices basés sur vidéos pédagogisées",70);								
   INSERT INTO `cat_type`(`nom`, `parent_id`) VALUES ("Les deux",61);			



   
   
INSERT INTO cat_profil(`nom`) VALUES ("Apprenant");	
INSERT INTO cat_profil(`nom`) VALUES ("Enseignant");	
INSERT INTO cat_profil(`nom`) VALUES ("Concepteur");	
INSERT INTO cat_profil(`nom`) VALUES ("Tuteur");	
INSERT INTO cat_profil(`nom`) VALUES ("Gestionnaire");	


INSERT INTO cat_activite_langagiere(`nom`) VALUES ("Compréhension orale");	
INSERT INTO cat_activite_langagiere(`nom`) VALUES ("Compréhension écrite");	
INSERT INTO cat_activite_langagiere(`nom`) VALUES ("Production écrite");	
INSERT INTO cat_activite_langagiere(`nom`) VALUES ("Production orale en continu");	
INSERT INTO cat_activite_langagiere(`nom`) VALUES ("Production orale en interaction");	






		
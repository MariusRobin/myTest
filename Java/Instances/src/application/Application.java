package application;

import personnes.Etudiant;
import personnes.Professeur;

public class Application {

	
	static void passageEtudiant(Etudiant e){
		System.out.println("Debut methode : le nom de l'etudiant e vaut :"+e.getNom());
		e.setNom("Tetouillou le terrible ananas");
		e.profPOO.setNom("Pilapoupip");
		System.out.println("Fin methode : le nom de e vaut "+e.getNom());
	}
	/**
	 * @param args the command line arguments
	 */
	public static void main(String[] args) {
//		Etudiant a = new Etudiant("Saurion");
//		Etudiant b = new Etudiant("Bilbo");
//		Binome bi = new Binome(a,b);
//		Projet p = new Projet(bi,"Le projet qui dechire",0.05f);
//		System.out.println(a.nom);
//		System.out.println(a.IUT);
//		System.out.println(b.nom);
//		System.out.println(b.IUT);
//		Etudiant.afficherIUT();
//		Etudiant e = new Etudiant("Juana");
//		e.afficherIUT();
//		System.out.println("Il y a "+Etudiant.nbTotalEtudiants + " étudiant(s) à l'IUT");
	Etudiant e = new Etudiant("Dark vador");
	e.profPOO=new Professeur("Alphonse");
	System.out.println("Avant la methode le nom de l'etudiant vaut : "+e.getNom());
	Etudiant copie = new Etudiant(e);
	passageEtudiant(copie);
	System.out.println("Epres la methode le nom de l'etudiant vaut : "+e.getNom());
	
	}
}

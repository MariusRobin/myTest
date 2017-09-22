package exercices;

public class Projet {
	Binome b;
	String titre;
	float note;
	
	public String getTitre(){
		return titre;
	}
	public String toString(){
		return "Titre du projet : "+titre+"\nNom du premier eleve : "+b.etu1.nom +"\nNom du second : "+b.etu2.nom;
	}
}
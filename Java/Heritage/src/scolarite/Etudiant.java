package scolarite;

public class Etudiant extends Personne {

	private static int nbTotalEtudiants=0;

	Etudiant(String nom){
		setNom(nom);
		nbTotalEtudiants++;
	}


	/**
	 * @return the nbTotalEtudiants
	 */
	public static int getNbTotal() {
		return nbTotalEtudiants;
	}
	
	public String toString(){
		return super.toString() + ", et je suis un étudiant très sérieux";
		
	}
	
	public boolean aLeBac(){
		return false;
	}
}

package scolarite;

public class Professeur extends Personne{
	private static int nbProfesseur = 0;

	public Professeur( String nom){
		setNom(nom);
		nbProfesseur++;
	}

	
	public static int getNbTotal() {
		return nbProfesseur;
	}

	public boolean aLeBac(){
		return true;
	}
}

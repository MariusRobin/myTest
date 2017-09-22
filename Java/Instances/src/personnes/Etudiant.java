package personnes;

public class Etudiant {

	private String nom;
	static String IUT = "IUT de bordeaux";
	static int nbTotalEtudiants=0;
	public Professeur profPOO;
	
	public String getNom(){
		return nom;
	}
	
	public void setNom(String nom){
		this.nom=nom;
	}
	
	static void afficherIUT(){
		System.out.println(IUT);
	}
	
	
	public Etudiant(String s) {
		this.nom = s;
		nbTotalEtudiants++;
	}
	
	public Etudiant(Etudiant e){
		nom=e.nom;
		profPOO=e.profPOO;
	}

}

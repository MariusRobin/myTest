package scolarite;

public class MainAppli {

	MainAppli(){
		Etudiant e = new Etudiant("Arsene Lupin");
		System.out.println(e);
		System.out.println(Etudiant.getNbTotal());
		System.out.println(Professeur.getNbTotal());
		System.out.println(Personne.getNbTotal());
		
//		for (int i = 0; i<=1000000; i++)
//		{
//			new Personne("Robert Bidochon"+i); 
//		}
	}


	/**
	 * @param args the command line arguments
	 */
	public static void main(String[] args) {
		new MainAppli();
	}
}

package exercices;

public class Etudiant {
		String nom;
		
		Etudiant(String nom){
			this.nom=nom;
		}
		
		void setNom(String nom){
			this.nom=nom;
		}
		
		void bonjour(String s){
			System.out.println("Bonjour "+s);
			System.out.println("Moi, je m'appelle "+nom);
		}
		public String toString(){
			return " [Etudiant] "+nom;
		}
}

package scolarite;


public abstract class Personne{
	private String nom;
	private static int nbTotalPersonnes = 0;
	public abstract boolean aLeBac();
	public Personne(){
		nbTotalPersonnes++;
	}
	public Personne(String nom){
		this.nom =nom;
	}
	public String getNom(){
		return nom;
	}

	public void setNom(String nom){
		this.nom = nom;
	}
	
	public static int getNbTotal(){
		return nbTotalPersonnes;
	}
	public String toString(){
		return "[Personne] Je suis "+getNom() + ", une grande personne";
	}
	public boolean equals(Object o){
		if (this == o) return true;
		if (o instanceof Personne)
			return (getNom().equals(((Personne) o).getNom()));
		return false;
	}
	protected void finalize(){
		System.out.println("Bye bye de la part de " + getNom());
	}
}

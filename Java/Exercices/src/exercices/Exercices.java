package exercices;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

public class Exercices {

	
	static void politesse(){
		System.out.println("Quel est votre nom ?");
		Scanner in = new Scanner(System.in);
		String nom = in.nextLine();
		System.out.println("Bonjour "+nom);
		System.out.format("Bonjour %s", nom);
	}
	
	static void carreEtCube(){
		
		System.out.println("+------+------+------+");
		for (int i=1; i<=5;i++)
		{
			System.out.format ("|%4d  |%4d  |%4d  | \n",i,i*i ,i*i*i);
		}
		System.out.println("+------+------+------+");
	}
	
	public static float mystere(Projet p){
		System.out.println("Titre du projet : "+p.titre);
		System.out.println("Nom du premier eleve : "+p.b.etu1.nom);
		System.out.println("Nom du second : "+p.b.etu2.nom);
		return p.note;
	}
	
	public static void listeEtudiant(){
		ArrayList<Etudiant> tab2 = new ArrayList<Etudiant>();
		tab2.add(new Etudiant("Albert2"));
		tab2.add(new Etudiant("Bobby2"));
		tab2.add(new Etudiant("Charly2"));
		tab2.add(new Etudiant("Dominique2"));
		tab2.add(new Etudiant("Edouard2"));
		for (Etudiant e : tab2){
			System.out.println(e);
		}
		
		//version tableau
		
		Etudiant[] tab = new Etudiant[5];
		tab[0]=new Etudiant("Albert");
		Etudiant b = new Etudiant("Bobby");
		tab[1]=b;
		tab[2]=new Etudiant("Charly");
		tab[3]=new Etudiant("Dominique");
		tab[4]=new Etudiant("Edouard");
		for (Etudiant e : tab){
			System.out.println(e);
		}
	}
	
	public static void ouvrirFichier(){
		String chemin = "fichier.txt";
		try{
			java.io.BufferedReader f = new java.io.BufferedReader(new java.io.FileReader(chemin));
			String ligne;
			while ((ligne = f.readLine()) != null){
				System.out.println(ligne);
			}
		}catch (IOException e){
			System.out.println("Erreur de lecture du fichier");
		}
	}
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//politesse();
		//carreEtCube();
		//Etudiant a = new Etudiant();
		//a.nom="Bob";
		//Etudiant b = new Etudiant();
		//b.nom="Greg";
		//System.out.println("Je suis " + b.nom + " et je connais bien "+a.nom);
		//Etudiant e = new Etudiant();
		//e.nom="Edouard";
		//e.bonjour("Greg");
//		Projet projet1 = new Projet();
//		Binome binomeDeGenie = new Binome();
//		Etudiant etu1 = new Etudiant();
//		etu1.nom = "Marius";
//		Etudiant etu2 = new Etudiant();
//		etu2.nom = "fabien";
//		binomeDeGenie.etu1 = etu1;
//		binomeDeGenie.etu2 = etu2;
//		projet1.titre = "Et c'est le super PPP !";
//		projet1.b = binomeDeGenie;
//		projet1.note = 20;
//		System.out.println(projet1);
//		Etudiant a = new Etudiant();
//		a.nom ="Bob";
//		Etudiant b = new Etudiant();
//		b.nom ="Moi";
//		System.out.println(a+" / "+b);
//		Binome bi = new Binome();
//		System.out.println(bi);
		ouvrirFichier();
	}
	

}

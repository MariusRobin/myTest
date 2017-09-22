package anneau;

public class Anneau {
	private static boolean exist=false;
	
	private Anneau(){}
	
	public static Anneau getAnneau(){
		if (exist==false){
			exist=true;
			return new Anneau();
		}
		return null;
	}
}

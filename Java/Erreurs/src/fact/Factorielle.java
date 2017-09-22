package fact;

public class Factorielle {
	public static int calcul(int n) throws ExceptionNegatif, ExceptionTropGrand{
		int res = 1;
		if (n<0){
			throw new ExceptionNegatif(n);
		}
		for (int i=2;i <= n; i++){
			if (res > (Integer.MAX_VALUE/i)){
				throw new ExceptionTropGrand();
			}
			res *=i;
		}
		return res;		
	}
	
	public static void main (String[] arg) throws ExceptionNegatif, ExceptionTropGrand{
		int n;
		//n=-5;
		//n=Integer.parseInt(arg[0]);
		try{
			n=Integer.parseInt(arg[0]);
			System.out.println("Factorielle de "+n+" : "+calcul(n));
		}
		
		catch(ArrayIndexOutOfBoundsException e){
			System.err.println("Nombre entier positif manquant");
			System.exit(1);
		}
		//System.out.println("Factorielle de "+n+ " : " + calcul(n));
	}
}

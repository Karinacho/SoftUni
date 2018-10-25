import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Scanner;

public class listOfProducts {
    public static void main(String[] args) {

Scanner sc=new Scanner(System.in);
int n=Integer.parseInt(sc.nextLine());
List<String> products=new ArrayList<>();

for(int i=0;i<n;i++){
    String currentroduct=sc.nextLine();
    products.add(currentroduct);

}
        Collections.sort(products);
for(int i=0;i<products.size();i++){
    System.out.printf("%d.%s%n",i+1 , products.get(i));
}
    }
}

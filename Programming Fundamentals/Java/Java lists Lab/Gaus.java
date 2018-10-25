import java.util.Arrays;
import java.util.List;
import java.util.Scanner;
import java.util.stream.Collectors;

public class Gaus {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        List<Integer> input = Arrays.stream(sc.nextLine().split(" "))
                .map(Integer::parseInt)
                .collect(Collectors.toList());
        int size=(int)Math.round(input.size()/2.0);
        for (int i = 0; i < size; i++) {
 if(i==input.size()-1-i){
     System.out.println(input.get(i));
 }else{
    int sum=input.get(i)+input.get(input.size()-1-i);
     System.out.print(sum + " ");
 }
        }
    }
}

import java.util.Arrays;
import java.util.List;
import java.util.Scanner;
import java.util.stream.Collectors;

public class ListManipulationAdvanced {
    public static void main(String[] args) {
        Scanner sc=new Scanner(System.in);
        List<Integer> numbers=Arrays.stream(sc.nextLine().split(" "))
                .map(Integer::parseInt).collect(Collectors.toList());

        while(true){
            String line = sc.nextLine();
            if(line.equals("end")){
                break;
            }

            String[] tokens= line.split(" ");

            switch(tokens[0]){

                case "Contains":
                    int number=Integer.parseInt(tokens[1]);
                    if(numbers.contains( number)){
                        System.out.println("Yes");
                    }
                    else{
                        System.out.println("No such number");
                    }
                    break;

                case "Print":
                    if(tokens[1].equals("even")){
                        List<Integer> filterArray = numbers.stream()
                                .filter(p -> p%2==0).collect(Collectors.toList());

                        System.out.println(filterArray.toString().replaceAll("[\\[\\],]",""));
                    }else if(tokens[1].equals("odd")){
                        List<Integer> filterArray = numbers.stream()
                                .filter(p -> p%2!=0).collect(Collectors.toList());
                        System.out.println(filterArray.toString().replaceAll("[\\[\\],]",""));
                    }
                    break;
                case "Get":
                    int sum = numbers.stream().mapToInt(Integer::intValue).sum();

                    System.out.println(sum);
                    break;
                case "Filter":
                    String condition=tokens[1];
                    int num=Integer.parseInt(tokens[2]);

                    if(condition .equals("<")){
                        List<Integer> filterArray = numbers.stream()
                                .filter(p -> p<num).collect(Collectors.toList());
                        System.out.println(filterArray.toString().replaceAll("[\\[\\],]",""));


                    }
                    else if(condition .equals(">")){

                        List<Integer> filterArray = numbers.stream()
                                .filter(p -> p>num).collect(Collectors.toList());
                        System.out.println(filterArray.toString().replaceAll("[\\[\\],]",""));

                    }
                    else if(condition .equals("<=")){

                        List<Integer> filterArray = numbers.stream()
                                .filter(p -> p<=num).collect(Collectors.toList());
                        System.out.println(filterArray.toString().replaceAll("[\\[\\],]",""));
                    }
                    if(condition .equals(">=")){

                        List<Integer> filterArray = numbers.stream()
                                .filter(p -> p>=num).collect(Collectors.toList());
                        System.out.println(filterArray.toString().replaceAll("[\\[\\],]",""));
                    }

            }
        }
    }
}

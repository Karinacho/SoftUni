import java.util.*;
import java.util.stream.Collectors;

public class MergingArrays {
    public static void main(String[] args) {
        Scanner sc=new Scanner(System.in);

        List<Integer> arr1=Arrays.stream(sc.nextLine().split(" "))
                .map(Integer::parseInt).collect(Collectors.toList());
        List<Integer> arr2=Arrays.stream(sc.nextLine().split(" "))
                .map(Integer::parseInt).collect(Collectors.toList());
       int min=Math.min(arr1.size(),arr2.size());

        List<Integer> res =new ArrayList<>();


        for(int i=0;i<min;i++){
            res.add(arr1.get(i));
           res.add(arr2.get(i));



        }

        if(arr1.size()!=arr2.size()){
            if(arr1.size()>arr2.size()){
                for(int i=arr2.size();i<arr1.size();i++){
                    res.add(arr1.get(i));

                }
            }
            else{
                for(int i=arr1.size();i<arr2.size();i++){
                    res.add(arr2.get(i));
                }
            }
        }
        System.out.println(res.toString().replaceAll("[\\[\\],]",""));
    }
}

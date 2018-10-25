import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;
import java.util.stream.Collectors;

import static jdk.nashorn.internal.objects.NativeString.trim;

public class HouseParty {
    public static void main(String[] args) {
        Scanner sc=new Scanner(System.in);
        List<String> partyAnimals = new ArrayList<>();

        int count = Integer.parseInt(sc.nextLine());

        for (int i = 0; i < count; i++)
        {
            List<String> tokens =  Arrays.stream(sc.nextLine().split("\\s+")).collect(Collectors.toList());

            if (tokens.size() > 3)
            {
                if (partyAnimals.contains(tokens.get(0)))
                {
                    partyAnimals.remove(tokens.get(0));
                }
                else
                {
                    System.out.printf("%s is not in the list!\n", tokens.get(0));
                }
            }
            else
            {
                if (!partyAnimals.contains((tokens.get(0))))
                {
                    partyAnimals.add(tokens.get(0));
                }
                else
                {
                    System.out.printf("%s is already in the list!\n",tokens.get(0));

                }
            }
        }
        partyAnimals.forEach(item->{

                System.out.println(item);


        });
        //System.out.println(partyAnimals.toString().replaceAll("[\\[\\]*,]","\n"));
    }
}
